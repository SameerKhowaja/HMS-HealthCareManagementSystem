@extends('layout.doctorLayout')

@section('navSection')
    <!-- Brand Image is in adminLayout -->
        <ul class="navLists">
            <a href="/doctor">
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> Profile
                </li>
            </a>

            <span aria-controls="collapseExample" data-target="#collapseExample" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
                <li>
                    <div class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg>Appointments

                        <div class="collapse" id="collapseExample">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-normal" href="/doctor/patient-current-appointment" > Today's Appointments</a>
                            <a class="dropdown-item text-normal" href="/doctor/patient-future-appointment"> Future Appointments</a>
                            <a class="dropdown-item text-normal" href="/doctor/patient-past-appointment"> Past Appointments</a>
                        </div>
                    </div>
                </li>
            </span>

            <a href="/doctor/patients-history" >
                <li class="text-normal active">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> Patients History
                </li>
            </a>

        </ul>
@endsection

@section('content')
        
        <div>
            <div style='margin-top: 2%; margin-bottom: 3%; '>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey col-sm-6">Doctor / Patient / Print Test Report</h3>
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


