<?php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class addbatchController extends Controller
{
    function showBatch(){
        $show_degree = DB::table('degrees')->get();

        if(Session::has('user')){
            return view('Pages.admin.batch',['degree'=>$show_degree]);
        }else{
            return view('index');
        }
    }
    function addBatch(Request $request) {
        $request->validate([
            'title'=>'bail|required|unique:batch|alpha',
            'degree_id'=> 'bail|required'
        ]);

        $getTitle = $request->title;
        $getdegreeid = $request->degree_id;

        $add = new batch();

        $add->Title = $getTitle;
        $add->Degree_id = $getdegreeid;

        $add->save();

        return redirect()->route('showbatch')->with('batch','Batch Has Been Added');
    }
}
