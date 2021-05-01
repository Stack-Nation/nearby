<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#0134d4">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
            {{-- <link rel="stylesheet" href="{{asset("assets/main/css/apexcharts.css")}}"> --}}
            <!-- Core Stylesheet-->
            <link rel="stylesheet" href="{{asset("assets/main/style.css")}}">
            <link rel="stylesheet" href="{{asset("assets/main/css/svgicons.css")}}">
            <!-- Web App Manifest-->
            <link rel="manifest" href="{{asset("assets/main/manifest.json")}}">
        <link type="text/css" href="{{asset("assets/toastr/toastr.min.css")}}" rel="stylesheet" />
        @yield('head')
    </head>
    <body>
        <!-- Preloader-->
        <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
          <div class="spinner-grow text-primary" role="status">
            <div class="sr-only"></div>
          </div>
        </div>
        <!-- Internet Connection Status-->
        <div class="internet-connection-status" id="internetStatus"></div>
        <div id="setting-popup-overlay"></div>
    <!-- Setting Popup Card-->
    <div class="card setting-popup-card shadow-lg" id="settingCard">
      <div class="card-body">           
        <div class="container">
          <div class="setting-heading d-flex align-items-center justify-content-between mb-3">
            <p class="mb-0">Settings</p><a class="btn-close" id="settingCardClose" href="#"></a>
          </div>
          
          
          <div class="single-setting-panel">
            <div class="form-check form-switch mb-2">
              <input class="form-check-input active" type="checkbox" id="darkSwitch">
              <label class="form-check-label" for="darkSwitch">Dark mode</label>
            </div>
          </div>
          
        </div>
      </div>
    </div>
        <!-- Header Area-->
        <div class="header-area" id="headerArea">
          <div class="container">
            <!-- Header Content-->
            <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
              <!-- Back Button-->
              
          <div class="logo-wrapper"><a href="{{route("index")}}"><img src="{{asset("assets/main/img/bg-img/logo.png")}}" alt=""></a></div>
              <!-- Page Title-->
              <div class="page-heading">
                <h6 class="mb-0">{{ config('app.name') }} | @yield("title")</h6>
              </div>
              <div class="setting-wrapper"><a class="setting-trigger-btn" id="settingTriggerBtn" href="#"><svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-gear" fill="url(#gradientSettings)" xmlns="http://www.w3.org/2000/svg">
<defs>
<linearGradient spreadMethod="pad" id="gradientSettings" x1="0%" y1="0%" x2="100%" y2="100%">
<stop offset="0" style="stop-color: #0134d4; stop-opacity:1;"/>
<stop offset="100%" style="stop-color: #28a745; stop-opacity:1;"/>
</linearGradient>
</defs>
<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg><span></span></a></div>
              <!-- Navbar Toggler-->
              <div @if(Route::is("admin*")) class="navbar--toggler" @endif id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
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
        {{-- <script src="{{asset("assets/main/js/apexcharts.min.js")}}"></script>
        <script src="{{asset("assets/main/js/default/chart-active.js")}}"></script> --}}
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
