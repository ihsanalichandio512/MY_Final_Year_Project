<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\faciltyMiddleware;
use App\Http\middleware\studentMiddleware;

class userHomeController extends Controller
{
    public function index()

    {
        if (Session::has('user')) {
            $user = Session::get('user');
            if ($user->Role_id == 1) {
                return view('Pages.admin.home');
            } elseif ($user->Role_id == 3) {
                return view('Pages.facuilty.home');
            } elseif ($user->Role_id == 4) {
            return view(route('users.home.page'));

            }
        }
            return view(route('login.page'));
        
}
}