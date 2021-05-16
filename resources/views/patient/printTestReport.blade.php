@extends('layout.patientLayout')

@section('navSection')
        <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/patient">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg> Profile
                </li>
            </a>

            <a href="/patient/doctor-appointment">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg> Doctor's Appointment
                </li>
            </a>

            <a href="/patient/current-appointment/{{session('userID')}}">
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                    <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975l1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                </svg> Current Appointment
                </li>
            </a>

            <a href="/patient/appointments-detail/{{session('userID')}}">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M7.646.146a.5.5 0 0 1 .708 0L10.207 2H14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3.793L7.646.146zM1 7v3h14V7H1zm14-1V4a1 1 0 0 0-1-1h-3.793a1 1 0 0 1-.707-.293L8 1.207l-1.5 1.5A1 1 0 0 1 5.793 3H2a1 1 0 0 0-1 1v2h14zm0 5H1v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zM2 4.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg> Appointments Detail
                </li>
            </a>

            <a href="/patient/lab-test/{{session('userID')}}">
                <li class="active text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.777 5.751l-7-4.667c-0.168-0.112-0.387-0.112-0.555 0l-7 4.667c-0.139 0.093-0.223 0.249-0.223 0.416v4.667c0 0.167 0.084 0.323 0.223 0.416l7 4.667c0.084 0.056 0.181 0.084 0.277 0.084s0.193-0.028 0.277-0.084l7-4.667c0.139-0.093 0.223-0.249 0.223-0.416v-4.667c0-0.167-0.084-0.323-0.223-0.416zM7.5 10.232l-2.599-1.732 2.599-1.732 2.599 1.732-2.599 1.732zM8 5.899v-3.465l5.599 3.732-2.599 1.732-3-2zM7 5.899l-3 2-2.599-1.732 5.599-3.732v3.465zM3.099 8.5l-2.099 1.399v-2.798l2.099 1.399zM4 9.101l3 2v3.465l-5.599-3.732 2.599-1.732zM8 11.101l3-2 2.599 1.732-5.599 3.732v-3.465zM11.901 8.5l2.099-1.399v2.798l-2.099-1.399z"/>
                    </svg> Lab Tests
                </li>
            </a>

            <a href="/patient/medical-history/{{session('userID')}}">
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                    <path fill="#0052E9" d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path fill="#0052E9" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg> Medical History
                </li>
            </a>
        </ul>
@endsection

