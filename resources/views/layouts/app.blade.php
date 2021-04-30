<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#0134d4">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <title>{{ config('app.name') }} | @yield("title")</title>
        <!-- Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

        <!-- vendor css -->
            <link rel="stylesheet" href="{{asset("assets/main/css/bootstrap.min.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/animate.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/owl.carousel.min.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/font-awesome.min.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/bootstrap-icons.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/magnific-popup.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/ion.rangeSlider.min.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/dataTables.bootstrap4.min.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/apexcharts.css")}}">
            <!-- Core Stylesheet-->
            <link rel="stylesheet" href="{{asset("assets/main/style.css")}}">
        <link type="text/css" href="{{asset("assets/toastr/toastr.min.css")}}" rel="stylesheet" />
        @yield('head')
    </head>
    <body>
        <!-- Preloader-->
        <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
          <div class="spinner-grow text-primary" role="status">
            <div class="sr-only">Loading...</div>
          </div>
        </div>
        <!-- Internet Connection Status-->
        <div class="internet-connection-status" id="internetStatus"></div>
        <!-- Header Area-->
        <div class="header-area" id="headerArea">
          <div class="container">
            <!-- Header Content-->
            <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
              <!-- Back Button-->
              <div class="back-button"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                </svg></div>
              <!-- Page Title-->
              <div class="page-heading">
                <h6 class="mb-0">@yield("title")</h6>
              </div>
              <!-- Navbar Toggler-->
              <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
            </div>
          </div>
        </div>
        @if(Route::is("admin*"))
        @include('includes.sidebar')
        @endif
        <div class="page-content-wrapper py-3">
          @yield('content')
        </div>
        @include('includes.header')
        @yield('modals')

        {{-- Scripts --}}
        <script src="{{asset("assets/main/js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.min.js")}}"></script>
        <script src="{{asset("assets/main/js/default/internet-status.js")}}"></script>
        <script src="{{asset("assets/main/js/waypoints.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.easing.min.js")}}"></script>
        <script src="{{asset("assets/main/js/wow.min.js")}}"></script>
        <script src="{{asset("assets/main/js/owl.carousel.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.counterup.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.countdown.min.js")}}"></script>
        <script src="{{asset("assets/main/js/imagesloaded.pkgd.min.js")}}"></script>
        <script src="{{asset("assets/main/js/isotope.pkgd.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.magnific-popup.min.js")}}"></script>
        <script src="{{asset("assets/main/js/default/dark-mode-switch.js")}}"></script>
        <script src="{{asset("assets/main/js/ion.rangeSlider.min.js")}}"></script>
        <script src="{{asset("assets/main/js/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("assets/main/js/default/active.js")}}"></script>
        <script src="{{asset("assets/main/js/default/clipboard.js")}}"></script>
        <!-- Apex Chart-->
        <script src="{{asset("assets/main/js/apexcharts.min.js")}}"></script>
        <script src="{{asset("assets/main/js/default/chart-active.js")}}"></script>
        <!-- PWA-->
        <script src="{{asset("assets/main/js/pwa.js")}}"></script>
        {{--toastr--}}
        <script src="{{asset("assets/toastr/toastr.min.js")}}"></script>
        <script>
            @if(Session()->has('success'))
                toastr.success("{{Session('success')}}")
            @endif
            @if(Session()->has('warning'))
                toastr.warning("{{Session('warning')}}")
            @endif
            @if(Session()->has('error'))
                toastr.error("{{Session('error')}}")
            @endif
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    toastr.error("{{$error}}")
                @endforeach
            @endif
        </script>
        @yield('scripts')
    </body>
</html>
