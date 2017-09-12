<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Miranda Fitness</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        
        <!-- Bootstrap
        <link href="/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        Font Awesome
        <link href="/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        iCheck
        <link href="/bower_components/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        bootstrap-progressbar
        <link href="/bower_components/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        jVectorMap
        <link href="/bower_components/gentelella/production/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
        
        Custom Theme Style
        <link href="/bower_components/gentelella/build/css/custom.min.css" rel="stylesheet"> -->

        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
   </head>
<body class="nav-md">
    <!-- Conteúdo -->
    <div id="app">
        @yield('content')
        <app></app>
    </div>
    <!-- Fim conteúdo -->

    <script src="{{ asset('js/app.js') }}"></script><!-- 
    <script src="{{ asset('js/gentelella.js') }}"></script> -->

    <!-- <script src="/bower_components/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    
    Bootstrap
    <script src="/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    FastClick
    <script src="/bower_components/gentelella/vendors/fastclick/lib/fastclick.js"></script>
    NProgress
    <script src="/bower_components/gentelella/vendors/nprogress/nprogress.js"></script>
    Chart.js
    <script src="/bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    gauge.js
    <script src="/bower_components/gentelella/vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    bootstrap-progressbar
    <script src="/bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    iCheck
    <script src="/bower_components/gentelella/vendors/iCheck/icheck.min.js"></script>
    Skycons
    <script src="/bower_components/gentelella/vendors/skycons/skycons.js"></script>
    Flot
    <script src="/bower_components/gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="/bower_components/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/bower_components/gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/bower_components/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/bower_components/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    Flot plugins
    <script src="/bower_components/gentelella/production/js/flot/jquery.flot.orderBars.js"></script>
    <script src="/bower_components/gentelella/production/js/flot/date.js"></script>
    <script src="/bower_components/gentelella/production/js/flot/jquery.flot.spline.js"></script>
    <script src="/bower_components/gentelella/production/js/flot/curvedLines.js"></script>
    jVectorMap
    <script src="/bower_components/gentelella/production/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    bootstrap-daterangepicker
    <script src="/bower_components/gentelella/production/js/moment/moment.min.js"></script>
    <script src="/bower_components/gentelella/production/js/datepicker/daterangepicker.js"></script>
    
    Custom Theme Scripts
    <script src="/bower_components/gentelella/build/js/custom.min.js"></script> -->

</body>
</html>
