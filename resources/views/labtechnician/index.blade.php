@extends('layout.labtechnicianLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/labtechnician">
                <li class="text-normal active">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <g>
                            <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                        </g>
                    </svg>Lab Management

                        <div class="collapse" id="collapseExample">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/labtechnician/lab-test" >Lab Tests</a>
                            <a class="dropdown-item text-normal" href="/labtechnician/perform-test">Sample Analysis</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/labtechnician/lab-report" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> Lab Reports
                </li>
            </a>

        </ul>
@endsection

@section('content')
        <div>
            <section id="overview">
                <div style='margin-top: 1%; margin-bottom: 2%;'>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 class="text-large text-grey">Lab Technician's / Profile View</h3>
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
                                        <h3><span class="badge badge-primary">lab technician</span></h3>
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
                                <a class="btn btn-primary btn-lg" style='font-size: 13px;' href="/labtechnician/editlabTechnicianProfile/{{session('userID')}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
@endsection
   