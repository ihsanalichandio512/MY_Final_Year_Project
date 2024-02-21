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


    public function showAttendancePage() {
        if (Session::has('user')) {
            $batches = DB::table('batch')->get();
            return view('Pages.facuilty.markAttendance', compact('batches'));
        }else{
            return view('index');
        }
    }

    public function getDegrees($batchId)
    {
        $degrees = degrees::where('Degree_id', $batchId)->get();
        return response()->json($degrees);
    }

    public function getSemesters($degreeId)
    {
        $semesters = Semester::where('Degree_id', $degreeId)->get();
        return response()->json($semesters);
    }

    public function getStudents(Request $request)
    {
        $students = students::where('Batch_id', $request->batch_id)
            ->where('Degree_id', $request->degree_id)
            ->where('Semester_id', $request->semester_id)
            ->when($request->search, function ($query, $search) {
                $query->where('Name', 'like', '%' . $search . '%');
            })
            ->get();

        return response()->json($students);
    }

    public function markAttendanceSubmit(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'degree_id' => 'required|exists:degrees,id',
            'semester_id' => 'required|exists:semesters,id',
            // Add other validation rules
        ]);

        foreach ($request->students as $studentId => $status) {
            attendances::updateOrCreate(
                ['student_id' => $studentId, 'date' => Carbon::now()],
                ['status' => $status]
            );
        }

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }

}

