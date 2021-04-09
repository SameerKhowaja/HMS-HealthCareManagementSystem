@extends('layout.adminLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/admin">
                <li class="text-normal">
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
                <li class="text-normal active">
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
        <div style='margin-top:2%; margin-bottom:2%;'>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Admin / Other Privileges</h3>
                <a href="/admin/account-type/manage-other-role/" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="fa fa-cog"> </i>  Manage Other Roles</a>
            </div>
            <br>

            <!-- Table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <h1 class="text-center display-5">Manage Other Staff Privileges</h1>
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

                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center">Image</th>
                                <th scope="col" style="text-align:center">Full Name</th>
                                <th scope="col" style="text-align:center">Role</th>
                                <th scope="col" style="text-align:center">CNIC #</th>
                                <th scope="col" style="text-align:center">Email ID</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>

                            @foreach($dataFetched as $data)
                            <tr>
                                <td style="text-align:center">
                                    @if($data->image == '')
                                        <img class="profile" src="{{asset('resources/images/profile.png')}}" alt="profile">
                                    @else
                                        <img class="profile" src='{{"data:image/*;base64,".$data->image}}' alt="profile">
                                    @endif
                                </td>

                                <td style="text-align:center">{{$data->fname.' '.$data->lname}}</td>
                                <td style="text-align:center">{{$data->roleName}}</td>
                                <td style="text-align:center">{{$data->cnic}}</td>
                                <td style="text-align:center">{{$data->email_id}}</td>

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit-->
                                        <a id='{{$data->primary_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewUser_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i> View Privileges</a>
                                        <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/admin/account-type/edit-privilege/{{$data->primary_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update Privileges</a>
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
            <!-- Table end -->
        </div>

        <!-- View Modal -->
        <div class="modal fade" id="viewUser_modal">
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
                                <h4 id="emailID" class="media-heading display-5 text-center">alikhan@gmail.com</h4>
                                <h4 id="phone_no" class="media-heading display-5 text-center">92333XXXXXXX</h4>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="text-center"><span id="typeName" class="badge badge-pill badge-dark">Other Staff</span></h4>
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
                                        <h4 class="display-6"><strong>Create : </strong> <span id="cPatient" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vPatient" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="ePatient" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Delete : </strong> <span id="dPatient" class="display-6">No</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Patient Appointments / Lab Tests Privileges</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View Appointment : </strong> <span id="vPatientAppointment" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View Lab Test : </strong> <span id="vPatientLabTest" class="display-6">No</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Doctor Timings Privileges</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vDocTime" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="eDocTime" class="display-6">No</span></h4>
                                    </div>
                                </div>

                                <div class="row" style="border:2px dotted lightblue;">
                                    <div class="col-lg-12">
                                        <h3 class="text-center">Room/Bed Privileges</h3>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Create : </strong> <span id="cRoomBed" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>View : </strong> <span id="vRoomBed" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Edit : </strong> <span id="eRoomBed" class="display-6">No</span></h4>
                                    </div>
                                    <div class="col-lg-3">
                                        <h4 class="display-6"><strong>Delete : </strong> <span id="dRoomBed" class="display-6">No</span></h4>
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

    </div>

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
        function Yes_or_No(rights){
            if(rights == 0){
                return "No";
            }
            else{
                return "Yes";
            }
        }

        var user_id;
        var allData;
        $(document).ready(function(){
            $(".viewUser").click(function(){
                user_id = $(this).attr('id');   // current id
                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(user_id == obj[i].primary_id){
                        // alert(obj[i].fname);
                        $("#fullName").html(obj[i].fname+' '+obj[i].lname);
                        $("#emailID").html(obj[i].email_id);
                        $("#phone_no").html(obj[i].phone_number);

                        if(obj[i].image != null){
                            $('#image').attr("src", 'data:image/*;base64,'+obj[i].image);
                        }
                        else{
                            $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU');
                        }

                        $("#cPatient").html(Yes_or_No(obj[i].createPatient));
                        $("#vPatient").html(Yes_or_No(obj[i].viewPatient));
                        $("#ePatient").html(Yes_or_No(obj[i].editPatient));
                        $("#dPatient").html(Yes_or_No(obj[i].deletePatient));

                        $("#vPatientAppointment").html(Yes_or_No(obj[i].viewAppointment));
                        $("#vPatientLabTest").html(Yes_or_No(obj[i].viewLabTest));

                        $("#vDocTime").html(Yes_or_No(obj[i].viewDocTime));
                        $("#eDocTime").html(Yes_or_No(obj[i].editDocTime));

                        $("#cRoomBed").html(Yes_or_No(obj[i].createRoomBed));
                        $("#vRoomBed").html(Yes_or_No(obj[i].viewRoomBed));
                        $("#eRoomBed").html(Yes_or_No(obj[i].editRoomBed));
                        $("#dRoomBed").html(Yes_or_No(obj[i].deleteRoomBed));
                    }
                }
            });
        });
    </script>

@endsection
