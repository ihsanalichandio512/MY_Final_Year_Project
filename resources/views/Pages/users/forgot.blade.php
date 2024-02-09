<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Favicon -->
    <link href="{{ asset('favicon/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">

    <title>OEST</title>
</head>

<body class="form-02-main">
    <div class="container">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ $error }}
                    </strong>
                </div>

                <script>
                    $(".alert").alert();
                </script>
            @endforeach
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i
                        class="fa fa-window-close" aria-hidden="true"></i></button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        {{-- <div class="row">
            <div class="col-md-12 dis">
                <form class="form-03-main" action="{{ route('forgot.password.post') }}" method="post">
                    @csrf --}}
        {{-- <select class="form-select rounded-pill" aria-label="Default select example">
                  <option selected>Select Role</option>
                  <option value="1">Admin</option>
                  <option value="2">Facuilty</option>
                  <option value="3">User</option>
                </select> --}}
        {{-- <img src="{{ asset('images/hd logo.png') }}" class="img-fluid pic" alt="">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control _ge_de_ol" type="text"
                            placeholder="Enter Email" required="" aria-required="true">
                    </div>


                    <label for="">Already Registered </label><a href="{{ asset('/') }}" class="link-danger ">
                        SignIn</a>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg">Send Reset
                            Link</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div> --}}



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
                <h3 class="text-center">Forgot Password</h3>
                <form action="{{ route('forgot.password.post') }}" id="registrationForm" method="post">
                  @csrf
              <div class="form-floating mb-3">
                <input type="email" name="email" id="floatingInput" class="form-control _ge_de_ol" placeholder="Enter Email" required="" aria-required="true">
                <label for="floatingInput">Email address</label>
              </div>             
              <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Send Reset Link</button>
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
        <script src="{{ asset('theme/lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('theme/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('theme/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('theme/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('theme/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('theme/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('theme/js/main.js') }}"></script>

</body>

</html>
