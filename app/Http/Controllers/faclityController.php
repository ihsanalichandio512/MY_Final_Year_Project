<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\degrees;
use App\Models\semester;
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
            $batch = DB::table('batch')->get();
            return view('Pages.facuilty.markAttendance',compact('batch'));
        }else{
            return view('index');
        }
    }


    public function getDegrees(Request $request)
{
    $batch_id = $request->batch_id; // Correct variable name
    $batch = batch::findOrFail($batch_id); // Correct model name
    $degrees = $batch->degrees;
    return response()->json($degrees);
}

public function getSemesters(Request $request)
{
    $degree_id = $request->degree_id; // Correct variable name
    $semesters = degrees::findOrFail($degree_id)->semesters; // Correct model name
    return response()->json($semesters);
}

public function getStudents(Request $request)
{
    $semester_id = $request->semester_id; // Correct variable name
    $students = semester::findOrFail($semester_id)->students; // Correct model name
    return response()->json($students);
}
    // public function getDegrees(Request $request)
    // {
    //     $batch_id = $request->Batch_id;
    //     $batch = batch::findOrFail($batch_id);
    //     $degrees = $batch->degrees;
    //     return response()->json($degrees);
    // }

    // public function getSemesters(Request $request)
    // {
    //     $degree_id = $request->Degree_id;
    //     // Assuming you have relationships setup, you can get semesters like this
    //     $semesters = degrees::findOrFail($degree_id)->semesters;
    //     return response()->json($semesters);
    // }

    // public function getStudents(Request $request)
    // {
    //     $emester_id = $request->Semester_id;
    //     // Assuming you have relationships setup, you can get students like this
    //     $students = semester::findOrFail($emester_id)->students;
    //     return response()->json($students);
    // }
}
