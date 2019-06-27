<!DOCTYPE html>
{{-- <style>
        body{
            background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
        }
</style> --}}
 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IARS') }}</title>

    <!-- Scripts -->
    <script><reference path="../typings/globals/jquery/index.d.ts" /></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/ee8f29eb14.js"></script>
    
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    
    
        @include('inc.pracnav')
        @include('inc.messages')
        {{-- @include('inc.sidebar')
        @include('inc.script') --}}
        <div class="container">
            @yield('content')
        </div>
</body>
</html>
