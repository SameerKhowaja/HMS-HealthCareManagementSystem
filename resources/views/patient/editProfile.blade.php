@extends('layout.patientLayout')

@section('navSection')
        <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/patient">
                <li class="active text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg> Profile
                </li>
            </a>

            <a href="/patient/doctor-appointment">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg> Doctor's Appointment
                </li>
            </a>

            <a href="/patient/current-appointment/{{session('userID')}}">
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975l1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                </svg> Current Appointment
                </li>
            </a>

            <a href="/patient/appointments-detail/{{session('userID')}}">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M7.646.146a.5.5 0 0 1 .708 0L10.207 2H14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3.793L7.646.146zM1 7v3h14V7H1zm14-1V4a1 1 0 0 0-1-1h-3.793a1 1 0 0 1-.707-.293L8 1.207l-1.5 1.5A1 1 0 0 1 5.793 3H2a1 1 0 0 0-1 1v2h14zm0 5H1v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zM2 4.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg> Appointments Detail
                </li>
            </a>

            <a href="/patient/lab-test/{{session('userID')}}">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                    </svg> Lab Tests
                </li>
            </a>

            <a href="/patient/medical-history/{{session('userID')}}">
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                    <path fill="#0052E9" d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path fill="#0052E9" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg> Medical History
                </li>
            </a>
        </ul>
@endsection

@section('content')

        <div>
            <div style='margin-top: 2%; margin-bottom: 3%;'>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Patient / Edit Profile</h3>
                    <a href="/patient" role="button" class="btn btn-secondary btn-lg active">Back</a>
                </div>

                <br>

                <!-- Table -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/patient/editPatientProfile/{{$hospital_data->primary_id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Edit Profile</h1>
                                </div>
                            </div>
                        <hr>
                        <!-- row1 -->
                        <!-- Photo and file -->
                        <div class="row">
                            <div class="col-lg-12">
                                @if($hospital_data->image == '')
                                    <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                @else
                                    <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".$hospital_data->image}}' alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <input type="file" name="image" class="form-control form-control-lg mx-auto d-block" style="width:250px;" accept="image/*">
                            </div>
                        </div>
                        <!-- row2 - If error occurs -->
                        <div class="row">
                            <div class="col-sm-12">
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                    <ul>
                                    <li><strong>Warning!</strong></li>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>

                            @if($msg??'' != '')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                        <strong>{{$msg ?? ''}}</strong> {{$long_msg ?? ''}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- row3 -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>First Name*</strong>
                                    <input type="text" name="fname" class="form-control form-control-lg" placeholder="First Name" value="{{$hospital_data->fname}}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <strong>Last Name*</strong>
                                    <input type="text" name="lname" class="form-control form-control-lg" placeholder="Last Name" value="{{$hospital_data->lname}}" required>
                                </div>
                            </div>
                        </div>
                        <!-- row4 -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Email ID*</strong>
                                    <input type="email" name="email_id" class="form-control form-control-lg" placeholder="abc@demo.com" value="{{$hospital_data->email_id}}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>CNIC Number*</strong>
                                    <input type="text" name="cnic" class="form-control form-control-lg" placeholder="41303XXXXXXXX" value="{{$hospital_data->cnic}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Date of Birth (DOB)</strong>
                                    <input type="date" name="dob" class="form-control form-control-lg" value="{{$hospital_data->dob}}">
                                </div>
                            </div>
                        </div>
                        <!-- row5 -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Gender*</strong>
                                    <select class="form-control form-control-lg" id="gender" name="gender">
                                        <option selected>{{$hospital_data->gender}}</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>Phone Number*</strong>
                                    <input type="text" name="phone_number" class="form-control form-control-lg" placeholder="92333XXXXXXX" value="{{$hospital_data->phone_number}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong>City</strong>
                                    <input type="text" name="city" class="form-control form-control-lg" value="{{$hospital_data->city}}" placeholder="Karachi">
                                </div>
                            </div>
                        </div>
                        <!-- row6 -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <textarea name="address" id="address" cols="30" rows="3" class="form-control form-control-lg">{{$hospital_data->address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- row8 -->
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-secondary active btn-lg" data-toggle="modal" data-target="#changePassword_modal">Changed Password</button>
                            <button type="submit" class="btn btn-primary btn-lg active">Save Record</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- The Reset Password Modal -->
            <div class="modal fade" id="changePassword_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h2 class="modal-title" style="margin:auto;">Reset Password</h2>
                        </div>

                        <form method="POST" action="/patient/editPatientProfile/editPassword/{{session('userID')}}">
                            <!-- Modal body -->
                            <div class="modal-body">
							{{csrf_field()}}

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <strong class="form-control-lg">Current Password</strong>
                                            <div class="input-group">
                                                <input type="password" name="current_pass" class="form-control form-control-lg pwd1" placeholder="Old Password" required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-lg revealold" type="button"><i id="fa_old" class="fa fa-eye"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <strong class="form-control-lg">New Password</strong>
                                            <div class="input-group">
                                                <input type="password" name="new_pass" class="form-control form-control-lg pwd2" placeholder="New Password" required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default btn-lg revealnew" type="button"><i id="fa_new" class="fa fa-eye"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- The Reset Password Modal End -->

        </div>

		<!-- Old Pass -->
        <script>
            $(".revealold").on('click',function() {
                var $pwd = $(".pwd1");
                var $icon = $("#fa_old");
                if ($pwd.attr('type') === 'password') {
                    $pwd.attr('type', 'text');
                    $icon.attr('class', 'fa fa-eye-slash');
                } else {
                    $pwd.attr('type', 'password');
                    $icon.attr('class', 'fa fa-eye');
                }
            });
        </script>

        <!-- New Pass -->
        <script>
            $(".revealnew").on('click',function() {
                var $pwd = $(".pwd2");
                var $icon = $("#fa_new");
                if ($pwd.attr('type') === 'password') {
                    $pwd.attr('type', 'text');
                    $icon.attr('class', 'fa fa-eye-slash');
                } else {
                    $pwd.attr('type', 'password');
                    $icon.attr('class', 'fa fa-eye');
                }
            });
        </script>

@endsection
