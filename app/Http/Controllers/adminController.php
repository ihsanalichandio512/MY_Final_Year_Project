<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

use App\Models\semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        if(Session::has('user'))
        {
            $show_semester = DB::table('semester')->get();
            $show_degree = DB::table('degrees')->get();
            return view('Pages.admin.home',['semester'=>$show_semester,'degree'=>$show_degree]);
        }else{
            return view(route('login.page'));
        }

    }



}
