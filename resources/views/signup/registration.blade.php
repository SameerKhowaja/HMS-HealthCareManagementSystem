<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('login-register-form/images/icons/login-register.ico')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/css/main.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset('login-register-form/images/bg-01.jpg')}}');">
            <div class="wrap-login100 wrapper fadeInDown">
                <form method="POST" action="/laravel/public/patient-registration-progress" class="login100-form validate-form">
                @csrf
                    <span class="login100-form-title fadeIn second">Signup Form</span>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="First name is required: firstname">
                        <input class="input100" type="text" name="fname" placeholder="First Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Last name is required: lastname">
                        <input class="input100" type="text" name="lname" placeholder="Last Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email_id" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Valid cnic is required: 41303XXXXXXXX">
                        <input class="input100" type="text" name="cnic" placeholder="41303XXXXXXXX">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Valid phone number is required: 923332134598">
                        <input class="input100" type="text" name="phone_number" placeholder="923332134598">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 fadeIn second">
                        <select class="input100 form-control" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-mars" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input fadeIn second" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn fadeIn third">
                        <button type="submit" class="login100-form-btn">Register</button>
                    </div>

                    <div class="text-center p-t-12 fadeIn third">
                        <span class="txt1">Have already an account ?</span>
                        <a class="txt2" href="/laravel/public/">Login</a>
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </div>
                </form>

                <div class="login100-pic js-tilt" data-tilt>
                    <br><br><br><br><br>
                    <img src="{{asset('login-register-form/images/img-02.png')}}" alt="IMG">
                </div>

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
