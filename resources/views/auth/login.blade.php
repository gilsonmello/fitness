<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ mix('backend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ mix('backend/css/app.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Miranda</b>Fitness</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('strings.login') }}</p>

            <form method="POST" action="{{ route('auth.login') }}" role="form">

                @include('backend.includes.messages')
            
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input value="{{ old('email') }}" id="email" type="email" class="form-control" name="email" placeholder="{{ trans('strings.email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input id="password" name="password" required type="password" class="form-control" placeholder="{{ trans('strings.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" class="minimal" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('strings.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                {{-- <p>- OR -</p> --}}
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook-f"></i> {{ trans('strings.login_with_facebook') }}</a>
                {{-- <a href="#" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i> Sign in using
                    Google+</a> 
                --}}
            </div>
            <!-- /.social-auth-links -->

            <a href="{{ route('auth.password.request') }}">
                {{ trans('strings.I_forgot_my_password') }}
            </a>

            <br>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ mix ('backend/js/jquery.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ mix ('backend/js/bootstrap.js') }}" type="text/javascript"></script>

    <!-- date-range-picker -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 --}}
    <!-- AdminLTE App -->
    <script src="{{ mix ('backend/js/app.js') }}" type="text/javascript"></script>
    
</body>
</html>
