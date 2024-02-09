<?php

namespace App\Http\Controllers;

use App\Models\degrees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class adddegreeController extends Controller
{
    function showdegree() {
        if(Session::has('user')){
            return view('Pages.admin.degree');
        }
        else{
            return view('index');
        }
    }

    function adddegree(Request $request) {
        $request->validate([
            'title'=>'bail|required|unique:degrees|alpha',
        ]);

        $getTitle = $request->title;

        $add = new degrees();

        $add->Title =$getTitle;

        $add->save();
        return redirect()->route('showdegree')->with('degree','Degree Has Been Added Sucessfully');
    }
}
