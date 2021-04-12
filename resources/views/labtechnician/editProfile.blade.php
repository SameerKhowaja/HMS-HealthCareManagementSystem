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
                            <a class="dropdown-item text-normal" href="/labtechnician/perform-test">Lab Analysis</a>
                            <a class="dropdown-item text-normal" href="/labtechnician/test-request">Test Requests</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/labtechnician/lab_report" >
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
            <div style='margin-top: 2%; margin-bottom: 3%;'>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Patient / Edit Profile</h3>
                    <a href="/labtechnician" role="button" class="btn btn-secondary btn-lg active">Back</a>
                </div>

                <br>

                <!-- Table -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/labtechnician/editlabTechnicianProfile/{{$hospital_data->primary_id}}" method="POST" enctype="multipart/form-data">
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

                        <form method="POST" action="/labtechnician/editlabTechnicianProfile/editPassword/{{session('userID')}}">
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
