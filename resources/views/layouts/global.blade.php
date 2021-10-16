<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/jquery/dist/jquery.slim.min.js') }}"></script>

    <!-- CSS files -->
    <link href="{{ asset('libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/temp.min.css') }}" rel="stylesheet"/>
</head>

  <body class="antialiased">
    <div class="page">
        @include('layouts.include.menu')
        @yield('content')
    </div>
</body>
</html>
