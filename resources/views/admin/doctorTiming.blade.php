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

                <a href="/admin/doctor-timing">
                    <li class="active text-normal">
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

                <a href="/admin/account-type">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                        </svg> Account Types
                    </li>
                </a>

                <a href="/admin/admitted-patient">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg> Admitted Patient
                    </li>
                </a>

                <a href="/admin/appointment">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> Appointments
                    </li>
                </a>

                <a href="/admin/lab-test">
                    <li class="text-normal">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                            <g>
                                <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                            </g>
                        </svg> Lab Tests
                    </li>
                </a>
            </ul>
        </nav>
@endsection

@section('content')
    <div>

        <div style='margin-top:2%; margin-bottom:2%;'>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Admin / Doctor Timings Manager</h3>
            </div>

            <!-- Hospital table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-sm-12">
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
                                        <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/admin/doctor-timing/edit-timing/{{$data->doctor_available_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
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
