@extends('layout.patientLayout')

@section('navSection')
        <!-- Brand Image is in adminLayout -->
            <ul class="navLists">
                <a href="/laravel/public/patient">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg> Profile
                    </li>
                </a>

                <a href="/laravel/public/patient/doctor-appointment">
                    <li class="active text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg> Doctor's Appointment
                    </li>
                </a>

                <a href="/laravel/public/patient/current-appointment">
                    <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975l1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                    </svg> Current Appointment
                    </li>
                </a>

                <a href="/laravel/public/patient/appointments-detail">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M7.646.146a.5.5 0 0 1 .708 0L10.207 2H14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3.793L7.646.146zM1 7v3h14V7H1zm14-1V4a1 1 0 0 0-1-1h-3.793a1 1 0 0 1-.707-.293L8 1.207l-1.5 1.5A1 1 0 0 1 5.793 3H2a1 1 0 0 0-1 1v2h14zm0 5H1v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zM2 4.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                        </svg> Appointments Detail
                    </li>
                </a>

                <a href="/laravel/public/patient/lab-test">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                        </svg> Lab Tests
                    </li>
                </a>

                <a href="/laravel/public/patient/admissions-detail">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> Admissions Detail
                    </li>
                </a>

                <a href="/laravel/public/patient/contact-us">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <g>
                                <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </g>
                        </svg> Contact Us
                    </li>
                </a>
            </ul>
        </nav>
@endsection

@section('content')
    <div>

        <div style='margin-top:2%; margin-bottom:2%;'>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Admin / Doctor's Appointment</h3>
            </div>

            <!-- Hospital table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                                <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                            </div>
                    </div>
                </div>

                <!-- Patient table Start -->
                <div class="table-responsive-sm">
                    <table id="RecordTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center">Image</th>
                                <th scope="col" style="text-align:center">Full Name</th>
                                <th scope="col" style="text-align:center">Gender</th>
                                <th scope="col" style="text-align:center">Specialist</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>
                            @foreach($dataFetched as $data)
                            @if($data->specialist != '')
                            <tr>
                                <td style="text-align:center">
                                    @if($data->image == '')
                                        <img class="profile" src="{{asset('resources/images/profile.png')}}" alt="profile">
                                    @else
                                        <img class="profile" src='{{"data:image/*;base64,".$data->image}}' alt="profile">
                                    @endif
                                </td>

                                <td style="text-align:center">{{$data->fname.' '.$data->lname}}</td>
                                <td style="text-align:center">{{$data->gender}}</td>
                                <td style="text-align:center">{{$data->specialist}}</td>

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit - Delete -->
                                        <a id='{{$data->doctor_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewDoctor" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewDoctor_modal"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></a>
                                        <a href='/laravel/public/patient/doctor-appointment/schedule-appointment/{{$data->doctor_id}}' style='font-size:13px;' class="btn btn-primary btn-lg active bookAppointment" role="button" aria-pressed="true">Appointment</a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    <!-- Alert if Zero Result Retrieved -->
                    @if($msg??''!='')
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="display-3 text-center">{{$msg}}</h1>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <!-- Hospital Table end -->
        </div>

        <!-- View Modal -->
        <div class="modal fade" id="viewDoctor_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Photo and Name -->
                        <div class="row">
                            <div class="col-lg-12">
                                <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile" width="140" height="140">
                            </div>
                            <div class="col-lg-12">
                                <h1 id="fullName" class="media-heading display-5 text-center">Joe Sixpack</h1>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="text-center"><span id="gender" class="badge badge-pill badge-dark">Male</span></h4>
                            </div>
                            <div class="col-lg-12 checkDoctor">
                                <h3 class="text-center"><span id="doctorSpecialist" class="badge badge-pill badge-primary">Heart Surgery</span></h3>
                            </div>
                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row" style="padding-left:2%;">
                            <table class="table table-hover" style="padding-left:2%;">
                                <tr>
                                    <td><h4 class="display-6"><strong>Available Days: </strong></h4></td>
                                    <td><h4 id="available_days" class="display-6">Mon - Fri</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Timings: </strong></h4></td>
                                    <td><h4 id="available_timings" class="display-6">12:00 pm - 5:00pm</h4></td>
                                </tr>
                            </table>
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" style="font-size:15px;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View Modal Ends-->

    </div>

    <script>
        $(document).ready(function(){
            $("#searchData").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
        var user_id;
        var allData;
        var doctorData;
        $(document).ready(function(){
            $(".viewDoctor").click(function(){
                user_id = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(user_id == obj[i].doctor_id){
                        $("#fullName").html(obj[i].fname+' '+obj[i].lname);
                        $("#gender").html(obj[i].gender);
                        $("#doctorSpecialist").html(obj[i].specialist);

                        if(obj[i].image != null){
                            $('#image').attr("src", 'data:image/*;base64,'+obj[i].image);
                        }
                        else{
                            $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU');
                        }

                        if(obj[i].available_days == null || obj[i].available_timings == null){
                            $("#available_days").html("Not Available");
                            $("#available_timings").html("Not Available");
                        }
                        else{
                            $("#available_days").html(obj[i].available_days);
                            $("#available_timings").html(obj[i].available_timings);
                        }

                    }
                }
            });
        });
    </script>

@endsection
