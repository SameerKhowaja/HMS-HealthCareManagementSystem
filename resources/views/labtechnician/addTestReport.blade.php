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
                <li class="text-normal active">
                    <div >
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


        </ul>
@endsection

@section('content')
        <div>
            <div style='margin-top: 2%; margin-bottom: 3%; '>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="text-large text-grey">Lab Technician / Patient / Lab Test Report</h3>
                </div>

                <!-- Table -->
                <div style='height:auto; box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/labtechnician/lab-test/saveTestReport" method="POST" enctype='application/json'>
                        @csrf
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Lab Test Report</h1>
                                </div>
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
                        </div>


                        <div class="row" style="margin:auto;">
                            <div class="col-sm-6" style="text-align:left;">
                                <div class="form-group">
                                    <p class="display-6"><strong>Patient : </strong> {{$patientData->fname." ".$patientData->lname}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6" style="text-align:left;">
                                <div class="form-group">
                                    <p class="display-6"><strong>Phone : </strong>{{$patientData->phone_number}}</p>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <!-- row2 -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Lab Test : </strong> {{$labTest[0]->test_name}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Test Section : </strong> {{$labTest[0]->test_type}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Test Sample Required : </strong> {{$labTest[0]->test_sample}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <p><strong>Methodology Name: </strong> {{$labTest[0]->methodology}}</p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="test_id" value="{{$labTest[0]->test_id}}" >

                        <input type="hidden" name="patient_primary_id" value="{{$patientData->primary_id}}" >

                        <input type="hidden" name="labTechnician_primary_id" value="{{session('userID')}}" >

                        @if($testRequest)
                        <input type="hidden" name='test_req_id' value="{{$testRequest->test_req_id}}">
                        @endif

                        <!-- Head Row -->
                        @if(count($labTest[0]->lab_test_parameters))
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-6">Add Test Reading</h1>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @foreach($labTest[0]->lab_test_parameters as $parameter)
                                            
                        <div class="form-group row" >
                                <span class="col-lg-2 text-bold" style="white-space: initial;word-wrap: break-word;">{{$parameter->param." : "}}</span>
                                @if($parameter->lower_bound && $parameter->upper_bound)
                                <span class="col-lg-3">{{'('.$parameter->lower_bound.'-'.$parameter->upper_bound.")"}}</span>
                                @else
                                <span class="col-lg-3"></span>
                                @endif
                                <input class="col-lg-6" type="text" name='{{ "params[".$parameter->param_id."]" }}'  class="form-control form-control-lg" placeholder="{{$parameter->param}}" required>
                                <label class="col-lg-1">{{$parameter->unit}}</label>
                        </div>
                        @endforeach

                        
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <strong>Result:</strong>
                                    <br>
                                    <textarea name="result" id="result" style="width:100%" cols="90%" rows="5%" placeholder="Result" required ></textarea>
                                </div>
                            </div>
                        </div>
                        


                        <!-- row3 -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <strong>Comment(if any)</strong>
                                    <br>
                                    <textarea name="comment" id="comment" style="width:100%" cols="90%" rows="5%" placeholder="Comment"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- row4 -->
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="/labtechnician/lab-test/select-test/{id}" role="button" class="btn btn-secondary btn-lg active">Back</a>
                            <button type="submit" class="btn btn-primary btn-lg active">Save Report</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
@endsection


