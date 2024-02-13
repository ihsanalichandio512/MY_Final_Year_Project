<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
