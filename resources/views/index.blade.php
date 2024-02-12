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

    </div>

    @if (Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('msg') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('msg2'))
        <div class="alert alert-danger" role="alert">
            <strong> {{ Session::get('msg2') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <strong> {{ Session::get('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('loginpass'))
        <div class="alert alert-primary" role="alert">
            <strong> {{ Session::get('loginpass') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="">
                            <div class="">
                                <img class="img-fluid" src="{{ URL::asset('images/hd logo.png') }}">
                            </div>
                        </a>
                    </div>
                    <h3 class="text-center">Sign In</h3>
                    <form action="{{ route('check.login') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="Username" id="floatingInput" class="form-control _ge_de_ol"
                                type="text" placeholder="Enter Username" required="" aria-required="true">
                            <label for="floatingInput">Username</label>
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="Password" autocomplete="on" id="floatingPassword"
                                class="showpass form-control _ge_de_ol" type="text" placeholder="Enter Password"
                                required="" aria-required="true">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input me-1" onclick="showcode();" type="checkbox"
                                    value="">
                                <label class="form-check-label" for="exampleCheck1">Show Password</label>
                            </div>
                            <a href="{{ route('forgot.password') }}" class="link-danger ">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                        <p class="text-center mb-0">Don't have an Account? <a
                                href="{{ route('user.signup.view') }}">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
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


    <script>
        function showcode() {
            let x = document.querySelector('.showpass');


            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
