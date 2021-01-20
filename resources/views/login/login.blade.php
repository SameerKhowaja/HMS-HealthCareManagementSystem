<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('loginform/images/icons/favicon.ico')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginform/css/main.css')}}">

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset('loginform/images/bg-01.jpg')}}');">
            <div class="wrap-login100 wrapper fadeInDown">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('loginform/images/img-01.png')}}" alt="IMG">
                </div>

                <form method="POST" action="/laravel/public/profile" class="login100-form validate-form">
                @csrf
                    <span class="login100-form-title fadeIn second">Login Form</span>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email_id" placeholder="Email">
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
                        <a class="txt2" href="#">Username / Password?</a>
                    </div>

                    <div class="text-center p-t-12 fadeIn third">
                        <a class="txt2" href="#">Create patient Account<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('loginform/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('loginform/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('loginform/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('loginform/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script src="{{asset('loginform/js/main.js')}}"></script>
</body>

</html>
