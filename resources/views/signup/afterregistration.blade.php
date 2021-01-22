<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Process</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('login-register-form/images/icons/login-register.ico')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('register-check/css/main.css')}}">

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset('login-register-form/images/bg-01.jpg')}}');">
            <div class="wrap-login100 fadeIn first">
                <form method="GET" action="/laravel/public/" class="login100-form">

                    <span class="login100-form-logo fadeIn first">
                        <i class="zmdi zmdi-accounts-alt"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27 fadeIn second">Welcome! {{$User ?? ''}}</span>

                    <div class="wrap-input100 fadeIn third">
                        <div class="alert alert-warning fade show text-center" role="alert">
                            <strong>{{$msg ?? ''}}</strong> {{$msg_more ?? ''}}
                        </div>
                    </div>

                    <div class="container-login100-form-btn fadeIn third">
                        <button class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-25 fadeIn third">
                        <a class="txt1" href="/laravel/public/patient-registration">Register New Patient</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script src="{{asset('register-check/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('register-check/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('register-check/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('register-check/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('register-check/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('register-check/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('register-check/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('register-check/vendor/countdowntime/countdowntime.js')}}"></script>
    <script src="js/main.js"></script>

</body>

</html>
