<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\degrees;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;
class attendanceController extends Controller
{
    function showAttendencePage(Request $request) {
        if(Session::has('user')){
            $batch = DB::table('batch')->get();
            $degree = degrees::all();
            $semester = DB::table('semester')->get();

            $batchName = $request->input('batch');
            $semesterName = $request->input('semester');
            $degreeName = $request->input('degree');
    
            $students = DB::table('students')
                ->join('batch', 'students.Batch_id', '=', 'batch.Batch_id')
                ->join('semester', 'students.Semester_id', '=', 'semester.Semester_id')
                ->join('degrees', 'students.Degree_id', '=', 'degrees.Degree_id')
                ->select('students.*')
                ->where('batch.Title', '=', $batchName)
                ->where('semester.Title', '=', $semesterName)
                ->where('degrees.Title', '=', $degreeName)
                ->get();
    
            return view('Pages.facuilty.markAttendence',[
                'students'=>$students,
                'batches' => $batch,
                'degrees' => $degree,
                'semesters' => $semester
        ]);
            // return view('Pages.facuilty.markAttendence',['batches'=>$batch,'degrees'=>$degree,'semesters'=>$semester]);   
        
            // return view('Pages.facuilty.markAttendence', [
            //     'batches' => $batch,
            //     'degrees' => $degree,
            //     'semesters' => $semester
            // ]);

        }else{
            return view('index');
        }
    }

    // function getstudentdata(Request $request){
    //     $batchName = $request->input('batch');
    //     $semesterName = $request->input('semester');
    //     $degreeName = $request->input('degree');

    //     $students = DB::table('students')
    //         ->join('batch', 'students.Batch_id', '=', 'batch.Batch_id')
    //         ->join('semester', 'students.Semester_id', '=', 'semester.Semester_id')
    //         ->join('degrees', 'students.Degree_id', '=', 'degrees.Degree_id')
    //         ->select('students.*')
    //         ->where('batch.Title', '=', $batchName)
    //         ->where('semester.Title', '=', $semesterName)
    //         ->where('degrees.Title', '=', $degreeName)
    //         ->get();

    //     return view('Pages.facuilty.markAttendence',['students'=>$students]);

    // }

}

