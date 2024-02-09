<?php

namespace App\Http\Controllers;

use App\Models\departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class adddepartmentController extends Controller
{
    function showdepartment()  {
        if(Session::has('user')){
            return view('Pages.admin.department');
        }else{
            return view('index');
        }
    }

    function adddepartment(Request $request) {
        $request->validate([
            'title'=>'bail|required|unique:departments|alpha',
        ]);

        $getTitle = $request->title;

        $add = new departments();

         $add->Title = $getTitle;

        $add->save();
        return redirect()->route('showdepartment')->with('department','Department Has been Sucessfully Added');
    }
}
