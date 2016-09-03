<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Greatspan - @yield("title")</title>

    <!-- Bootstrap CSS -->    
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ URL::to('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    
    <!-- font icon -->
    <link href="{{ URL::to('css/elegant-icons-style.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/font-awesome.min.css')}}" rel="stylesheet">
    @stack('styles')
    <!-- Custom styles -->
    <link href="{{ URL::to('css/style.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/style-responsive.css')}}" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
</head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      
         @yield("header")

      
         @yield("sidebar")
      

      <!--main content start-->
          @yield("main-content")
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <!--<script src="{{asset('js/jquery.js')}}"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="{{ URL::to('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ URL::to('js/jquery.nicescroll.js')}}"></script>
    <!-- App scripts -->
    @stack('scripts')
    <script src="{{ URL::to('js/scripts.js')}}"></script>
    <script>
        var token = '{{ Session::token() }}';
        var root = "{{ url('/') }}";
    </script>


  </body>
</html>
