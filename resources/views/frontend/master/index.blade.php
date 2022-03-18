<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Brilliant Five J Construction and Development Corp.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/shortcode/shortcodes.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- customizer style css -->
    <link rel="stylesheet" href="{{asset('frontend/css/style-customizer.css')}}">
    <link href="#" data-style="styles" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('lib/main.css')}}">

  </head>
  <body>
  <div id="fakeLoader"></div>
    <!--Preloader end-->
    <div class="wrapper white_bg">
      @include('frontend.partial.header')
        @yield('content')
      @include('frontend.partial.footer')
    </div>
      @include('frontend.partial.sidebar')

    
  <!-- loader -->
  <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

  @yield('style')
  @yield('calendar-js')


    <!-- Map js code here -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj9b_nyz33KEaocu6ZOXRgqwwUZkDVEAw"></script>
    <script src="{{asset('frontend/js/map.js')}}"></script>
    <!-- All jquery file included here -->
    <script src="{{asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.nivo.slider.pack.js')}}"></script>
    <script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/js/ajax-mail.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('frontend/js/style-customizer.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('lib/main.js')}}"></script>

    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6218caa2a34c2456412828fa/1fsodf3d3';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
  </body>
</html>