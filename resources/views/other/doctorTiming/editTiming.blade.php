@extends('layout.otherLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/other">
                <li class="text-normal">
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

            @if($userData->viewDocTime == 1 ||  $userData->editDocTime == 1)
            <a href="/other/doctor-timing">
                <li class="text-normal active">
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
        @if($userData->editDocTime == 1)
        <div>
            <div style='margin-top: 3%; margin-bottom: 4%;'>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Other / Doctor Timings Manager / Edit Timing</h3>
                    <a href="/other/doctor-timing" role="button" class="btn btn-secondary btn-lg">Back</a>
                </div>

                <br>

                <!-- Table Info -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                    <!-- Head Row -->
                    <div class="row" style="margin:auto;">
                        <div class="col-sm-12" style="text-align:center;">
                            <div class="form-group">
                                <h1 class="display-4">Doctor Information</h1>
                            </div>
                        </div>
                    <hr>
                    <!-- If error occurs -->
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
                    </div>
                    <!-- row1 -->
                    <!-- Photo and file -->
                    <div class="row" style="border:2px solid lightblue;">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($dataFetched->image == '')
                                        <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/profile.png')}}" alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                    @else
                                        <img class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".$dataFetched->image}}' alt="profile" width="150" height="150" style="margin-bottom:5px;">
                                    @endif
                                </div>
                                <div class="col-md-12 text-center">
                                    <h2 class="display-5">{{$dataFetched->fname.' '.$dataFetched->lname}}</h2>
                                </div>
                                <div class="col-md-12 text-center">
                                    <h3><span class="badge badge-dark">{{$dataFetched->specialist}}</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td><strong>Email ID: </strong></td>
                                                <td>{{$dataFetched->email_id}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>CNIC Number: </strong></td>
                                                <td>{{$dataFetched->cnic}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gender: </strong></td>
                                                <td>{{$dataFetched->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone Number: </strong></td>
                                                <td>{{$dataFetched->phone_number}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date of Birth: </strong></td>
                                                <td>{{$dataFetched->dob}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>City: </strong></td>
                                                <td>{{$dataFetched->city}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Address: </strong></td>
                                                <td>{{$dataFetched->address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Timings -->
            <div style='margin-top: 3%; margin-bottom: 4%;'>
                <!-- Table Info -->
                <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 14px;'>

                    <form action="/other/doctor-timing/edit-timing/{{$dataFetched->doctor_available_id}}" method="POST">
                    @csrf
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Edit Doctor Timing</h1>
                                </div>
                            </div>
                        <hr>
                        <!-- If error occurs -->
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

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Monday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Monday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong id="xyz">Start Time</strong>
                                                    <input type="time" id="monday_start" name="monday_start" class="form-control form-control-lg" value="{{$dataFetched->monday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="monday_end" name="monday_end" class="form-control form-control-lg" value="{{$dataFetched->monday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('monday_start').value = ''; document.getElementById('monday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Tuesday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Tuesday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>Start Time</strong>
                                                    <input type="time" id="tuesday_start" name="tuesday_start" class="form-control form-control-lg" value="{{$dataFetched->tuesday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="tuesday_end" name="tuesday_end" class="form-control form-control-lg" value="{{$dataFetched->tuesday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('tuesday_start').value = ''; document.getElementById('tuesday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Wednesday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Wednesday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>Start Time</strong>
                                                    <input type="time" id="wednesday_start" name="wednesday_start" class="form-control form-control-lg" value="{{$dataFetched->wednesday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="wednesday_end" name="wednesday_end" class="form-control form-control-lg" value="{{$dataFetched->wednesday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('wednesday_start').value = ''; document.getElementById('wednesday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Thursday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Thursday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>Start Time</strong>
                                                    <input type="time" id="thursday_start" name="thursday_start" class="form-control form-control-lg" value="{{$dataFetched->thursday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="thursday_end" name="thursday_end" class="form-control form-control-lg" value="{{$dataFetched->thursday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('thursday_start').value = ''; document.getElementById('thursday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Friday timing -->
                        <div class="row" style="border:2px solid lightblue;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <h3 class="display-5" style="font-size:22px;">Friday Timing</h3>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <strong>Start Time</strong>
                                            <input type="time" id="friday_start" name="friday_start" class="form-control form-control-lg" value="{{$dataFetched->friday_start}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <strong>End Time</strong>
                                            <input type="time" id="friday_end" name="friday_end" class="form-control form-control-lg" value="{{$dataFetched->friday_end}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <div class="form-group">
                                            <br>
                                            <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('friday_start').value = ''; document.getElementById('friday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Saturday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Saturday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>Start Time</strong>
                                                    <input type="time" id="saturday_start" name="saturday_start" class="form-control form-control-lg" value="{{$dataFetched->saturday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="saturday_end" name="saturday_end" class="form-control form-control-lg" value="{{$dataFetched->saturday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('saturday_start').value = ''; document.getElementById('saturday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Sunday timing -->
                                <div class="row" style="border:2px solid lightblue;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="display-5" style="font-size:22px;">Sunday Timing</h3>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>Start Time</strong>
                                                    <input type="time" id="sunday_start" name="sunday_start" class="form-control form-control-lg" value="{{$dataFetched->sunday_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <strong>End Time</strong>
                                                    <input type="time" id="sunday_end" name="sunday_end" class="form-control form-control-lg" value="{{$dataFetched->sunday_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <div class="form-group">
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-lg timeClearBTN" onclick="document.getElementById('sunday_start').value = ''; document.getElementById('sunday_end').value = '';"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="button" class="btn btn-info btn-lg active" onclick="clearAllTime()">Clear All Timings</button>
                                    <button id="btnSubmit" type="submit" class="btn btn-primary btn-lg active">Update Timings</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <!-- Timing Error Modal -->
            <div class="modal fade" id="timmingError_modal">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h2 class="modal-title text-center" style="margin:auto;"><strong id="error_day">Timing Error</strong></h2>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <h3 id="time_message" class="modal-title text-center" style="margin:auto;">Message</h3>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Timing Error Ends-->

        </div>
        @else
        <div>
            <h2 class="text-center display-4">No Rights Available</h2>
        </div>
        @endif

    <script>
        function clearAllTime(){
            document.getElementById('monday_start').value = '';
            document.getElementById('monday_end').value = '';
            document.getElementById('tuesday_start').value = '';
            document.getElementById('tuesday_end').value = '';
            document.getElementById('wednesday_start').value = '';
            document.getElementById('wednesday_end').value = '';
            document.getElementById('thursday_start').value = '';
            document.getElementById('thursday_end').value = '';
            document.getElementById('friday_start').value = '';
            document.getElementById('friday_end').value = '';
            document.getElementById('saturday_start').value = '';
            document.getElementById('saturday_end').value = '';
            document.getElementById('sunday_start').value = '';
            document.getElementById('sunday_end').value = '';
        }
    </script>

    <script>
        $(document).ready(function(){
            $('#btnSubmit').on('click', function () {
                // Monday
                var startTime = $('#monday_start').val();
                var endTime = $('#monday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Monday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Tuesday
                var startTime = $('#tuesday_start').val();
                var endTime = $('#tuesday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Tuesday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Wednesday
                var startTime = $('#wednesday_start').val();
                var endTime = $('#wednesday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Wednesday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Thursday
                var startTime = $('#thursday_start').val();
                var endTime = $('#thursday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Thursday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Friday
                var startTime = $('#friday_start').val();
                var endTime = $('#friday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Friday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Saturday
                var startTime = $('#saturday_start').val();
                var endTime = $('#saturday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Saturday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

                // Sunday
                var startTime = $('#sunday_start').val();
                var endTime = $('#sunday_end').val();

                var timefrom = new Date();
                temp = startTime.split(":");
                timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timefrom.setMinutes(parseInt(temp[1]));

                var timeto = new Date();
                temp = endTime.split(":");
                timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
                timeto.setMinutes(parseInt(temp[1]));

                if (timeto < timefrom){
                    $('#error_day').html("(Sunday Timing)");
                    $('#time_message').html("End Time Should Always Greater Then Start Time...!");
                    $('#timmingError_modal').modal('show');
                    return false;
                }

            });
        });
    </script>


@endsection