@section('content')

        <div>
            <div style='margin-top: 2%; margin-bottom: 3%; '>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey col-sm-6">Patient / Print Test Report</h3>
                        <button id='reportPrint' class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa fa-print"> </i> Print</button>
                    </div>
                </div>
                <br>

                <!-- Table -->
                <div id='reportPortion' style='height:auto; box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                        <!-- Head Row -->
                        <div class="row" style="margin:auto;diplay:grid;grid-template-columns:1fr 1fr;">
                            <div class="col-sm-4" style="text-align:center;">
                                <img class="img-fluid img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/test_tube.png')}}" alt="test_tube" width="100" height="100" style="margin-bottom:5px;">
                            </div>
                            <div class="col-sm-8" style="text-align:center;">
                                <h1 class="display-4 text-left">Lab Test Report</h1>
                            </div>
                        </div>
                        <hr>
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

                            <!-- @if(session()->has('msg'))
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
                        @endif -->
                        </div>


                        <div class="row" style="margin:auto;display:grid;grid-template-columns:1fr 1fr;font-family:Sans-serif ">
                            <div class="col-sm-6" style="text-align:left;">
                                <div class="form-group">
                                    <p class="display-6"><strong>Patient : </strong> {{$report[0]->patient->hospital_data->fname." ".$report[0]->patient->hospital_data->lname}}</p>
                                    @if($report[0]->patient->hospital_data->phone_number)
                                    <p class="display-6"><strong>Phone : </strong>{{$report[0]->patient->hospital_data->phone_number}}</p>
                                    @endif
                                    @if($report[0]->patient->hospital_data->gender)
                                    <p class="display-6"><strong>Gender : </strong>{{$report[0]->patient->hospital_data->gender}}</p>
                                    @endif
                                    @if($report[0]->patient->hospital_data->dob)
                                    <p class="display-6"><strong>Age : </strong>{{ intVal( (new DateTime(date('m-d-Y')) )->diff((new DateTime($report[0]->patient->hospital_data->dob)))->format('%a')/365) }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6" style="text-align:left;">
                                <div class="form-group">
                                    <p class="display-6"><strong>Technician : </strong>{{$report[0]->lab_technician->hospital_data->fname." ".$report[0]->lab_technician->hospital_data->lname}}</p>
                                    <p class="display-6"><strong>Created At : </strong>{{$report[0]->created_at}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- row2 -->
                        <div class="row" style="display:grid;grid-template-columns:1fr 1fr;font-family:Sans-serif">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Test Name: </strong>{{$report[0]->lab_test_name->test_name}}</p>
                                    <p><strong>Test Section: </strong>{{$report[0]->lab_test_name->test_type}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Test Sample: </strong>{{$report[0]->lab_test_name->test_sample}}</p>
                                    <p><strong>Methodology : </strong>{{$report[0]->lab_test_name->methodology}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Head Row -->
                        @if(count($report[0]->lab_report_params))
                        <div class="row" style="margin:auto;font-family:Sans-serif">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-6">Lab Test Readings</h1>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin-bottom:3%;display:grid;grid-template-columns:1fr 1fr 1fr 1fr;font-family:Sans-serif">
                            <div class="col-sm-3" style="text-align:center;">
                                <strong>Test Parameter</strong>
                            </div>
                            <div class="col-sm-3" style="text-align:center;">
                                <strong>Reading</strong>
                            </div>
                            <div class="col-sm-3" style="text-align:center;">
                                <strong>Normal Range</strong>
                            </div>
                            <div class="col-sm-3" style="text-align:center;">
                                <strong>Unit</strong>
                            </div>
                        </div>

                        @foreach($report[0]->lab_report_params as $parameter)
                        <div class="row" style="margin-bottom:2%;display:grid;grid-template-columns:1fr 1fr 1fr 1fr;font-family:Sans-serif" >
                            <div class="col-sm-3" style="text-align:center;">{{$parameter->lab_test_parameter->param}}</div>
                            <div class="col-sm-3" style="text-align:center;">{{$parameter->param_value}}</div>
                            <div class="col-sm-3" style="text-align:center;">{{'('.$parameter->lab_test_parameter->lower_bound.'-'.$parameter->lab_test_parameter->upper_bound.')'}}</div>
                            <div class="col-sm-3" style="text-align:center;">{{$parameter->lab_test_parameter->unit}}</div>
                        </div>
                        @endforeach


                        @endif
                        <br>

                        <div class="row" style="font-family:Sans-serif;">
                            <div class="col-sm-12">
                                <strong>Result:</strong>
                                <br>
                                <p style="margin-left:10%;margin-right:10%;">{{$report[0]->result}}</p>
                            </div>
                        </div>
                        <br>

                        @if( $report[0]->comment)
                        <div class="row" style="font-family:Sans-serif">
                            <div class="col-sm-12">
                                <strong>Comment:</strong>
                                <br>
                                <p style="margin-left:10%;margin-right:10%;">{{$report[0]->comment}}</p>
                            </div>
                        </div>
                        @endif
                        <!-- row4 -->
                </div>
            </div>

        </div>

        <script type="text/javascript">


        $("#reportPrint").on("click", function () {
            var report = $("#reportPortion").html();
            var reportprintWindow = window.open('', '', 'height=800,width=800');
            reportprintWindow.document.write('<html><head><title>Lab Test Report</title>');
            reportprintWindow.document.write('</head><body >');
            reportprintWindow.document.write(report);
            reportprintWindow.document.write('</body></html>');
            reportprintWindow.document.close();
            reportprintWindow.print();
        });

    </script>
@endsection


