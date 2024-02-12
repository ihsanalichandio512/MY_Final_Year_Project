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
        $getUsername = $request->Username;
$getPassword = $request->Password;

$user = users::where('Username', '=', $getUsername)->first();

if (!$user) {
    return redirect()->route('login.page')->with("msg2", "User not found");
}

if (Hash::check($getPassword, $user->Password)) {
    session()->put("user", $user);

    if ($user->Role_id == 1) {
        return redirect()->route('admin.home')->with("msg", "Successfully logged in as Admin");
    } elseif ($user->Role_id == 3) {
        return redirect()->route('showFaculityPage')->with("msg", "Successfully logged in as Faculty");
    } elseif($user->Role_id == 2) {
        return redirect()->route('users.home.page')->with('msg', 'Successfully logged in as User');
    }
} else {
    return redirect()->route('login.page')->with("msg2", "Username or password is invalid");
}

    }




// }


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
