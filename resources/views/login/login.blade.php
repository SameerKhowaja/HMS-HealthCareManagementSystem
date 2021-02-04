<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('hms/icons/login-register.ico')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/css/main.css')}}">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <!-- <h1 class="logo mr-auto"><a href="index.html">Medilab</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo mr-auto"><img src="{{asset('hms/images/hms_logo.png')}}" alt="logo" class="img-fluid"></a>
            <a href="/" class="appointment-btn scrollto">Home Page</a>
        </div>
    </header>
    <!-- End Header -->

    <div class="limiter">
        <div class="container-login100 top-Login" style="background-image: url('{{asset('hms/images/bg-01.jpg')}}');">
            <div class="wrap-login100 wrapper fadeInDown">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('login-register-form/images/img-03.png')}}" alt="IMG">
                </div>

                <form method="POST" action="/login" class="login100-form validate-form">
                @csrf
                    <span class="login100-form-title fadeIn second">Login Form</span>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email_id" placeholder="Email or CNIC">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 fadeIn second">
                        <select class="input100 form-control" name="LoginAs">
                            @foreach($typesList as $data)
                                <option value="{{$data->type_id}}">{{$data->type_name}}</option>
                            @endforeach
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <!-- If wrong login  -->
                    @if($message!=='none')
                        <div style='margin-left: 20px; margin-right: 20px;' class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message??''}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="container-login100-form-btn fadeIn third">
                        <button type="submit" class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center p-t-12 fadeIn third">
                        <span class="txt1">Forgot</span>
                        <a class="txt2" href="#">Password?</a>
                    </div>

                    <div class="text-center p-t-12 fadeIn third">
                        <a class="txt2" href="/patient-registration">Create patient Account<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('login-register-form/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('login-register-form/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-register-form/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('login-register-form/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
</body>

</html>
