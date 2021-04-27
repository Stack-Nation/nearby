<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield("title")</title>

        <!-- vendor css -->
        <link href="{{asset("assets/main/lib/@fortawesome/fontawesome-free/css/all.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/main/lib/ionicons/css/ionicons.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/main/lib/jqvmap/jqvmap.min.css")}}" rel="stylesheet">
    
        <!-- DashForge CSS -->
        <link rel="stylesheet" href="{{asset("assets/main/assets/css/dashforge.css")}}">
        <link rel="stylesheet" href="{{asset("assets/main/assets/css/dashforge.dashboard.css")}}">
        <link type="text/css" href="{{asset("assets/toastr/toastr.min.css")}}" rel="stylesheet" />
        @yield('head')
    </head>
    <body class="font-sans antialiased">
        @if(Route::is("admin*"))
        @include('includes.sidebar')
        @endif

        <div class="content ht-100v pd-0">
          @include('includes.header')
          <div class="content-body">
              @yield('content')
          </div>
        </div>
        @yield('modals')

        {{-- Scripts --}}
        <script src="{{asset("assets/main/lib/jquery/jquery.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/feather-icons/feather.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/jquery.flot/jquery.flot.js")}}"></script>
        <script src="{{asset("assets/main/lib/jquery.flot/jquery.flot.stack.js")}}"></script>
        <script src="{{asset("assets/main/lib/jquery.flot/jquery.flot.resize.js")}}"></script>
        <script src="{{asset("assets/main/lib/chart.js/Chart.bundle.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/jqvmap/jquery.vmap.min.js")}}"></script>
        <script src="{{asset("assets/main/lib/jqvmap/maps/jquery.vmap.usa.js")}}"></script>
    
        <script src="{{asset("assets/main/assets/js/dashforge.js")}}"></script>
        <script src="{{asset("assets/main/assets/js/dashforge.aside.js")}}"></script>
        <script src="{{asset("assets/main/assets/js/dashforge.sampledata.js")}}"></script>
        <script src="{{asset("assets/main/assets/js/dashboard-one.js")}}"></script>
    
        <!-- append theme customizer -->
        <script src="{{asset("assets/main/lib/js-cookie/js.cookie.js")}}"></script>
        <script src="{{asset("assets/main/assets/js/dashforge.settings.js")}}"></script>
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
        <script async src="https://maps.googleapis.com/maps/api/js?key={{env("GOOGLE_MAPS_API")}}&callback=initMap"></script>
        @yield('scripts')
    </body>
</html>
