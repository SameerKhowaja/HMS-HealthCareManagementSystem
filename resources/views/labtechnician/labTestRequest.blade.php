@extends('layout.labtechnicianLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/labtechnician">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li class="active">
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

            <a href="/labtechnician/lab-report" >
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

        <div style='margin-top:2%; margin-bottom:2%;'>
            <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">lab Technician / Laboratory Test Requests</h3>
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
                                <th scope="col" style="text-align:center">Phone Number</th>
                                <th scope="col" style="text-align:center">Cnic</th>
                                <th scope="col" style="text-align:center">Lab Test Names</th>
                                <th scope="col" style="text-align:center">Requested At</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($testRequest != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$testRequest}}"></div>
                            @foreach($testRequest as $data)
                            <tr>
                                <td style="text-align:center">{{$data->patient->hospital_data->fname.' '.$data->patient->hospital_data->lname}}</td>

                                <td style="text-align:center">{{$data->patient->hospital_data->phone_number}}</td>

                                <td style="text-align:center">{{$data->patient->hospital_data->cnic}}</td>

                                <td style="text-align:center">{{$data->test_names}}</td>

                                <td style="text-align:center">{{$data->created_at}}</td>


                                <td style="text-align:center">
                                    <div class="btn-group " role="group">
                                        <form action="/labtechnician/test-request/perform-test" method="post">
                                            @csrf
                                            <input type="hidden" name="test_name" value="{{$data->test_names}}" >
                                            <input type="hidden" name="primary_id" value="{{$data->patient->hospital_data->primary_id}}" >
                                            <input type="hidden" name="test_req_id" value="{{$data->test_req_id}}" >
                                            <input type="submit" name="submit" value="Perform Test" id="{{$data->test_req_id}}" class="btn btn-primary btn-lg  fa-lg" role="button" aria-pressed="true">
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


