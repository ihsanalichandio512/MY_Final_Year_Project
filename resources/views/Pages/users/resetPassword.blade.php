@extends('Layouts.app')

@section('resetpassword')
{{-- <div class="container">
  <div class="row">
    <div class="col-md-4 offset-4">
      <form action="{{route('reset.password.post')}}" method="post">
        @csrf
        <input type="text" hidden value="{{$token}}" name="token" id="">
        <div class="form-group">
            <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
          </div>
    
         <div class="form-group">
           <input type="password" id="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter New Password" required="" aria-required="true">
         </div>
         <div class="form-group">
            <input type="password" id="conpass" name="conforimpassword" class="form-control _ge_de_ol" type="text" placeholder="Conforim Password" required="" aria-required="true">
          </div>
         <div class="form-group">
           <button type="submit" id="submit" name="submit" class="btn-block btn-lg btn-primary">Reset Password</button>
         </div>
       </form> --}}

       <!-- Sign Up Start -->
  <div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{route('user.signup.view')}}" class="">
                      <div class="">
                        <img class="img-fluid" src="{{URL::asset('images/hd logo.png')}}">
                      </div>
                    </a>
                  </div>
                  <h3 class="text-center">Change Password</h3>
                  <form action="{{route('reset.password.post')}}" method="post">
                    @csrf
                    <input type="text" hidden value="{{$token}}" name="token" id="">
                <div class="form-floating mb-3">
                  <input type="email" name="email" id="floatingInput" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" name="password" id="floatingPassword" class="form-control _ge_de_ol" type="text" placeholder="Enter Number" required="" aria-required="true">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" name="conforimpassword" id="floatingPassword" class="form-control _ge_de_ol" type="text" placeholder="Enter Number" required="" aria-required="true">
                  <label for="floatingPassword">Conform Password</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Reset Password</button>
                <p class="text-center mb-0">Already have an Account? <a href="{{route('login.page')}}">Sign In</a></p>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->
</div>

    @endsection
    