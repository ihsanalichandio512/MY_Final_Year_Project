<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\batch;
use App\Models\degrees;
use App\Models\semester;
use App\Models\students;
use App\Models\attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class faclityController extends Controller
{
    public function showhome(){
        if (Session::has('user')) {
            return view('Pages.facuilty.home');
        }else{
            return view('index');
        }
    }


    public function showAttendancePage(Request $request) {
        if (Session::has('user')) {
        //    $degree = degrees::all();
        $degrees = degrees::all();
        $batches = null;
        $semesters = null;
        $students = null;

        if ($request->has('degree_id')) {
            $batches = batch::where('degree_id', $request->degree_id)->get();
        }

        if ($request->has('batch_id')) {
            $semesters = semester::where('batch_id', $request->batch_id)->get();
        }

        if ($request->has('semester_id')) {
            $students = students::where('semester_id', $request->semester_id)->get();
        }
            return view('Pages.facuilty.markAttendance', compact('degrees', 'batches', 'semesters', 'students'));
        }else{
            return view('index');
        }
    }

    public function storeAttendance(Request $request)
    {
        if ($request->has('student_id')) {
            foreach ($request->student_id as $studentId => $status) {
                attendances::create([
                    'student_id' => $studentId,
                    'degree_id' => $request->degree_id,
                    'batch_id' => $request->batch_id,
                    'semeste_id' => $request->semester_id,
                    'dateTime' => date('Y-m-d'), // Today's date
                    'attendence' => $status, // Present or Absent
                ]);
            }
        }

        return redirect()->route('showAttendancePage')->with('success', 'Attendance marked successfully!');
    }

    public function fetchBatches(Request $request)
    {
        $degreeId = $request->get('degree_id');

        if ($degreeId) {
            $batches = DB::table('batch')->where('Degree_id', $degreeId)->get();
            return response()->json($batches);
        }else{
            echo 'error';
        }

        return response()->json([]); // Return an empty array if no degree ID is provided
    }

    public function fetchSemesters(Request $request)
{
    $batchId = $request->get('batch_id');

    if ($batchId) {
        // Fetch semesters based on the batch ID
        $semesters = DB::table('semester')->where('Batch_id', $batchId)->get();
        return response()->json($semesters);
    }

    return response()->json([]); // Return an empty array if no batch ID is provided
}

public function fetchStudents(Request $request)
{

    $batchId = $request->input('batch_id');
    $semesterId = $request->input('semester_id');

    $students = DB::table(DB::raw('batch as b'))
    ->join('semester', 'semester.Semester_id', '=', 'b.Batch_id')
    ->join('students', 'students.Student_id', '=', 'semester.Semester_id')
    ->select('students.*')
    ->where('b.Batch_id', $batchId)
    ->get();

    return response()->json($students); // Assuming you're returning JSON data
}

}

