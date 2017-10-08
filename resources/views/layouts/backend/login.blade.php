<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/backend/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/bootstrap.css.map') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="{{ mix('css/backend/login.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">

    <div class="login-box">
        @yield('content')
    <!-- /.login-box-body -->
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="{{ mix('js/backend/jquery.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ mix('js/backend/bootstrap.js') }}"></script>

    <script src="{{ mix('js/backend/login.js') }}"></script>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>


</body>
</html>
