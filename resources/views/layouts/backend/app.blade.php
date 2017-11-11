<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ mix('backend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> --}}
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="{{ mix('backend/css/app.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->{{--
    <link href="{{ asset('/bower_components/admin-lte/dist/css/skins/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />--}}


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
</head>
<body class="skin-blue">
    <div class="wrapper">

        @include('backend.includes.header')
        
        @include('backend.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content_header')

            <!-- Main content -->
            <section class="content">
                @include('backend.includes.messages')
                @yield('content')
                <!-- Your Page Content Here -->
                <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
                <?php echo session('btnPagSeguro');?>
                <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @include('backend.includes.footer')
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <script type="text/javascript">var src="/admin/"</script>
    <!-- jQuery 2.1.3 -->
    <script src="{{ mix ('backend/js/jquery.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ mix ('backend/js/bootstrap.js') }}" type="text/javascript"></script>

    <!-- date-range-picker -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 --}}

    <!-- AdminLTE App -->
    <script src="{{ mix ('backend/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ mix ('backend/js/main.js') }}" type="text/javascript"></script>
    <script src="http://malsup.github.io/min/jquery.form.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(window).on("load", function() {
            $('.select2').css({
                'width': '100%'
            });
        });
    </script>



    <div class="modal" id="ajaxLoader">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        <img class="" src="{!!asset('img')!!}/loading.gif">
                    </p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
    Both of these plugins are recommended to enhance the
    user experience -->


    

</body>
</html>
