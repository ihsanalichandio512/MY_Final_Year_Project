<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;


class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     if(Session::has('user'))
    //      {
    //         if (Auth::check()) {
    //             return redirect(route('users.home.page'));

    //         } else {
    //             return redirect(route('login'));
    //         }
    //      }

    // }


        public function index()
        {
            // // If the user is already authenticated, redirect to the home page
            // if (Auth::check()) {
            //     return redirect(route('users.home.page'));
           

            // If 'user' session exists, redirect to the home page
            if (Session::has('user')) {
                return view('Pages.admin.home');
            }else{
            // If not authenticated and 'user' session does not exist, redirect to the login page
            return view('index');
            }
        // }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Auth::check()) {
        $getusername = $request->username;
        $getPassword = $request->password;

        $user = users::where('Username','=',$getusername)->first();

if (Hash::check($getPassword,optional($user)->Password))
{
   
        $show = Session::put("user",$user);
   
    return redirect()->route('admin.home')->with("msg","Succesfully Logged in");
    } else {
        return redirect()->route('login.page')->with("msg2","Email or Password Is Invaild");

    // }
   

}



}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
