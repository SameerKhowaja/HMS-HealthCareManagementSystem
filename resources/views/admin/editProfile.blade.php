@extends('layout.adminLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/admin">
                <li class="text-normal active">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Dashboard
                </li>
            </a>

            <a href="/admin/hospital-data">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg> Hospital Data
                </li>
            </a>

            <a href="/admin/doctor-timing" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg> Doctor Timing
                </li>
            </a>

            <a href="/admin/room-management">
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg> Room Management
                </li>
            </a>

            <a href="/admin/lab-test" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <g>
                            <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                        </g>
                    </svg> Manage Lab Test
                </li>
            </a>

            <a href="/admin/account-type">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                    </svg> Other Privileges
                </li>
            </a>

            <a href="/admin/medicine" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg> Drugs/Medicines
                </li>
            </a>
        </ul>
@endsection

@section('content')

        <div>
            <div style='margin-top: 2%; margin-bottom: 2%;'>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Admin / Dashboard / Edit Profile</h3>
                </div>

                <!-- Table -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/admin/editProfile/{{session('userID')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div  class="row">
                            <!-- Head Row -->
                            <div class="row" style="margin:auto;">
                                <div class="col-sm-12" style="text-align:center;">
                                    <div class="form-group">
                                        <h2 class="display-4">Update Profile</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- row1 - If error occurs -->
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

                            @if(session()->has('msg'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                        <strong>{{ session()->get('msg') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                <!-- image -->
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                @if(session("image") != '')
                                                    <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".$admin_data->image}}' alt="profile">
                                                @else
                                                    <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- form data -->
                                <div class="col-sm-8">
                                    <!-- row2 -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>First Name</strong>
                                                <input type="text" name="fname" class="form-control form-control-lg" placeholder="First Name" value="{{$admin_data->fname ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- row3 -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Last Name</strong>
                                                <input type="text" name="lname" class="form-control form-control-lg" placeholder="Last Name" value="{{$admin_data->lname ?? ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- row4 -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <strong>Profile Image</strong>
                                                <input type="file" name="image" class="form-control form-control-lg" accept="image/*" >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- row4 -->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
                                                <button type="button" class="btn btn-secondary btn-lg active" data-toggle="modal" data-target="#changePassword_modal">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


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

                        <form method="POST" action="/admin/editProfile/editPassword/{{session('userID')}}">
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
