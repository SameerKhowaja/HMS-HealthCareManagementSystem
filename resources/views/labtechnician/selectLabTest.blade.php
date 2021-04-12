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

            <a href="/labtechnician/lab_report" >
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
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">lab Technician / Select Laboratory Test</h3>
            </div>

            <br>

            <!-- Lab Test table -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                <div class="row">
                    <div class="col-lg-6">
                            <div class="input-group">
                                <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                                <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                            </div>
                    </div>
                    @if($testTypes)
                    <div class="col-lg-6">
                    <form action="/labtechnician/lab-test/select-test/search" method="POST">
                        @csrf
                            <div class="form-group" style="float:right;">
                                <select class="form-select" name="testSection" id="testSection" style="height:30px; width:200px; padding:4px;">
                                    <option value="All Lab Tests">All Lab Tests</option>
                                    @foreach($testTypes as $data)
                                        <option value="{{$data}}">{{$data}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="primary_id" value="{{$userData->primary_id}}" >
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"> </i> Search</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>

                <!-- Lab Test table Start -->
                <div class="table-responsive-sm">
                    <table id="RecordTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align:center">Test Name</th>
                                <th scope="col" style="text-align:center">Test Type</th>
                                <th scope="col" style="text-align:center">Test Sample</th>
                                <th scope="col" style="text-align:center">Methodology</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($labTests != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{json_encode($labTests)}}"></div>

                            @foreach($labTests as $data)
                            <tr>
                                <td style="text-align:center">{{$data->test_name}}</td>
                                <td style="text-align:center">{{$data->test_type}}</td>
                                <td style="text-align:center">{{$data->test_sample}}</td>
                                <td style="text-align:center">{{$data->methodology}}</td>

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit - Delete -->
                                        <a id='{{$data->test_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewUser_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i></a>
                                        <!-- <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/labtechnician/lab-test/edit-test/{{$data->test_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                        <a id='{{$data->test_id}}' style='font-size:13px;' class="btn btn-danger btn-lg deleteUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#deleteUser_modal"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a> -->
                                        <form id="{{'report'.$userData->primary_id}}" action="/labtechnician/lab-test/perform-test/{{$userData->primary_id}}" method="POST" >
                                            @csrf
                                            <input type="hidden" name='test_id' value="{{$data->test_id}}">
                                            @if($testRequest)
                                            <input type="hidden" name='test_req_id' value="{{$testRequest->test_req_id}}">
                                            @endif
                                            <input type="submit"  class="btn btn-primary btn-lg" name="Add Test Report" value="Add Test Report">
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
            <!-- Lab test Table end -->
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
                            <button type="submit" class="btn btn-danger btn-lg">Delete Test</button>
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
                                <h1 id="testName" class="media-heading display-5 text-center"></h1>
                            </div>

                            <table class="table table-hover" style="padding-left:2%;">
                                <tr>
                                    <td><h4 class="display-6"><strong>Test Type: </strong></h4></td>
                                    <td><h4 id="testType" class="display-6"></h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Test Sample: </strong></h4></td>
                                    <td><h4 id="testSample" class="display-6"></h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Methodology: </strong></h4></td>
                                    <td><h4 id="methodology" class="display-6"></h4></td>
                                </tr>
                            </table>

                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row" style="padding-left:2%;">
                            <div class="col-lg-12">
                                <h4 class="text-center"><span  class="display-5 text-center">Parameters</span></h4>
                            </div>
                            <table id="test_params" class="table table-hover" style="padding-left:2%;">

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
                test_id = $(this).attr('id');
                $("#ok_delete").attr("action","/labtechnician/lab-test/delete-record/"+test_id);
                $('#deleteAdmin_modal').modal('show');
            });

            $("#ok_delete").click(function(){
                $('#deleteAdmin_modal').modal('hide');
            });
        });
    </script>

    <script>
        var testId;
        var allData;

        $(document).ready(function(){
            $(".viewUser").click(function(){
                testId = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records

                var obj = JSON.parse(allData);

                var test_params = '<tr><th><h5 class="display-6"><strong>Name</strong></h5></th><th><h5 class="display-6"><strong>Unit</strong></h5></td></tr>';


                for(var i=0;i<obj.length;i++){
                    if(testId == obj[i].test_id){
                        // alert(obj[i].fname);
                        $("#testName").html(obj[i].test_name);
                        $("#testType").html(obj[i].test_type);
                        $("#testSample").html(obj[i].test_sample);
                        $("#methodology").html(obj[i].methodology);

                        if(obj[i].lab_test_parameters.length > 0){


                        for(var j=0;j<obj[i].lab_test_parameters.length;j++){

                            test_params +='<tr><td><h5 id="param"'+obj[i].lab_test_parameters[j].param_id+'class="display-6"><strong>'+obj[i].lab_test_parameters[j].param+'</strong></h5></td><td><h5 id="unit"'+obj[i].lab_test_parameters[j].param_id+'class="display-6">'+obj[i].lab_test_parameters[j].unit+'</h5></td></tr>';


                        }

                        }else{
                            test_params += '<h5>No Parameters</h5>'
                        }

                        $("#test_params").html(test_params);

                    }
                }
            });
        });
    </script>

@endsection

