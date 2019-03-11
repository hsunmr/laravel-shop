<!DOCTYPE html>
<html lang="zh-TW">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/shop_backend.css')}}" rel="stylesheet"> 

</head>

<body>
   
  <div id="wrapper">
    @include('backend.layouts.sidebar')  

    <div id="content-wrapper">

      @include('backend.layouts.navbar')  
  
      @yield('content')

    </div>

  </div>
  <!-- Bootstrap core JavaScript -->
  
  <script src="{{asset('jquery/jquery.min.js')}}"></script> 
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('fontawesome/js/all.min.js')}}"></script>

</body>


</html>
