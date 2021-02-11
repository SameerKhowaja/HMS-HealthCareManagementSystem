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
                <li class="text-normal active">
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

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg>Patient Details

                        <div class="collapse" id="collapseExample">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/admin/patient-admitted" > Patient Admissions</a>
                            <a class="dropdown-item text-normal" href="/admin/patient-appointment"> Patient Appointments</a>
                            <a class="dropdown-item text-normal" href="/admin/patient-lab-test"> Patient Lab Tests</a>
                        </div>
                    </div>
                </li>
            </span>

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
                    </svg> Account Types
                </li>
            </a>

            <span aria-controls="collapseExample2" data-target="#collapseExample2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path d="M20 11V5c0-1.103-.897-2-2-2h-3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H4c-1.103 0-2 .897-2 2v13c0 1.103.897 2 2 2h7c0 1.103.897 2 2 2h7c1.103 0 2-.897 2-2v-7c0-1.103-.897-2-2-2zm-9 2v5H4V5h3v2h8V5h3v6h-5c-1.103 0-2 .897-2 2zm2 7v-7h7l.001 7H13z"/>
                    </svg>Past Events

                        <div class="collapse" id="collapseExample2">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/admin/past-event/data-added" > Data Added</a>
                            <a class="dropdown-item text-normal" href="/admin/past-event/data-modified"> Data Modified</a>
                            <a class="dropdown-item text-normal" href="/admin/past-event/data-deleted"> Data Deleted</a>
                        </div>
                    </div>
                </li>
            </span>
        </ul>
@endsection

@section('content')
    <div>

        <div style='margin-top:2%; margin-bottom:2%;'>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Admin / Hospital Data</h3>
                <a href="/admin/hospital-data/addRecord/" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="fa fa-plus-circle"> </i>  Add Record</a>
            </div>

            <br>

            <!-- Hospital table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                                <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="/admin/hospital-data/{id}" method="POST">
                        @csrf
                            <div class="form-group" style="float:right;">
                                <select class="form-select" name="accountType" id="accountType" style="height:30px; width:200px; padding:4px;">
                                    <option value="0">All Records</option>
                                    @foreach($typesList as $data)
                                        @if($data->type_name != 'Admin' && $data->type_name != 'admin')
                                            <option value="{{$data->type_id}}">{{$data->type_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"> </i> Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Patient table Start -->
                <div class="table-responsive-sm">
                    <table id="RecordTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center">Image</th>
                                <th scope="col" style="text-align:center">Full Name</th>
                                <th scope="col" style="text-align:center">Type</th>
                                <th scope="col" style="text-align:center">CNIC #</th>
                                <th scope="col" style="text-align:center">Email ID</th>
                                <th scope="col" style="text-align:center">Phone #</th>
                                <th scope="col" style="text-align:center">Gender</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>
                            @if($doctorList != 'none')
                            <!-- Complete Doctor Fetched -->
                            <div class="DoctorData" id="{{$doctorList}}"></div>
                            @endif

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
                                <td style="text-align:center">{{$data->type_name}}</td>
                                <td style="text-align:center">{{$data->cnic}}</td>
                                <td style="text-align:center">{{$data->email_id}}</td>
                                <td style="text-align:center">{{$data->phone_number}}</td>
                                <td style="text-align:center">{{$data->gender}}</td>

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit - Delete -->
                                        <a id='{{$data->primary_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewUser_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i></a>
                                        <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/admin/hospital-data/edit-record/{{$data->primary_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                        <a id='{{$data->primary_id}}' style='font-size:13px;' class="btn btn-danger btn-lg deleteUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#deleteUser_modal"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteUser_modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 id="modal-heading" class="modal-title" style="margin:auto;">Are You Sure?</h2>
                    </div>

                    <form id="ok_delete" action="#" method="POST">
                    @csrf
                    @method('DELETE')
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger btn-lg">Delete Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal Ends-->

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
                                <h4 class="text-center"><span id="typeName" class="badge badge-pill badge-dark">Patient</span></h4>
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
        $(document).ready(function(){
            $(".deleteUser").click(function(){
                user_id = $(this).attr('id');
                $("#ok_delete").attr("action","/admin/hospital-data/delete-record/"+user_id);
                $('#deleteAdmin_modal').modal('show');
            });

            $("#ok_delete").click(function(){
                $('#deleteAdmin_modal').modal('hide');
            });
        });
    </script>

    <script>
        var user_id;
        var allData;
        var doctorData;
        $(document).ready(function(){
            $(".viewUser").click(function(){
                user_id = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                doctorData = $('.DoctorData').attr('id');   // doctor records
                var objDoc = JSON.parse(doctorData);

                for(var i=0;i<obj.length;i++){
                    if(user_id == obj[i].primary_id){
                        // alert(obj[i].fname);
                        $("#fullName").html(obj[i].fname+' '+obj[i].lname);
                        $("#typeName").html(obj[i].type_name);
                        $("#emailID").html(obj[i].email_id);
                        $("#cnic_no").html(obj[i].cnic);
                        $("#phone_no").html(obj[i].phone_number);
                        $("#gender").html(obj[i].gender);
                        $("#city").html(obj[i].city);
                        $("#dob").html(obj[i].dob);
                        $("#address").html(obj[i].address);

                        var temp = obj[i].created_at;
                        created_array = temp.split("T");
                        var createdDate = created_array[0]; // Created Date
                        created_array = created_array[1].split(".");
                        var createdTime = created_array[0]; // time
                        $("#createdAt").html(createdDate+' - '+createdTime);

                        var temp = obj[i].updated_at;
                        updated_array = temp.split("T");
                        var UpdatedDate = updated_array[0]; // Created Date
                        updated_array = updated_array[1].split(".");
                        var updatedTime = updated_array[0]; // time
                        $("#updatedAt").html(UpdatedDate+' - '+updatedTime);

                        if(obj[i].image != null){
                            $('#image').attr("src", 'data:image/*;base64,'+obj[i].image);
                        }
                        else{
                            $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU');
                        }

                        if(obj[i].type_name != "Doctor" && obj[i].type_name != "doctor"){
                            $(".checkDoctor").hide();
                        }
                        else{
                            $(".checkDoctor").show();
                            for(var j=0;j<objDoc.length;j++){
                                if(user_id == objDoc[j].primary_id){
                                    $("#doctorSpecialist").html(objDoc[j].specialist);
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

@endsection
