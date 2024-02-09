<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
<!-- Favicon -->
<link href="{{asset('favicon/favicon.ico')}}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{asset('theme/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link href="{{asset('theme/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{asset('theme/css/style.css')}}" rel="stylesheet">

   
   
    <title>OEST</title>
  </head>
  <body>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            @foreach ($errors->all() as $error)
               <strong>{{ $error }}</strong>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
{{--             
    <section class="form-02-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="_lk_de">
            <div class="form-03-main">
              <div class="">
                <img class="pic" src="{{URL::asset('images/hd logo.png')}}">
              </div>
            <form action="{{URL::to('user/signup/data')}}" id="registrationForm" method="get">
             @csrf
              <div class="form-group">
                <input type="text" name="username" id="username" class="form-control _ge_de_ol" type="text" placeholder="Enter Username" required="" aria-required="true">
              </div>

              <div class="form-group">
                <input type="email" name="email" id="emial" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
              </div> --}}

              {{-- <div class="form-group">
                <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
              </div> --}}

              {{-- <div class="form-group">
                <input type="text" name="number" id="number" class="form-control _ge_de_ol" type="text" placeholder="Enter Number" required="" aria-required="true">
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn-block btn-lg btn-primary">Signup</button>
              </div>
            </form>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  {{-- </div> --}}

  
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
                  <h3 class="text-center">Sign Up</h3>
                  <form action="{{URL::to('user/signup/data')}}" id="registrationForm" method="post">
                    @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="username" id="floatingText" class="form-control _ge_de_ol" type="text" placeholder="Enter Username" required="" aria-required="true">
                  <label for="floatingText">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" name="email" id="floatingInput" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="text" name="number" id="floatingPassword" class="form-control _ge_de_ol" type="text" placeholder="Enter Number" required="" aria-required="true">
                  <label for="floatingPassword">Phone Number</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Signup</button>
                <p class="text-center mb-0">Already have an Account? <a href="{{route('login.page')}}">Sign In</a></p>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->
</div>



  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('theme/lib/chart/chart.min.js')}}"></script>
  <script src="{{asset('theme/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('theme/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('theme/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('theme/lib/tempusdominus/js/moment.min.js')}}"></script>
  <script src="{{asset('theme/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
  <script src="{{asset('theme/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  
  <!-- Template Javascript -->
  <script src="{{asset('theme/js/main.js')}}"></script>
  
</body>
</html>