<?php

namespace App\Http\Controllers;

    // use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        Session::flush();
        return redirect()->route('login.page');

    }

}
