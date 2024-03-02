<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/simple-line-icons/css/simple-line-icons.css')}}">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="{{asset('assets/plugins/chartist/dist/chartist.css')}}" type="text/css" media="all">

   <!-- Weather css -->
   <link href="{{asset('assets/css/svg-weather.css')}}" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
    <link href="{{asset('old css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('old css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <style>
      .pic{
        width: 209px;
        margin-left: -60px;
        <link href="{{asset('old css/style.css')}}" rel="stylesheet">
      }
    </style> --}}
    
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
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>



<title>OEST</title>
  </head>
  <body>
    <!-- Content Start -->
    <div class="content">
      @yield('adminhomepage')
      @yield('content')
      @yield('resetpassword')
      @yield('facuiltyhomepage')
      @yield('addsubject')
      @yield('addbatch')
      @yield('department')
      @yield('role')
      @yield('degree')
      @yield('faculity')
      @yield('attendence')
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
  <script src="{{asset('theme/icons.js')}}"></script>
  <!-- Template Javascript -->
  <script src="{{asset('theme/js/main.js')}}"></script>

  {{-- Jquery Links --}}
  {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="></script> --}}

{{-- 
   <!-- Required Jqurey -->
   <script src="{{asset('assets/plugins/Jquery/dist/jquery.min.js')}}"></script>
   <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
   <script src="{{asset('assets/plugins/tether/dist/js/tether.min.js')}}"></script>

   <!-- Required Fremwork -->
   <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

   <!-- Scrollbar JS-->
   <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
   <script src="{{asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js')}}"></script>

   <!--classic JS-->
   <script src="{{asset('assets/plugins/classie/classie.js')}}"></script>

   <!-- notification -->
   <script src="{{asset('assets/plugins/notification/js/bootstrap-growl.min.js')}}"></script>

   <!-- Sparkline charts -->
   <script src="{{asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>

   <!-- Counter js  -->
   <script src="{{asset('assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
   <script src="{{asset('assets/plugins/countdown/js/jquery.counterup.js')}}"></script>

   <!-- Echart js -->
   <script src="{{asset('assets/plugins/charts/echarts/js/echarts-all.js')}}"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script> --}}

   <!-- custom js -->
   {{-- <script type="text/javascript" src="{{asset('assets/js/main.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/pages/dashboard.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/pages/elements.js')}}"></script>
   <script src="{{asset('assets/js/menu.min.js')}}"></script> --}}
{{-- <script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});


</script> --}}

{{-- <script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
crossorigin="anonymous"
></script> --}}
{{-- 
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
crossorigin="anonymous"
></script> --}}


{{-- <script src="{{asset('assets/js/icons.js')}}"></script> --}}


{{-- <script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function (alert) {
        new bootstrap.Alert(alert);
    });
</script> --}}


</body>
</html>
