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

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg>Appointments

                        <div class="collapse" id="collapseExample">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/doctor/patient-current-appointment" > Today's Appointments</a>
                            <a class="dropdown-item text-normal" href="/doctor/patient-future-appointment"> Future Appointments</a>
                            <a class="dropdown-item text-normal" href="/doctor/patient-past-appointment"> Past Appointments</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/doctor/patients-history" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> Patients History
                </li>
            </a>

        </ul>
@endsection

@section('content')

        <div>
            <div style='margin-top: 2%; margin-bottom: 3%;'>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Patient / Edit Profile</h3>
                    <a href="/doctor" role="button" class="btn btn-secondary btn-lg active">Back</a>
                </div>

                <br>

                <!-- Table -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/doctor/editDoctorProfile/{{$hospital_data->primary_id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Edit Profile</h1>
                                </div>
                            </div>
                        </div>
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

                        <form method="POST" action="/doctor/editDoctorProfile/editPassword/{{session('userID')}}">
                        {{csrf_field()}}
                            <!-- Modal body -->
                            <div class="modal-body">
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
