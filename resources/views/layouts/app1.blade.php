<!DOCTYPE html>
<style>
        body{
            background-image: url("http://ves.ac.in/vesit/wp-content/uploads/sites/3/2015/11/IMG_93121-optimized.jpg");
            background-repeat: no-repeat;
            background-size: cover; 
            font-size: 0.9rem;
        }
#mySidenav a {

  position: absolute;
  left: -110px;
  transition: 0.3s;
  padding: 10px;
  width: 170px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
}

#dashboard{
  top: 150px;
  background-color:rgba(0,0,0,0.7) !important;
}

#put {
  top: 330px;
  background-color:rgba(0,0,0,0.7) !important;
}

#check {
  top: 390px;
  background-color:rgba(0,0,0,0.7) !important;
}

#about {
  top: 210px;
  background-color:rgba(0,0,0,0.7) !important;
}
#contact {
  top: 270px;
  background-color:rgba(0,0,0,0.7) !important;
}
span{
     color: #FFC312;
     
}
</style>
 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IARS') }}</title>

    <!-- Scripts -->
    <reference path="../typings/globals/jquery/index.d.ts" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/ee8f29eb14.js"></script>

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
      @include('inc.pracnav')
      <div id="mySidenav" class="sidenav">
                <a href="#" id="dashboard">Dashboard<span><i class="fas fa-tachometer-alt float-right" style="margin-top:5px"></i></span></a>
                <a href="#" id="about">About Us<span><i class="fas fa-address-card float-right"  style="margin-top:5px"></i></span></a>
                <a href="#" id="contact">Contact <span><i class="fas fa-phone float-right"  style="margin-top:5px"></i></span></a>
                @if(Auth::guard('teacher')->check())
                <a href="#" id="put">Put Marks<span><i class="far fa-check-circle float-right"  style="margin-top:5px"></i></span></a>
                <a href="#" id="check">Status<span><i class="fas fa-search float-right"  style="margin-top:5px"></i></span></a>
                @endif
                
        </div>
             @yield('content')
    
</html>
