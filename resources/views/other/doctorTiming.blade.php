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
    @if($userData->viewDocTime == 1 || $userData->editDocTime == 1)
    <div>
        <div style='margin-top:2%; margin-bottom:2%;'>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Other / Doctor Timings Manager</h3>
            </div>

            <!-- Hospital table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-lg-12">
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
                                <th scope="col" style="text-align:center">Doctor Name</th>
                                <th scope="col" style="text-align:center">Monday</th>
                                <th scope="col" style="text-align:center">Tuesday</th>
                                <th scope="col" style="text-align:center">Wednesday</th>
                                <th scope="col" style="text-align:center">Thursday</th>
                                <th scope="col" style="text-align:center">Friday</th>
                                <th scope="col" style="text-align:center">Saturday</th>
                                <th scope="col" style="text-align:center">Sunday</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>

                            @foreach($dataFetched as $data)
                            <tr>
                                <td style="text-align:center">{{$data->fname.' '.$data->lname}}</td>
                                <!-- Monday -->
                                @if($data->monday_start!='' && $data->monday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->monday_start)).' - '.date("g:i a", strtotime($data->monday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Tuesday -->
                                @if($data->tuesday_start!='' && $data->tuesday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->tuesday_start)).' - '.date("g:i a", strtotime($data->tuesday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Wednesday -->
                                @if($data->wednesday_start!='' && $data->wednesday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->wednesday_start)).' - '.date("g:i a", strtotime($data->wednesday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Thursday -->
                                @if($data->thursday_start!='' && $data->thursday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->thursday_start)).' - '.date("g:i a", strtotime($data->thursday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Friday -->
                                @if($data->friday_start!='' && $data->friday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->friday_start)).' - '.date("g:i a", strtotime($data->friday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Saturday -->
                                @if($data->saturday_start!='' && $data->saturday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->saturday_start)).' - '.date("g:i a", strtotime($data->saturday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif
                                <!-- Sunday -->
                                @if($data->sunday_start!='' && $data->sunday_end!='')
                                    <td style="text-align:center">{{date("g:i a", strtotime($data->sunday_start)).' - '.date("g:i a", strtotime($data->sunday_end))}}</td>
                                @else
                                <td style="text-align:center">N/A</td>
                                @endif

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit -->
                                        <a id='{{$data->primary_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewDoctor" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewDoctor_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i></a>
                                        @if($userData->editDocTime == 1)
                                        <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/other/doctor-timing/edit-timing/{{$data->doctor_available_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
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
                                <h4 class="text-center"><span id="typeName" class="badge badge-pill badge-dark">Doctor</span></h4>
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
                                    <td><h4 class="display-6"><strong>Email Address: </strong></h4></td>
                                    <td><h4 id="emailID" class="display-6">alikhan@gmail.com</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>CNIC Number: </strong></h4></td>
                                    <td><h4 id="cnic_no" class="display-6">41303XXXXXXXX</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Phone Number: </strong></h4></td>
                                    <td><h4 id="phone_no" class="display-6">92333XXXXXXX</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Gender: </strong></h4></td>
                                    <td><h4 id="gender" class="display-6">Male</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>City: </strong></h4></td>
                                    <td><h4 id="city" class="display-6">Karachi</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Date of Birth: </strong></h4></td>
                                    <td><h4 id="dob" class="display-6">28 May 2000</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Address: </strong></h4></td>
                                    <td><h4 id="address" class="display-6">ABC Area XYZ house</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Created At: </strong></h4></td>
                                    <td><h4 id="createdAt" class="display-6">2021-01-21 20:04:36</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Updated At: </strong></h4></td>
                                    <td><h4 id="updatedAt" class="display-6">2021-01-21 20:04:36</h4></td>
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
    @else
    <div>
        <h2 class="text-center display-4">No Rights Available</h2>
    </div>
    @endif

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
        $(document).ready(function(){
            $(".viewDoctor").click(function(){
                user_id = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(user_id == obj[i].primary_id){
                        // alert(obj[i].fname);
                        $("#fullName").html(obj[i].fname+' '+obj[i].lname);
                        $("#doctorSpecialist").html(obj[i].specialist);
                        $("#emailID").html(obj[i].email_id);
                        $("#cnic_no").html(obj[i].cnic);
                        $("#phone_no").html(obj[i].phone_number);
                        $("#gender").html(obj[i].gender);
                        $("#city").html(obj[i].city);
                        $("#dob").html(obj[i].dob);
                        $("#address").html(obj[i].address);
                        $("#createdAt").html(obj[i].created_at);
                        $("#updatedAt").html(obj[i].updated_at);

                        if(obj[i].image != null){
                            $('#image').attr("src", 'data:image/*;base64,'+obj[i].image);
                        }
                        else{
                            $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU');
                        }
                    }
                }
            });
        });
    </script>

@endsection
