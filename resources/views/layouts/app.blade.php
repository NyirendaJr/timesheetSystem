<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Timesheet - Welcome</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- Morris Charts CSS -->
  <!-- <link href="{{ asset('assets/css/morris.css')}}" rel="stylesheet"> -->
  <!-- Custom Fonts -->
  <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/custome-style.css') }}">
</head>
<body>
  <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/" id="brand">
            Timesheet management System
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        @if (Route::has('login'))
          <ul class="nav navbar-nav navbar-right">
            @auth
            <li class=""><a href="{{ route('home') }}"><i class="fa fa-home"></i>&nbspHome</a></li>
            @else
            <li class=""><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>&nbspLogin</a></li>
            <li class=""><a href="{{ route('register') }}"><i class="fa fa-plus-square"></i>&nbspRegister</a></li>
            @endauth
          </ul>
        @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('assets/js/raphael.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/morris.min.js') }}"></script>
    <script src="{{ asset('assets/js/morris-data.js') }}"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
  
</body>
</html>
