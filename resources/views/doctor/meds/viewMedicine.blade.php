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

            <a href="#" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" fill="#0052E9" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg> Doctor Timing
                </li>
            </a>

            <a href="#" >
                <li class="text-normal">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" fill="#0052E9" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <circle cx="18" cy="4" r="2"/>
                        <path d="M17.836 12.014l-4.345.725l3.29-4.113a1 1 0 0 0-.227-1.457l-6-4a.999.999 0 0 0-1.262.125l-4 4l1.414 1.414l3.42-3.42l2.584 1.723l-2.681 3.352a5.913 5.913 0 0 0-5.5.752l1.451 1.451A3.972 3.972 0 0 1 8 12c2.206 0 4 1.794 4 4c0 .739-.216 1.425-.566 2.02l1.451 1.451A5.961 5.961 0 0 0 14 16c0-.445-.053-.878-.145-1.295L17 14.181V20h2v-7a.998.998 0 0 0-1.164-.986zM8 20c-2.206 0-4-1.794-4-4c0-.739.216-1.425.566-2.02l-1.451-1.451A5.961 5.961 0 0 0 2 16c0 3.309 2.691 6 6 6c1.294 0 2.49-.416 3.471-1.115l-1.451-1.451A3.972 3.972 0 0 1 8 20z"/>
                    </svg> Patients
                </li>
            </a>

            <a href="#" >
                <li class="text-normal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg> Appointments
                </li>
            </a>

            <a href="/doctor/medicine" >
                <li class="text-normal active">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z"/>
                </svg> Medicines
                </li>
            </a>
        </ul>
@endsection

@section('content')
<div>

<div style='margin-top:2%; margin-bottom:2%;'>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="text-large text-grey">Doctor / Medicince Information</h3>
        <a href="/doctor/medicine/addMedicine" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="fa fa-plus-circle"> </i>  Add Medicine</a>
    </div>

    <br>

    <!-- Hospital table -->
    <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-addon form-control form-control-lg col-sm-1"><i class="fa fa-filter fa-lg"></i></span>
                    <input type="text" name="searchTable" id="searchData" class="form-control form-control-lg col-sm-11" placeholder="Search Table Records" style="border:1px solid lightblue; color:black;">
                </div>
            </div>
            
        </div>

        <!-- Patient table Start -->
        <div class="table-responsive-sm">
            <table id="RecordTable" class="table table-hover">

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

                <thead>
                    <tr>
                        <th scope="col" style="text-align:center"></th>
                        <th scope="col" style="text-align:center">Medicine Name</th>
                        <th scope="col" style="text-align:center">Type</th>
                        <th scope="col" style="text-align:center">Drug Use</th>
                    </tr>
                </thead>

                <tbody id="myTable">
                @if($dataFetched != 'none')
                    <!-- Complete Data Fetched -->
                    <div class="AllData" id="{{$dataFetched}}"></div>

                    @foreach($dataFetched as $data)
                    <tr>
                        <td style="text-align:center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0052E9" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6zM6.646 4.646c-.376.377-1.272 1.489-2.093 3.13l.894.448c.78-1.559 1.616-2.58 1.907-2.87l-.708-.708z"/>
                        </svg>
                        </td>

                        <td style="text-align:center">{{$data->medicine}}</td>
                        <td style="text-align:center">{{$data->medicine_type}}</td>
                        <td style="text-align:center">{{$data->drug_use}}</td>

                        <td style="text-align:center">
                            <div class="btn-group" role="group">
                                <!-- View - Edit - Delete -->
                                <a id='{{$data->medicine_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewUser_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i></a>
                                <a class="btn btn-warning btn-lg" style='font-size: 13px;' href="/doctor/medicine/edit-medicine/{{$data->medicine_id}}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                <a id='{{"del".$data->medicine_id}}' style='font-size:13px;' class="btn btn-danger btn-lg deleteUser" role="button" aria-pressed="true" data-toggle="modal" data-target="#deleteUser_modal"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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
                    <button type="submit" class="btn btn-danger btn-lg">Delete Medicine</button>
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
                        <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{asset('resources/images/pill.png')}}" alt="med" width="140" height="140">
                    </div>
                </div>
                
                <!-- Main Data -->
                <div class="row" style="padding-left:2%;">
                    <table class="table table-hover" style="padding-left:2%;">
                        
                        <tr>
                            <td><h4 class="display-6"><strong>Medicine: </strong></h4></td>
                            <td><h4 id="medicine" class="display-6">ABC</h4></td>
                        </tr>
                        <tr>
                            <td><h4 class="display-6"><strong>Type: </strong></h4></td>
                            <td><h4 id="type" class="display-6">92333XXXXXXX</h4></td>
                        </tr>
                        <tr>
                            <td><h4 class="display-6"><strong>Drug Use: </strong></h4></td>
                            <td><h4 id="use" class="display-6">ailment of fever</h4></td>
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
        var med_id;
        $(document).ready(function(){
            $(".deleteUser").click(function(){
                med_id = $(this).attr('id');
                med_id = med_id.substr(3,med_id.length-1);
                $("#ok_delete").attr("action","/doctor/medicine/delete-medicine/"+med_id);
                $('#deleteAdmin_modal').modal('show');
            });

            $("#ok_delete").click(function(){
                $('#deleteAdmin_modal').modal('hide');
            });
        });
    </script>


<script>
        var med_id;
        var allData;
        $(document).ready(function(){
            $(".viewUser").click(function(){
                med_id = $(this).attr('id');   // current id

                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(med_id == obj[i].medicine_id){
                        
                        
                        $("#medicine").html(obj[i].medicine);
                        $("#type").html(obj[i].medicine_type);
                        $("#use").html(obj[i].drug_use);


                    }
                }
            });
        });
    </script>


@endsection
