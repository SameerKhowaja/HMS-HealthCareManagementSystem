@if(session('userID')!==NULL && session('userType')=='receptionist')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('external-libraries/css/jsdelivrbootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/adminstyle.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/sideNav.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/topNav.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/Admin/users.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/Admin/adminOverview.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login-register-form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/doctorTime.css')}}">

    <link rel="stylesheet" href="{{asset('external-libraries/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('external-libraries/css/jquery-ui.structure.min.css')}}">
    <link rel="stylesheet" href="{{asset('external-libraries/css/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/datepicker_style.css')}}">
    <script src="{{asset('external-libraries/js/ajax-jquery.min.js')}}"></script>
    <script src="{{asset('external-libraries/js/codejquery-3.5.1.js')}}"></script>
    
    <script src="{{asset('external-libraries/js/jquery-ui.min.js')}}"></script>

    
    <!-- charts.js -->
    <script src="{{asset('external-libraries/js/cloudflareChart.min.js')}}"></script>
    <title>Receptionist</title>
</head>

<body style='background-color: #D1DADC;'>
    <header>
        <nav class="sideNav sidebar-wrapper">
            <div class="brand">
                <img width="185" height="50" src="{{asset('hms/hms_logo.png')}}" alt="brand">
            </div>
            <!-- Side navbar -->
            @yield('navSection')
        </nav>
    </header>

    <main class="mainWrapper">
        <section class="topNav" style='border-bottom: 0.5px solid #88B0B9;'>
            <div class="hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <g fill="none">
                        <path d="M4 6h16M4 12h16M4 18h7" stroke="#0052E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                </svg>
            </div>

            <div>
                <div class="topNav-btnWrapper"> </div>
                    <div class="profile-wrapper">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a style='font-size: 15px;' class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(session("image") != '')
                                        <img src='{{"data:image/*;base64,".session("image")}}' width="35" height="40" class="rounded-circle">
                                    @else
                                        <img src="{{asset('resources/images/profile.png')}}" width="35" height="40" class="rounded-circle">
                                    @endif
                                    {{session('username')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/receptionist">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/receptionist/editReceptionistProfile/{{session('userID')}}">Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/login">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
            </div>
        </section>

@yield('content')

    </main>

    <!-- bootstrap enabled -->
    <script src="{{asset('external-libraries/js/codejquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('external-libraries/js/jsdelivrpopper.min.js')}}"></script>
    <script src="{{asset('external-libraries/js/jsdelivrbootstrap.min.js')}}"></script>

    <script src="{{asset('resources/js/app.js')}}"></script>
    <!-- <script src="./assets/js/app.js"></script> -->
    <script src="{{asset('resources/js/Charts/progressCharts.js')}}"></script>
    <!-- <script src="./assets/js/Charts/progressCharts.js"></script> -->
    <script src="{{asset('resources/js/Charts/usersGrowth.js')}}"></script>
    <!-- <script src="./assets/js/Charts/usersGrowth.js"></script> -->
    <script src="{{asset('resources/js/Charts/tutorsGrowth.js')}}"></script>
    <!-- <script src="./assets/js/Charts/tutorsGrowth.js"></script> -->
    <script src="{{asset('external-libraries/js/bootstrap-select.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('external-libraries/css/bootstrap-select.min.css')}}">
</body>

</html>

@else
<!-- Redirects to Error Page -->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0; url=/error-page" />
</head>
<body>
</body>
</html>
@endif
