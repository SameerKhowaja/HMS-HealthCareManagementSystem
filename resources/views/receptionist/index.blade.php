@extends('layout.receptionistLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/receptionist">
                <li class="text-normal active">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>
        </ul>
@endsection

@section('content')
        <div>
            <section id="overview">
                <div style='margin-top: 3%; margin-bottom: 4%;'>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 class="text-large text-grey">Receptionist / Profile View</h3>
                    </div>

                    <div class="cardWrapper">
                        <div class="card">
                            <svg fill="#0052E9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="5em" height="5em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path d="M12 22c4.879 0 9-4.121 9-9s-4.121-9-9-9s-9 4.121-9 9s4.121 9 9 9zm0-16c3.794 0 7 3.206 7 7s-3.206 7-7 7s-7-3.206-7-7s3.206-7 7-7z"/>
                                <path d="M17.284 3.707l1.412-1.416l3.01 3l-1.413 1.417z"/>
                                <path d="M5.282 2.294L6.7 3.706l-2.99 3l-1.417-1.413z"/>
                                <path d="M11 9h2v5h-2zm0 6h2v2h-2z"/>
                            </svg>
                            <div>
                                <p class="text-large text-grey">Requested Appointments</p>
                                <span><p id="patientCount" class="text-normal text-grey text-center" style="margin: auto;">{{$requestedAppointment ?? 'Zero'}}</p></span>
                            </div>
                        </div>

                        <div class="card">
                            <svg fill="#0052E9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="5em" height="5em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path d="M12 4c-4.879 0-9 4.121-9 9s4.121 9 9 9s9-4.121 9-9s-4.121-9-9-9zm0 16c-3.794 0-7-3.206-7-7s3.206-7 7-7s7 3.206 7 7s-3.206 7-7 7z"/>
                                <path d="M13 12V8h-2v6h6v-2z"/>
                                <path d="M17.284 3.707l1.412-1.416l3.01 3l-1.413 1.417z"/>
                                <path d="M6.698 3.707l-2.99 2.999L2.29 5.294l2.99-3z"/>
                            </svg>
                            <div>
                                <p class="text-large text-grey">Approved Appointments</p>
                                <span><p class="text-normal text-grey text-center" style="margin: auto;">{{$approvedAppointment ?? 'Zero'}}</span>
                            </div>
                        </div>

                        <div class="card">
                            <svg fill="#0052E9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="5em" height="5em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path d="M12 4c-4.879 0-9 4.121-9 9s4.121 9 9 9s9-4.121 9-9s-4.121-9-9-9zm0 16c-3.794 0-7-3.206-7-7s3.206-7 7-7s7 3.206 7 7s-3.206 7-7 7z"/>
                                <path d="M13 8h-2v4H7v2h4v4h2v-4h4v-2h-4z"/>
                                <path d="M20.292 6.708l-3.01-3l1.412-1.417l3.01 3z"/>
                                <path d="M5.282 2.294L6.7 3.706l-2.99 3l-1.417-1.413z"/>
                            </svg>
                            <div>
                                <p class="text-large text-grey">Total Appointments</p>
                                <span><p class="text-normal text-grey text-center" style="margin: auto;">{{$totalAppointment ?? 'Zero'}}</p></span>
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <!-- Table Info -->
                    <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Profile Information</h1>
                                </div>
                            </div>
                        <hr>
                        <!-- Photo and file -->
                        <div class="row" style="border:2px solid lightblue;">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:3%;">
                                        @if(session("image") == '')
                                            <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                        @else
                                            <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".session("image")}}' alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                        @endif
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <h2 class="display-5">{{$userData->fname.' '.$userData->lname}}</h2>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <h3><span class="badge badge-dark">Receptionist</span></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
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
                                <a class="btn btn-primary btn-lg" style='font-size: 13px;' href="/receptionist/editReceptionistProfile/{{session('userID')}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
@endsection
