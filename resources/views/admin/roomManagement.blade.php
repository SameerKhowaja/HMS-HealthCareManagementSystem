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

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg>Patient Details

                        <div class="collapse" id="collapseExample">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/admin/patient-admitted" > Patient Admitted</a>
                            <a class="dropdown-item text-normal" href="/admin/patient-appointment"> Patient Appointments</a>
                            <a class="dropdown-item text-normal" href="/admin/patient-lab-test"> Patient Lab Tests</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/admin/room-management">
                <li class="text-normal active">
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
        </ul>
@endsection

@section('content')
    <div>
        <section id="overview">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Admin / Rooms & Bed View</h3>
            </div>

            <div class="cardWrapper">
                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path fill="#0052E9" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                    </svg>
                    <div>
                        <p class="text-large text-grey">Total Rooms</p>
                        <span>
                            <p id="patientCount" class="text-normal text-grey text-center" style="margin: auto;">{{$roomCount ?? 'Zero'}}</p></span>
                    </div>
                </div>

                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path fill="#0052E9" d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z"/>
                    </svg>
                    <div>
                        <p class="text-large text-grey">Total Beds</p>
                        <span><p class="text-normal text-grey text-center" style="margin: auto;">{{$bedCount ?? 'Zero'}}</span>
                    </div>
                </div>

                <div class="card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path fill="#0052E9" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <div>
                        <p class="text-large text-grey">Available Beds</p>
                        <span><p class="text-normal text-grey text-center" style="margin: auto;">{{$availableBed ?? 'Zero'}}</p></span>
                    </div>
                </div>
            </div>
            <!-- ali change -->
            <div class="row">
                <div class="col-lg-12" style='margin-bottom:2%;'>
                    <!-- Room/Bed table -->
                    <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 20px; font-size: 13px;'>
                        <div class="row">
                            <div class="col-lg-7">
                                <select class="form-select form-select-lg roomID_Select" name="roomID_Select" id="roomID_Select" style="padding:5px; font-size:14px; width:200px; margin:auto;">
                                    @foreach($roomNumbers as $room)
                                        <option value="{{$room->room_id}}">{{$room->room_number}}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-warning btn-lg editRoom" style="font-size:12px;" data-toggle="modal" data-target="#editRoom_modal"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" ></i></button>
                                <button type="button" class="btn btn-danger btn-lg deleteRoom" style="font-size:12px;" data-toggle="modal" data-target="#deleteRoom_modal"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                            </div>

                            <div class="col-lg-5">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-primary btn-lg active" style="font-size:12px;" data-toggle="modal" data-target="#addNewBed_modal"><i class="fa fa-bed" aria-hidden="true"></i> Add New Bed</button>
                                    <button type="button" class="btn btn-info btn-lg active" style="font-size:12px;" data-toggle="modal" data-target="#addNewRoom_modal"><i class="fa fa-window-restore" aria-hidden="true"></i> Add New Room</button>
                                </div>
                            </div>
                        </div>
                        <!-- ali-changed ends -->

                        <hr style="border-top: 2px dotted #1b99d8;">
                        @if(session()->has('msg'))
                        <div class="alert alert-lg btn-block alert-warning alert-dismissible fade show text-center text-grey text-large" role="alert">
                            {{ session()->get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                                        <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="/admin/room-management" method="POST">
                                @csrf
                                    <div class="form-group" style="float:right;">
                                        <select class="form-select" name="searchType" id="searchType" style="width:200px; padding:4px;">
                                            <option value="0">All Records</option>
                                            <option value="1">Available Beds</option>
                                            <option value="2">Occupied Beds</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"> </i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Room/Bed table Start -->
                        <div class="table-responsive-sm">
                            <table id="RecordTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center">Room Number</th>
                                        <th scope="col" style="text-align:center">Bed Number</th>
                                        <th scope="col" style="text-align:center">Bed Available</th>
                                        <th scope="col" style="text-align:center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="myTable">
                                <!-- Complete Data Fetched -->
                                <div class="AllData" id="{{$room_data}}"></div>
                                    @foreach($room_data as $data)
                                    <tr>
                                        <td class="roomNumber_table" style="text-align:center">{{$data->room_number}}</td>
                                        <td class="bedNumber_table" style="text-align:center">{{$data->bed_number}}</td>
                                        @if($data->available == 1)
                                        <td style="text-align:center">Yes</td>
                                        @else
                                        <td style="text-align:center">No</td>
                                        @endif

                                        <td style="text-align:center">
                                            <div class="btn-group" role="group">
                                                <!-- View - Edit - Delete -->
                                                <a id='{{$data->bed_id}}' class="btn btn-warning btn-lg editBed" style='font-size: 13px;' role="button" data-toggle="modal" data-target="#editBed_modal"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" ></i></a>
                                                <a id='{{$data->bed_id}}' class="btn btn-danger btn-lg deleteBed" style='font-size:13px;' role="button" aria-pressed="true" data-toggle="modal" data-target="#deleteBed_modal"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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
                    <!-- Room/Bed Table end -->
                </div>
            </div>

        </section>

        <!-- Delete Bed Modal -->
        <div class="modal fade" id="deleteBed_modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 id="modal-heading" class="modal-title" style="margin:auto;">Are You Sure?</h2>
                    </div>

                    <form id="ok_delete_bed" action="#" method="POST">
                    @csrf
                    @method('DELETE')
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger btn-lg">Remove Bed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Bed Modal Ends-->

        <!-- Delete Room Modal -->
        <div class="modal fade" id="deleteRoom_modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 id="modal-heading" class="modal-title" style="margin:auto;">Are You Sure?</h2>
                    </div>

                    <form id="ok_delete_room" action="#" method="POST">
                        <h4 id="roomName_value" class="modal-title text-center" style="margin:auto;"></h4>
                        <h4 id="modal-heading" class="modal-title text-center" style="margin:auto;">All Beds will be removed too...!</h4>
                    @csrf
                    @method('DELETE')
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger btn-lg">Remove Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Room Modal Ends-->

        <!-- Edit Bed Modal -->
        <div class="modal fade" id="editBed_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form id="ok_edit_bed" action="#" method="POST">
                    @csrf
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td colspan="2">
                                            <h2 id="modal-heading" class="modal-title text-center" style="margin:auto;">Edit Bed Number</h2>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size:14px;"><strong>Room Number: </strong></td>
                                        <td style="font-size:14px;" id="roomNumber">Room-1</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;"><strong>Bed Number: </strong></td>
                                        <td style="font-size:14px;" id="bedNumber">Bed-1</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg" name="newBedNumber" placeholder="New Bed Number" style="font-size:14px;" required>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-lg">Update Bed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Bed Modal Ends-->

        <!-- Edit Room Modal -->
        <div class="modal fade" id="editRoom_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form id="ok_edit_room" action="#" method="POST">
                    @csrf
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td colspan="2">
                                            <h2 id="modal-heading" class="modal-title text-center" style="margin:auto;">Edit Room Number</h2>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-size:14px;"><strong>Room Number: </strong></td>
                                        <td style="font-size:14px;" id="roomNumber_old">Room-1</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg" name="newRoomNumber" placeholder="New Room Number" style="font-size:14px;" required>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-lg">Update Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Room Modal Ends-->

        <!-- Add New Room Modal -->
        <div class="modal fade" id="addNewRoom_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <form action="/admin/room-management/add-new-room" method="POST">
                    @csrf
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2 id="fullName" class="media-heading display-5 text-center">Add New Room Number</h2>
                                        </div>
                                    </div>
                                </thead>
                                <tbody>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg" name="newRoomNumber" placeholder="New Room Number" style="font-size:14px;" required>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-lg">Add Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add New Room Ends-->

        <!-- Add New Bed Modal -->
        <div class="modal fade" id="addNewBed_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <form action="/admin/room-management/add-new-bed" method="POST">
                    @csrf
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2 id="fullName" class="media-heading display-5 text-center">Add New Room Number</h2>
                                        </div>
                                    </div>
                                </thead>
                                <tbody>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select class="form-select form-select-lg" name="roomID" id="roomID" style="padding:5px; font-size:14px; width:100%;">
                                                    @foreach($roomNumbers as $room)
                                                        <option value="{{$room->room_id}}">{{$room->room_number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg" name="newBedNumber" placeholder="New Bed Number" style="font-size:14px;" required>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-lg">Add Bed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add New Bed Ends-->

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
            $(".editRoom").click(function(){
                user_id = $('.roomID_Select :selected').text(); // get selected room
                $("#roomNumber_old").html(user_id);  // set html
                $("#ok_edit_room").attr("action","/admin/room-management/room-edit/"+user_id);
                $('#editRoom_modal').modal('show');
            });
        });
    </script>

    <script>
        $(".editBed").click(function() {
            var $row = $(this).closest("tr");    // Find the row
            var $roomNumber_table = $row.find(".roomNumber_table").text(); // Find the room text
            var $bedNumber_table = $row.find(".bedNumber_table").text(); // Find the bed text
            var $bedID = $row.find(".editBed").attr('id');

            $('#roomNumber').html($roomNumber_table);
            $('#bedNumber').html($bedNumber_table);

            $("#ok_edit_bed").attr("action","/admin/room-management/bed-edit/"+$bedID);
            $('#editBed_modal').modal('show');
        });
    </script>

    <script>
        var user_id;
        $(document).ready(function(){
            $(".deleteBed").click(function(){
                user_id = $(this).attr('id');
                $("#ok_delete_bed").attr("action","/admin/room-management/bed-delete/"+user_id);
                $('#deleteBed_modal').modal('show');
            });
        });
    </script>

    <script>
        var user_id;
        $(document).ready(function(){
            $(".deleteRoom").click(function(){
                user_id = $('.roomID_Select :selected').text(); // get selected room
                $("#roomName_value").html("Removing Room # "+user_id);  // set html
                $("#ok_delete_room").attr("action","/admin/room-management/room-delete/"+user_id);
                $('#deleteRoom_modal').modal('show');
            });
        });
    </script>

@endsection
