<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.users.forgot');
    }

    function forgotpassword(Request $request) {
        $request->validate([
            'email'=>"required|email|exists:users"
        ]);
        $token = Str::random(64);
        $expires_at = now()->addMinutes(2);
        
        DB::table('forgot_passwords')->insert([
            'email' => $request->email,
            'token' => $token,
            'expires_at' => $expires_at,
            'created_at' => Carbon::now()
        ]);
       
        Mail::send('emails.forgotPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
    

        return redirect() ->to(route('forgot.password'))->with("success","We Send You Reset Password Link");

    }
      

    function resetPassword($token){
        return view('Pages.users.resetPassword',compact('token'));
    }


function resetPasswordpost(Request $request){
    $request->validate([
        "email" => "required|email|exists:users",
    ]);

    $updatePassword = DB::table('forgot_passwords')
        ->where('email', $request->email)
        ->where('expires_at', '>=', now())
        ->where('token', $request->token)
        ->first();

    if (!$updatePassword) {
        return redirect()->to(route('forgot.password'))->with("success", "Token expired or invalid");
    }

    users::where("Email", $request->email)->update(["Password" => Hash::make($request->password)]);

    // Delete the token from the forgot_passwords table
    DB::table('forgot_passwords')
        ->where('email', $request->email)
        ->where('expires_at', '>=', now())
        ->where('token', $request->token)
        ->delete();

    return redirect()->to(route('login.page'))->with("success", "Password reset successfully");
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
        //
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
