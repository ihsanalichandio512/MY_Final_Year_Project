<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;
class userHomeController extends Controller
{
    public function index()

    {
        
            return view(route('users.home.page'));
        
}
}