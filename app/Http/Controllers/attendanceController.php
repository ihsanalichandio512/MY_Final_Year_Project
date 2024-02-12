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
    public function index(Request $request) {
        $batches = DB::table('batch')->get();
        if(Session::has('user')){
            return view(route('showFaculityPage'), compact('batches'));
        }else{
            return view('index');
        }
}
public function getDegrees(Request $request)
    {
        $batch_id = $request->batch_id;
        $batch = batch::findOrFail($batch_id);
        $degrees = $batch->degrees;
        return response()->json($degrees);
    }

    public function getSemesters(Request $request)
    {
        $degree_id = $request->degree_id;
        // Assuming you have relationships setup, you can get semesters like this
        $semesters = degrees::findOrFail($degree_id)->semesters;
        return response()->json($semesters);
    }

    public function getStudents(Request $request)
    {
        $semester_id = $request->semester_id;
        // Assuming you have relationships setup, you can get students like this
        $students = semester::findOrFail($semester_id)->students;
        return response()->json($students);
    }

}