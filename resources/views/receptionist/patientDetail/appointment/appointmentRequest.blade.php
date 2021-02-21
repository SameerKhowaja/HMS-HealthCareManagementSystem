@extends('layout.receptionistLayout')

@section('navSection')
    <!-- Brand Image is in receptionistLayout -->
        <ul class="navLists">
            <a href="/receptionist">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            <span aria-controls="collapseExample1" data-target="#collapseExample1" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>Doctor Details

                        <div class="collapse" id="collapseExample1">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/receptionist/doctor-view" > Doctor View</a>
                            <a class="dropdown-item text-normal" href="/receptionist/doctor-timing"> Doctor Timing</a>
                        </div>
                    </div>
                </li>
            </span>

            <span aria-controls="collapseExample2" data-target="#collapseExample2" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li class="active">
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg>Patient Details

                        <div class="collapse" id="collapseExample2">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/receptionist/patient-view" > Patient View</a>
                            <a class="dropdown-item text-normal" href="/receptionist/patient-admission"> Patient Admitted</a>
                            <a class="dropdown-item text-normal active" href="/receptionist/patient-appointment"> Patient Appointments</a>
                            <a class="dropdown-item text-normal" href="/receptionist/patient-lab-test"> Patient Lab Tests</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/receptionist/room-bed">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg> Rooms & Beds
                </li>
            </a>
        </ul>
@endsection


@section('content')
    <div>

        <div style='margin-top:2%; margin-bottom:2%;'>
            <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Receptionist / Appointment Requests</h3>
            </div>

            <!-- Doctor Appointment Table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                                <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                            </div>
                    </div>
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

                <div class="table-responsive-sm">
                    <table id="RecordTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center">Patient Name</th>
                                <th scope="col" style="text-align:center">Doctor Name</th>
                                <th scope="col" style="text-align:center">Specialist</th>
                                <th scope="col" style="text-align:center">Appointment Date</th>
                                <th scope="col" style="text-align:center">Timings</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>
                            @foreach($dataFetched as $data)
                            <tr>
                                <td style="text-align:center">{{$data->patient_fname.' '.$data->patient_lname}}</td>

                                <td style="text-align:center">{{$data->doctor_fname.' '.$data->doctor_lname}}</td>

                                <td style="text-align:center">{{$data->specialist}}</td>

                                <td style="text-align:center">{{$data->appointment_date."  ".$data->day}}</td>

                                <td style="text-align:center">{{date("h:i a", strtotime($data->start_time))." - ".date("h:i a", strtotime($data->end_time))}}</td>


                                <td style="text-align:center">
                                    <div class="btn-group " role="group">
                                        <form action="/receptionist/patient-appointment" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="appointment_id" value="{{$data->appointment_id}}" >
                                            <input type="submit" name="submit" value="Cancel" id="{{$data->appointment_id}}" class="btn btn-danger btn-lg  fa-lg" role="button" aria-pressed="true">
                                        </form>
                                    </div>
                                    <div class="btn-group " role="group">
                                        <form action="/receptionist/patient-appointment/request" method="post">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" name="appointment_id" value="{{$data->appointment_id}}" >
                                            <input type="submit" name="submit" value="Accept" id="{{$data->appointment_id}}" class="btn btn-primary btn-lg  fa-lg" role="button" aria-pressed="true">
                                        </form>
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
            <!-- Doctor Appointment Table end -->
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

@endsection


