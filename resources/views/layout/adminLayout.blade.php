@if(session('userID')!==NULL && session('userType')=='admin')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('resources/css/adminstyle.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/sideNav.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/topNav.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/Admin/users.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/Admin/adminOverview.css')}}">
    <link rel="stylesheet" href="{{asset('resources/sass/css/responsive.css')}}">

    <!-- charts.js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <title>Admin Dashboard</title>
</head>

<body style='background-color: #D1DADC;'>
    <header>
        @yield('navSection')
    </header>

    <main class="mainWrapper">
        <section class="topNav" style='border-bottom: 0.5px solid #88B0B9;'>
            <div class="hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <g fill="none"><path d="M4 6h16M4 12h16M4 18h7" stroke="#0052E9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                </svg>
            </div>

            <div>
                <div class="topNav-btnWrapper"> </div>
                    <div class="profile-wrapper">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a style='font-size: 15px;' class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset('resources/images/profile.png')}}" width="35" height="40" class="rounded-circle">
                                    {{session('username')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/laravel/public/admin">Dashboard</a>
                                    <a class="dropdown-item" href="/laravel/public/admin/editProfile/{{session('userID')}}">Edit Profile</a>
                                    <a class="dropdown-item" href="/laravel/public/">Log Out</a>
                                </div>
                            </li>

                            <li class="nav-item">
                            <li>
                        </ul>
                    </div>
            </div>
        </section>

@yield('content')

    </main>

    <!-- bootstrap enabled -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

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
<meta http-equiv="refresh" content="0; url=/laravel/public/error-page" />
</head>
<body>
</body>
</html>
@endif
