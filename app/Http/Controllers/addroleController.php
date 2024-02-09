<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class addroleController extends Controller
{
    function showrole() {
        if(Session::has('user')){
            return view('Pages.admin.roles');
        }else{
            return view('index');
        }
    }

    function addrole(Request $request){
            $request->validate([
                'title'=>'bail|required|unique:roles|alpha',
            ]);

            $getTitle = $request->title;

            $add = new roles();

            $add->Title = $getTitle;

            $add->save();
            return redirect()->route('showrole')->with('roles','Roles Has Been Added Sucessfully');
    }
}
