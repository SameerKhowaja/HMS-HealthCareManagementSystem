@extends('layout.adminLayout')

@section('navSection')
        <!-- Brand Image is in adminLayout -->
            <ul class="navLists">
                <a href="/admin">
                    <li class="active text-normal">
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

            <div class="row">
                <div class="col-md-12">
                    <section id="users">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="text-large text-grey">Announcement / Manage Announcements</h3>
                            <a href="/admin/message" role="button" class="btn btn-secondary btn-lg">Back</a>
                        </div>
                        <!-- user table -->
                        <div class="card">
                            <div class="table-responsive" style='background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                                <!-- Patient table Start -->
                                <div class="table-responsive-sm">
                                    <table id="RecordTable" class="table table-hover table-borderless">
                                        <div class="alert alert-lg btn-block alert-primary alert-dismissible fade show text-center text-grey text-large" role="alert">
                                            {{'Total Announcement Count: '.$countAnnouncement ?? '0'}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center"></th>
                                                <th scope="col" style="text-align:center">Full Name</th>
                                                <th scope="col" style="text-align:center">Email ID</th>
                                                <th scope="col" style="text-align:center">Date/Time</th>
                                                <th scope="col" style="text-align:center">Message</th>
                                                <th scope="col" style="text-align:center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="myTable">
                                            @if($dataFetched??''!='none')
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
                                                    <td style="text-align:center">{{$data->email_id}}</td>
                                                    <td style="text-align:center">{{$data->created_at}}</td>
                                                    <td style="text-align:center">{{substr($data->message, 0, 15).'...'}}</td>

                                                    <td class="usernameCell text-normal text-grey text-center" style="margin: 0 100%;">
                                                        <a id="{{$data->announcement_id}}" class="btn btn-info btn-lg viewAnnouncement" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewAnnouncement_modal"><i class="fa fa-database fa-lg"></i></a>
                                                        <a id="{{$data->announcement_id}}" class="btn btn-warning btn-lg editAnnouncement" role="button" aria-pressed="true" data-toggle="modal" data-target="#editAnnouncement_modal"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                                        <a id="{{$data->announcement_id}}" class="btn btn-danger btn-lg deleteAnnouncement" role="button" aria-pressed="true" data-toggle="modal" data-target="#deleteAnnouncement_modal"><i class="fa fa-trash fa-lg"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteAnnouncement_modal">
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
                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal Ends-->

            <!-- View Modal -->
            <div class="modal fade" id="viewAnnouncement_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="media-heading display-5 text-center">Message</h1>
                                </div>
                            </div>
                            <hr>
                            <!-- Main Data -->
                            <div class="row">
                                <table class="table table-hover table-borderless" style="padding-left:2%;">
                                    <tr>
                                        <td><h4 id="message" class="display-6">-</h4></td>
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

            <!-- Edit Modal -->
            <div class="modal fade" id="editAnnouncement_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="ok_edit" action="#" method="POST">
                        @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="media-heading display-5 text-center">New Announcement</h1>
                                    </div>
                                </div>
                                <hr>
                                <!-- Main Data -->
                                <div class="row">
                                    <div class="form-group">
                                        <textarea class="form-control form-control-lg text-gray" name="new_announcement" cols="50" rows="4" style="font-size:16px;" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" style="font-size:15px;">Close</button>
                                <button type="submit" class="btn btn-primary btn-lg" style="font-size:15px;">Save Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal Ends -->

        </div>

    <script>
        var announcement_id;
        $(document).ready(function(){
            $(".deleteAnnouncement").click(function(){
                announcement_id = $(this).attr('id');
                $("#ok_delete").attr("action","/admin/message/manage-announcement/delete-announcement/"+announcement_id);
                $('#deleteAnnouncement_modal').modal('show');
            });

            $("#ok_delete").click(function(){
                $('#deleteAnnouncement_modal').modal('hide');
            });
        });
    </script>

    <script>
        var announcement_id;
        var allData;
        $(document).ready(function(){
            $(".viewAnnouncement").click(function(){
                announcement_id = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(announcement_id == obj[i].announcement_id){
                        $("#message").html(obj[i].message);
                    }
                }
            });

            $(".editAnnouncement").click(function(){
                announcement_id = $(this).attr('id');
                $("#ok_edit").attr("action","/admin/message/manage-announcement/edit-announcement/"+announcement_id);
                $('#editAnnouncement_modal').modal('show');
            });

            $("#ok_delete").click(function(){
                $('#editAnnouncement_modal').modal('hide');
            });
        });
    </script>

@endsection