@if(session('userID')!==NULL && session('userType')=='admin')
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

    <script src="{{asset('external-libraries/js/codejquery-3.5.1.js')}}"></script>
    <!-- charts.js -->
    <script src="{{asset('external-libraries/js/cloudflareChart.min.js')}}"></script>
    <title>Admin</title>
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
                        <!-- Past Event Button -->
                        <li class="text-normal" style="margin-right:7px;">
                            <a href="/admin/past-event">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="2em" height="2em" fill="#0062CC" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="none" d="M9 4h6v2H9z"/>
                                <path d="M20 11h-7a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2z"/>
                                <path d="M21 9V6a2 2 0 0 0-2-2h-2a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h4v-9a2 2 0 0 1 2-2h10zM9 6V4h6v2H9z"/>
                            </svg>
                            </a>
                        </li>
                        <!-- Announcement Button -->
                        <li class="text-normal" style="margin-right:7px;">
                            <a href="/admin/message">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="2em" height="2em" fill="#0062CC" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path d="M4 18h2v4.081L11.101 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2z"/>
                                    <path d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z"/>
                                </svg>
                            </a>
                        </li>
                        <!-- Divider -->
                        <div class="topbar-divider d-none d-sm-block" style="margin-right:15px;"></div>
                        <!-- Navbar -->
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
                                    <a class="dropdown-item" href="/admin">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/admin/editProfile/{{session('userID')}}">Edit Profile</a>
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
