@extends('layout.otherLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/other">
                <li class="text-normal active">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            @if($userData->createPatient == 1 ||  $userData->viewPatient == 1 || $userData->editPatient == 1 || $userData->deletePatient == 1)
            <a href="/other/manage-patient">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg> Manage Patients
                </li>
            </a>
            @endif

            @if($userData->viewAppointment == 1)
            <a href="/other/patient-appointment">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg> Patient Appointments
                </li>
            </a>
            @endif

            @if($userData->viewLabTest == 1)
            <a href="/other/patient-labTest">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <g><path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/></g>
                    </svg> Patient Lab Tests
                </li>
            </a>
            @endif

            @if($userData->viewDocTime == 1 ||  $userData->editDocTime == 1)
            <a href="/other/doctor-timing">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg> Doctor Timings
                </li>
            </a>
            @endif

            @if($userData->createRoomBed == 1 ||  $userData->viewRoomBed == 1 || $userData->editRoomBed == 1 || $userData->deleteRoomBed == 1)
            <a href="/other/room-bed-management">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg> Room-Bed Management
                </li>
            </a>
            @endif

        </ul>
@endsection

@section('content')
        <div>
            <section id="overview">
                <div style='margin-top: 1%; margin-bottom: 2%;'>
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
                                        <a id='{{$userData->primary_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewPrivilegesUser_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i> View Privileges</a>
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
                                <a class="btn btn-primary btn-lg" style='font-size: 13px;' href="/other/editOtherProfile/{{session('userID')}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <!-- View Modal -->
        <div class="modal fade" id="viewPrivilegesUser_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Photo and Name -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="media-heading display-5 text-center">My Privileges</h1>
                                <h4 class="media-heading display-5 text-center">1-Yes and 0-No</h4>
                            </div>
                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row text-center">
                            <table class="table table-hover">
                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Patient Privileges</h3>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Create : </strong> <span id="cPatient" class="display-6">{{$userData->createPatient}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vPatient" class="display-6">{{$userData->viewPatient}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="ePatient" class="display-6">{{$userData->editPatient}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Delete : </strong> <span id="dPatient" class="display-6">{{$userData->deletePatient}}</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Patient Appointments / Lab Tests Privileges</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View Appointments : </strong> <span id="vPatientAppointment" class="display-6">{{$userData->viewAppointment}}</span></h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View Lab Tests : </strong> <span id="vPatientLabTest" class="display-6">{{$userData->viewLabTest}}</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Doctor Timings Privileges</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vDocTime" class="display-6">{{$userData->viewDocTime}}</span></h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="eDocTime" class="display-6">{{$userData->editDocTime}}</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Room/Bed Privileges</h3>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Create : </strong> <span id="cRoomBed" class="display-6">{{$userData->createRoomBed}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vRoomBed" class="display-6">{{$userData->viewRoomBed}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="eRoomBed" class="display-6">{{$userData->editRoomBed}}</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Delete : </strong> <span id="dRoomBed" class="display-6">{{$userData->deleteRoomBed}}</span></h4>
                                    </div>
                                </div>
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

@endsection
