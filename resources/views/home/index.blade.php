<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HMS - HealthCare Management System</title>

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
            <a href="index.html" class="logo mr-auto"><img src="{{asset('hms/images/hms_logo.png')}}" alt="logo" class="img-fluid"></a>
            <!-- .nav-menu -->
            <a href="/patient-registration" class="appointment-btn scrollto">Patient Registration</a>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="background-image: url('{{asset('hms/images/bg-01.jpg')}}');">
        <div class="container">
            <h1>Welcome to HMS</h1>
            <h2>HealthCare Management System</h2>
            <a href="/login" class="btn btn-lg btn-get-started scrollto">Login</a>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>What is HMS?</h3>
                            <p>
                                Health Care Management System website is a software product suite designed to improve the quality and management of hospital. Hospital Management System Simply it enables you to develop your organization and improve its effectiveness and quality of work.
                                Managing the key processes efficiently is critical to the success of the hospital and helps you manage your processes. It deals with the collection of patient’s information, diagnosis details, etc.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-accessibility"></i>
                                        <h4>Patients</h4>
                                        <p>The more information patients have about health care, the better they can make decisions about what is best for them.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-street-view"></i>
                                        <h4>Doctors</h4>
                                        <p>Maintain and restore human health through the practice of medicine. They examine patients, review their medical history etc.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bxs-user-detail"></i>
                                        <h4>Other Staff</h4>
                                        <p>Hospital Staff work to support the day-to-day running of the hospital and facilitate patient care within the hospital system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .content-->
                    </div>
                </div>

            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="icofont-users-alt-1"></i>
                            <span data-toggle="counter-up">{{$patientCount ?? '0'}}</span>
                            <p>Patient Registered</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="icofont-doctor-alt"></i>
                            <span data-toggle="counter-up">{{$doctorCount ?? '0'}}</span>
                            <p>Doctors</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="icofont-patient-bed"></i>
                            <span data-toggle="counter-up">{{$bedCount ?? '0'}}</span>
                            <p>Number of Beds</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="icofont-laboratory"></i>
                            <span data-toggle="counter-up">150</span>
                            <p>Lab Tests Performed</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Features/Services</h2>
                    <p>The Hospital Management System can be entered using a username and password. HMS application basic features include searching and retrieving data from database, filtering data etc. Moreover, it improves the communication and interaction
                        of doctors with their patients. It enhances information integrity by a reduction in transcription errors and duplication of information entries. Website avoid errors and track every single detail.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-address-book"></i></div>
                            <h4><a href="">Registration</a></h4>
                            <p>Patient can register easily by clicking Register Button top while Doctors and other Staff registration done via Admin Panel.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-doctor"></i></div>
                            <h4><a href="">Create Appointment</a></h4>
                            <p>After Registration & Login process. Patient can View Doctors and create an appointment with Doctor through Receptionist.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-laboratory"></i></div>
                            <h4><a href="">Lab Technician</a></h4>
                            <p>Patient can have a Lab Test Performed through Lab Technician, which later uploads patient test report to patient dashboard.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-history"></i></div>
                            <h4><a href="">Patient History</a></h4>
                            <p>Patient is able to view all his History data like Doctors visits, admission date, lab test performed and all other reports.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-presentation"></i></div>
                            <h4><a href="">Doctors Research</a></h4>
                            <p>Doctors are also able to view their visited patient history in the form of graph, which they can use for their research work.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-autism"></i></div>
                            <h4><a href="">Administrator</a></h4>
                            <p>Admin are responsible for organizing and overseeing the health services and daily activities of a hospital or healthcare facility.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Doctors Section ======= -->
        <section id="doctors" class="doctors">
            <div class="container">

                <div class="section-title">
                    <h2>Doctors</h2>
                    <p>Doctors, also known as Physicians, are health professionals who maintain and restore human health through the practice of medicine. They examine patients, review their medical history, diagnose illnesses or injuries, administer treatment
                        and counsel patients on their health and well being.</p>
                    <br>
                    <a href="/view-doctors-list" target="_blank" class="btn btn-primary btn-lg">View All Doctors</a>
                </div>

            </div>
        </section>
        <!-- End Doctors Section -->

        <!-- ======= News/Updates Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="section-title">
                    <h2>News/Updates</h2>
                </div>

                <div class="owl-carousel testimonials-carousel">
                @if($dataFetched??''!='none')
                    @foreach($dataFetched as $data)
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{asset('home-page/img/quotation.png')}}" class="testimonial-img" alt="">
                            <h3>{{$data->fname.' '.$data->lname}}</h3>
                            <h4>Administration</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$data->message}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
                </div>
            </div>
        </section>
        <!-- End News/Updates Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <h5 class="copyright">Thank for Visiting <strong><span>Hospital System</span></strong>.</h5>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#contactUs_Modal">Contact Us</button>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Contact Us Modal -->

    <!--Begin Modal Window-->
    <div class="modal fade" id="contactUs_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/contact-us" method="POST">
                @csrf
                    <div class="modal-header ">
                        <h5 class="modal-title" style="margin:auto;">Contact Us</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Full Name:</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email_id" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact Us Modal -->

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
