<?php

namespace App\Http\Controllers;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class facuiltyControllerToSHow extends Controller
{
    function showFaculityPage() {
        if (Session::has('user')){
            return view('Pages.facuilty.home');
        }else{
            return view('index');
        }
    }



}
