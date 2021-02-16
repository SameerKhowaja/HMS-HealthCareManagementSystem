<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Doctors List</title>

    <!-- Favicons -->
    <link href="{{asset('hms/images/favicon.ico')}}" rel="icon">

    <!-- Google Fonts -->
    <link href="{{asset('home-page/css/fonts-googleapis.css')}}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('home-page/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('home-page/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('home-page/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <!-- <h1 class="logo mr-auto"><a href="index.html">Medilab</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo mr-auto"><img src="assets/img/hms_logo.png" alt="" class="img-fluid"></a>
            <a href="/" class="appointment-btn scrollto">Home Page</a>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors">
            <div class="container">

                <div class="section-title">
                    <br>
                    <h2>Doctor's List</h2>
                </div>

                <div class="row">
                    @if($doctorData != 'none')
                        @foreach($doctorData as $data)
                            <div class="col-lg-4 mt-4">
                                <div class="member d-flex align-items-start">
                                    <div class="pic">
                                        @if($data->image == '')
                                            <img class="img-fluid" width='370px' height='370px' src="{{asset('resources/images/profile.png')}}" alt="profile">
                                        @else
                                            <img class="img-fluid" width='370px' height='370px' src='{{"data:image/*;base64,".$data->image}}' alt="profile">
                                        @endif
                                    </div>
                                    <div class="member-info">
                                        <h4>{{$data->fname.' '.$data->lname}}</h4>
                                        @if($data->specialist == '')
                                            <span>N/A</span>
                                        @else
                                            <span>{{$data->specialist}}</span>
                                        @endif
                                        <div class="social">
                                            <a href=""><i class="ri-twitter-fill"></i></a>
                                            <a href=""><i class="ri-facebook-fill"></i></a>
                                            <a href=""><i class="ri-instagram-fill"></i></a>
                                            <a href=""> <i class="ri-linkedin-box-fill"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>
        <!-- End Doctors Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <h5 class="copyright">Thank for Visiting <strong><span>Hospital System</span></strong>.</h5>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('home-page/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('home-page/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home-page/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('home-page/js/main.js')}}"></script>

</body>

</html>
