<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    {{-- <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,"> --}}
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('material/images/favicon/favicon-32x32.png') }}" sizes="32x32">

    {{-- <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}"> --}}
    <!-- For iPhone -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Meta Tag -->
    {{-- <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/mstile-144x144.png') }}"> --}}
    <!-- For Windows Phone -->

    <!-- CORE CSS-->
    {{-- <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet"> --}}
    <link href="{{ asset('material/css/materialize.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('material/css/style.css') }}" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="{{ asset('material/css/custom/custom.css') }}" type="text/css" rel="stylesheet">
    @stack('styles')
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('material/vendors/prism/prism.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('material/vendors/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('material/vendors/flag-icon/css/flag-icon.min.css') }}" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div id="app">
      {{-- @include('partials.material-dash.preloader') --}}
      @include('partials.material-dash.header')
      <div id="main">
        <div class="wrapper">
          @include('partials.material-dash.glass-sidebar')

          @yield('content')

          {{-- @include('partials.material-dash..right-sidebar') --}}
        </div>
      </div>
      @include('partials.material-dash.footer')
    </div>

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ asset('material/vendors/jquery-3.2.1.min.js') }}"></script>
  <!--materialize js-->
  {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
  <script type="text/javascript" src="{{ asset('material/js/materialize.js') }}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ asset('material/vendors/prism/prism.js') }}"></script>

  @stack('scripts')
  <!--scrollbar-->
  <script type="text/javascript" src="{{ asset('material/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="{{ asset('material/js/plugins.js') }}"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="{{ asset('material/js/custom-script.js') }}"></script>
  </body>
</html>
