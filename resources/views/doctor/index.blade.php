@extends('layout.doctorLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/doctor">
                <li class="text-normal active">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            <a href="#" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg> Doctor Timing
                </li>
            </a>

            <a href="/doctor/patients" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg> Patients
                </li>
            </a>

            <a href="#" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> Appointments
                </li>
            </a>

            <a href="/doctor/medicine" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z"/>
                </svg> Medicines
                </li>
            </a>
        </ul>
@endsection

@section('content')
        <div>
            <section id="overview">
                <div style='margin-top: 1%; margin-bottom: 2%;'>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 class="text-large text-grey">Doctor's / Profile View</h3>
                    </div>

                    <!-- Table Info -->
                    <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; margin-top:1%; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Profile Information</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Photo and file -->
                        <div class="row" style="border:2px solid lightblue;">
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:3%;">
                                        @if(session("image") == '')
                                            <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                        @else
                                            <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".session("image")}}' alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                        @endif
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <h1 class="display-5">{{$userData->fname.' '.$userData->lname}}</h1>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <h3><span class="badge badge-primary">Doctor</span></h3>
                                        <h3><span class="badge badge-dark">{{$userDataSpecialist->specialist ?? "N/A"}}</span></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody style="font-size:15px;">
                                                <tr>
                                                    <td><strong>Email ID: </strong></td>
                                                    <td>{{$userData->email_id}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>CNIC Number: </strong></td>
                                                    <td>{{$userData->cnic}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender: </strong></td>
                                                    <td>{{$userData->gender}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone Number: </strong></td>
                                                    <td>{{$userData->phone_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date of Birth: </strong></td>
                                                    <td>{{$userData->dob}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City: </strong></td>
                                                    <td>{{$userData->city}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Address: </strong></td>
                                                    <td>{{$userData->address}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <!-- Hospital Data Edit Record Link -->
                                <a class="btn btn-primary btn-lg" style='font-size: 13px;' href="/doctor/editDoctorProfile/{{session('userID')}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    <!-- Timings -->
                    <div class="table-responsive col-lg-12" style='box-shadow: 5px 3px 5px 3px #1b99d8; margin:2% 0%; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                        <!-- Timings Data-->
                        <div class="timingDoc" id="{{$doctorAvailibility}}">
                        </div>

                        <div class="row">
                            <!-- Timing Table -->
                            <div class="col-lg-6">
                                <h1 class="text-center">Timings Information</h1>
                                <table class="table table-hover table-bordered" style="padding-left:2%;">
                                    <tr id="Monday">
                                        <td><h4 class="display-6"><strong>Monday: </strong></h4></td>
                                        <td><h4 id="monday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Tuesday">
                                        <td><h4 class="display-6"><strong>Tuesday: </strong></h4></td>
                                        <td><h4 id="tuesday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Wednesday">
                                        <td><h4 class="display-6"><strong>Wednesday: </strong></h4></td>
                                        <td><h4 id="wednesday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Thursday">
                                        <td><h4 class="display-6"><strong>Thursday: </strong></h4></td>
                                        <td><h4 id="thursday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Friday">
                                        <td><h4 class="display-6"><strong>Friday: </strong></h4></td>
                                        <td><h4 id="friday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Saturday">
                                        <td><h4 class="display-6"><strong>Saturday: </strong></h4></td>
                                        <td><h4 id="saturday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                    <tr id="Sunday">
                                        <td><h4 class="display-6"><strong>Sunday: </strong></h4></td>
                                        <td><h4 id="sunday_time" class="display-6">N/A</h4></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Cart -->
                            <div class="chart col-lg-6">
                                <h1 class="text-center">Appointments</h1>
                                <canvas id="userGrowth" data-users = "{{json_encode($patientCount_wrt_days)}}"  ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <script>
        // function convert 24hr time to 12hr
        function tConv24(time24) {
            var ts = time24;
            var H = +ts.substr(0, 2);
            var h = (H % 12) || 12;
            h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
            var ampm = H < 12 ? " AM" : " PM";
            ts = h + ts.substr(2, 3) + ampm;
            return ts;
        }
        // function ends

        var user_id;
        var allData;
        $(document).ready(function(){
            user_id = $('.timingDoc').attr('id');   // current id
            var obj = JSON.parse(user_id);

            if(obj.monday_start==null || obj.monday_end==null){
                $("#monday_time").html('N/A');
                $("#Monday").hide();
            }else{
                $("#Monday").show();
                $("#monday_time").html(tConv24(obj.monday_start) + ' - ' + tConv24(obj.monday_end));
            }

            if(obj.tuesday_start==null || obj.tuesday_end==null){
                $("#tuesday_time").html('N/A');
                $("#Tuesday").hide();
            }else{
                $("#Tuesday").show();
                $("#tuesday_time").html(tConv24(obj.tuesday_start) + ' - ' + tConv24(obj.tuesday_end));
            }

            if(obj.wednesday_start==null || obj.wednesday_end==null){
                $("#wednesday_time").html('N/A');
                $("#Wednesday").hide();
            }else{
                $("#Wednesday").show();
                $("#wednesday_time").html(tConv24(obj.wednesday_start) + ' - ' + tConv24(obj.wednesday_end));
            }

            if(obj.thursday_start==null || obj.thursday_end==null){
                $("#thursday_time").html('N/A');
                $("#Thursday").hide();
            }else{
                $("#Thursday").show();
                $("#thursday_time").html(tConv24(obj.thursday_start) + ' - ' + tConv24(obj.thursday_end));
            }

            if(obj.friday_start==null || obj.friday_end==null){
                $("#friday_time").html('N/A');
                $("#Friday").hide();
            }else{
                $("#Friday").show();
                $("#friday_time").html(tConv24(obj.friday_start) + ' - ' + tConv24(obj.friday_end));
            }

            if(obj.saturday_start==null || obj.saturday_end==null){
                $("#saturday_time").html('N/A');
                $("#Saturday").hide();
            }else{
                $("#Saturday").show();
                $("#saturday_time").html(tConv24(obj.saturday_start) + ' - ' + tConv24(obj.saturday_end));
            }

            if(obj.sunday_start==null || obj.sunday_end==null){
                $("#sunday_time").html('N/A');
                $("#Sunday").hide();
            }else{
                $("#Sunday").show();
                $("#sunday_time").html(tConv24(obj.sunday_start) + ' - ' + tConv24(obj.sunday_end));
            }
        });
    </script>
@endsection
