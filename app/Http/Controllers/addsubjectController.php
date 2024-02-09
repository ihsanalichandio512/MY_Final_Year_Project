<?php

namespace App\Http\Controllers;
use App\Models\subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class addsubjectController extends Controller
{
    function showsubject() {
        $show_semester = DB::table('semester')->get();
        $show_subject = DB::table('subjects')->get();
        if (Session::has('user')) {
            return view('Pages.admin.subjects',['semester'=>$show_semester,'subject'=>$show_subject]);
        }else{
            return view('index');
        }
    }

    function addubject(Request $request) {

        $request->validate([
            'title'=>'bail|required|unique:subjects|alpha',
            'semester_id'=> 'bail|required|',
        ]);

        $getTitle = $request->title;
        $getsemester_id = $request->semester_id;

        $add = new subjects();

        $add->Semester_id=$getsemester_id;
        $add->Title = $getTitle;


        $add->save();

        return redirect()->route('show.subject')->with('addsubject','Subject Has Sucessfully Added');

    }
}
