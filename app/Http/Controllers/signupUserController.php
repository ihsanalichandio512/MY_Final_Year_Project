<?php

namespace App\Http\Controllers;
use App\Models\roles;
use App\Models\users;
use App\Models\picture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;


class signupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if(!Session::has('user')){
        $show_roles = roles::all();
        return view('pages.users.signup',['role'=>$show_roles]);
    }
    else{
        return view('Pages.users.home');
    }
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

        $request->validate([
            'username'=>'bail|required|unique:users|alpha_num',
            'email'=>'bail|required|email|unique:users',
            // 'password'=>'bail|required|min:8|alpha_num|unique:users',
            // 'number'=>'bail|required|min:10|max:11|alpha_num|unique:users',
            
        ]);

        $getUsername = $request->username;
        $getEmail = $request->email;
        $getPassword = Str::random(8); 
        $getNumber = $request->number;

        $add = new users();

        $add->Username = $getUsername;
        $add->Email = $getEmail;
        $add->Password = Hash::make($getPassword);
        $add->Phone_Number = $getNumber;
        
        Mail::send('emails.loginpass', ['password' => $getPassword], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Login Password');
        });
        $add->save();
        return redirect()->route('login.page')->with('loginpass','The Login Password is sent to your given email');

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
