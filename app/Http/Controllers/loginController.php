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

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

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

        if (Session::has('user')) {
            $user = Session::get('user');
            if ($user->Role_id == 1) {
                return view('Pages.admin.home');
            } elseif ($user->Role_id == 3) {
                return view('Pages.facuilty.home');
            } elseif ($user->Role_id == 4) {
                return "Student portal is under working";
            }
        }
    
        return view('index');
    }


    public function store(Request $request)
{

    $getUsername = $request->Username;
    $getPassword = $request->Password;

    $user = users::where('Username', '=', $getUsername)->first();
    if ($user) {
        if (Hash::check($getPassword, $user->Password)) {
            Session::put('user', $user);
            if ($user->Role_id == 1) {
                return redirect("/admin");
            } elseif ($user->Role_id == 3) {
                return redirect('/show/faclity/page')->with('msg', 'Successfully Logged in As Faculty');
            } elseif ($user->Role_id == 4) {
                return redirect('/users/pages/home')->with('msg', 'Successfully Logged in As User');
            } else {
                return response()->view('errors.404', [], 404);
            }
        } else {
            return view('index')->with('error', 'Incorrect password');
        }
    } else {
        return view('index')->with('error', 'User not found');
    }
}


//     public function store(Request $request)
// {
//     $getUsername = $request->Username;
//     $getPassword = $request->Password;
//     $user = users::where('Username', '=', $getUsername)->first();
//     // $users = users::all();
//     if ($user) {
//         // Check if password matches
//         if (Hash::check($getPassword, $user->Password)) {
//             // Check user role and return appropriate view
//             Session::put('user', $user);
//             if ($user->Role_id == 1) {
//                 return view(route('admin.home'))->with('msg', 'Successfully Logged in As Admin');
//             } elseif ($user->Role_id == 3) {
//                 return view(route('showhome'))->with('msg', 'Successfully Logged in As Faclity');
//             } elseif ($user->Role_id == 4) {
//                 return view(route('users.home.page'))->with('msg', 'Successfully Logged in As User');
//             } else {
//                 return response()->view('errors.404', [], 404);
//             }
//         } else {
//             // Incorrect password
//             return view(route('login.page'))->with('error', 'Incorrect password');
//         }
//     } else {
//         // User does not exist
//         return view('index')->with('error', 'User not found');
//     }
// }

    

    // public function store(Request $request)
    // {

    //     $getUsername = $request->Username;
    //     $getPassword = $request->Password;
    //     $user = users::where('Username', '=', $getUsername)->first();
    //     if (Hash::check($getPassword, $user->Password)) {

    //         if ($user->Role_id == 1) {
    //             return view('Pages.admin.home')->with('msg', 'Successfully Logged in As Admin');
    //         } elseif ($user->Role_id == 3) {
    //             return view('Pages.facuilty.home')->with('msg', 'Successfully Logged in As Faclity');
    //         } elseif ($user->Role_id == 4) {
    //             return view('Pages.users.home')->with('msg', 'Successfully Logged in As User');
    //         } else {
    //             return 404;
    //         }
    //     } else {
    //         return view('index');
    //     }
    // }




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
