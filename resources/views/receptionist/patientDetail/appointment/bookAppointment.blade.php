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
                            <a class="dropdown-item text-normal active" href="/receptionist/patient-view" > Patient View</a>
                            <a class="dropdown-item text-normal" href="/receptionist/patient-admission"> Patient Admitted</a>
                            <a class="dropdown-item text-normal" href="/receptionist/patient-appointment"> Patient Appointments</a>
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
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="text-large text-grey">Receptionist / Book Appointment</h3>
                <a style='font-size:13px;' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewPatient_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i> View Selected Patient Detail</a>
            </div>
            <br>
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
                                <th scope="col" style="text-align:center">Image</th>
                                <th scope="col" style="text-align:center">Doctor Name</th>
                                <th scope="col" style="text-align:center">Gender</th>
                                <th scope="col" style="text-align:center">Specialist</th>
                                <th scope="col" style="text-align:center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="myTable">
                        @if($dataFetched != 'none')
                            <!-- Complete Data Fetched -->
                            <div class="AllData" id="{{$dataFetched}}"></div>
                            @foreach($dataFetched as $data)
                            @if($data->specialist!='' && ($data->monday_start!='' || $data->tuesday_start!='' || $data->wednesday_start!='' || $data->thursday_start!='' || $data->friday_start!='' || $data->saturday_start!='' || $data->sunday_start!=''))
                            <tr>
                                <td style="text-align:center">
                                    @if($data->image == '')
                                        <img class="profile" src="{{asset('resources/images/profile.png')}}" alt="profile">
                                    @else
                                        <img class="profile" src='{{"data:image/*;base64,".$data->image}}' alt="profile">
                                    @endif
                                </td>

                                <td style="text-align:center">{{$data->fname.' '.$data->lname}}</td>
                                <td style="text-align:center">{{$data->gender}}</td>
                                <td style="text-align:center">{{$data->specialist}}</td>

                                <td style="text-align:center">
                                    <div class="btn-group" role="group">
                                        <!-- View - Edit - Delete -->
                                        <a id='{{$data->doctor_available_id}}' style='font-size:13px;' class="btn btn-info btn-lg viewDoctor" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewDoctor_modal"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> View Timings</a>
                                        <a id='{{"appointment".$data->doctor_available_id}}' style='font-size:13px;' class="btn btn-primary btn-lg viewAppointment" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewAppointment_modal"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i> Appointment</a>
                                    </div>
                                </td>
                            </tr>
                            @endif
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
                                <h4 class="text-center"><span id="gender" class="badge badge-pill badge-dark">Male</span></h4>
                            </div>
                            <div class="col-lg-12 checkDoctor">
                                <h3 class="text-center"><span id="doctorSpecialist" class="badge badge-pill badge-primary">Heart Surgery</span></h3>
                            </div>
                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row" style="padding-left:2%;">
                            <table class="table table-hover" style="padding-left:2%;">
                                <tr id="Monday">
                                    <td><h4 class="display-6"><strong>Monday: </strong></h4></td>
                                    <td><h4 id="monday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Tuesday">
                                    <td><h4 class="display-6"><strong>Tuesday: </strong></h4></td>
                                    <td><h4 id="tuesday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Wednesday">
                                    <td><h4 class="display-6"><strong>Wednesday: </strong></h4></td>
                                    <td><h4 id="wednesday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Thursday">
                                    <td><h4 class="display-6"><strong>Thursday: </strong></h4></td>
                                    <td><h4 id="thursday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Friday">
                                    <td><h4 class="display-6"><strong>Friday: </strong></h4></td>
                                    <td><h4 id="friday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Saturday">
                                    <td><h4 class="display-6"><strong>Saturday: </strong></h4></td>
                                    <td><h4 id="saturday_time" class="display-6">N/A</h4></td>
                                </tr>
                                <tr id="Sunday">
                                    <td><h4 class="display-6"><strong>Sunday: </strong></h4></td>
                                    <td><h4 id="sunday_time" class="display-6">N/A</h4></td>
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

        <!-- View Modal -->
        <div class="modal fade" id="viewAppointment_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                                <form action="/receptionist/patient-view/book-appointment" id="requestForm" autocomplete="off" method="POST">
                                    @csrf
                                    <!-- Head Row -->
                                    <br>
                                    <div class="row" style="margin:auto;">
                                        <div class="col-sm-12" style="text-align:center;">
                                            <div class="form-group">
                                                <h3 class="text-primary text-bold">Select Appointment Date*</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="primary_id" value="{{$patient->primary_id}}" />

                                    <div class="row">
                                        <div class='col-sm-12 text-center m-auto'>
                                            <div class="form-group">
                                                <input type="text" id="datepicker" name='appointment_date' size='9' value=""  class="input-control text-bold p-3 rounded m-auto col-sm-10" style="font-size:1.3em" placeholder="Select Date" required />
                                            </div>
                                        </div>
                                    </div>

                                    <br><hr>

                                    <div class="row">
                                        <div class="form-group col-sm-12 m-auto text-center">
                                            <div>
                                                <label for="description" class="text-primary h4 text-bold">Description (if any)</label>
                                            </div>
                                            <textarea rows="4" cols="50" id="description" name='description' class="input-control" style="font-size:1.3em" placeholder="State your health issues"></textarea>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row" >
                                        <div class="col-sm-12 text-center" >
                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" style="font-size:15px;">Close</button>
                                                <input type="submit" class="btn btn-primary btn-lg" name="Book" value="Book Appointment" style="font-size:15px;">
                                            </div>
                                        </div>
                                    </div>


                                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- View Modal Ends-->

        <!-- View Modal -->
        <div class="modal fade" id="viewPatient_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Photo and Name -->
                        <div class="row">
                            <div class="col-lg-12">
                                @if($patient->image != null)
                                    <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="{{$patient->image}}" alt="profile" width="140" height="140">
                                @else
                                    <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU" alt="profile" width="140" height="140">
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <h1 id="fullName" class="media-heading display-5 text-center">{{$patient->fname." ".$patient->lname}}</h1>
                            </div>
                            <div class="col-lg-12">
                                <h3 class="text-center"><span id="gender" class="badge badge-pill badge-dark">{{$patient->gender}}</span></h3>
                            </div>
                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row" style="padding-left:2%;">
                            <table class="table table-hover" style="padding-left:2%;">
                                <tr>
                                    <td><h4 class="display-6"><strong>Email Address: </strong></h4></td>
                                    <td><h4 class="display-6">{{$patient->email_id}}</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>CNIC Number: </strong></h4></td>
                                    <td><h4 class="display-6">{{$patient->cnic}}</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Phone Number: </strong></h4></td>
                                    <td><h4 class="display-6">{{$patient->phone_number}}</h4></td>
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Address: </strong></h4></td>
                                    <td><h4 class="display-6">{{$patient->address}}</h4></td>
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
        var uid;
        var dataAll;
        var current_object;
        $("#datepicker").keydown(function (event) { event.preventDefault(); });
        $(document).ready(function(){
            $(".viewAppointment").click(function(event){
                event.preventDefault();
                $("#datepicker").val("");
                uid = $(this).attr('id');   // current id
                // uid= appointment+doctor_available_id
                uid = uid.substring(11,uid.length);
                dataAll = $('.AllData').attr('id'); // all records
                var req = JSON.parse(dataAll);

                for(var i=0;i<req.length;i++){
                    if(uid == req[i].doctor_available_id){
                        $("#requestForm").append('<input type="hidden" name="doctor_id" value='+req[i].doctor_id+' >');
                        current_object = req[i];
                    }
                }
            });

        });

        $("#datepicker").datepicker("destroy");

        $("#datepicker").datepicker({
                changeMonth:true,
                changeYear:true,
                minDate:0,
                beforeShowDay:function(date) {
                                    if(current_object){
                                        if(date.getDay() == 1 && (current_object.monday_start==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 2 && (current_object.tuesday_start ==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 3 && (current_object.wednesday_start ==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 4 && (current_object.thursday_start ==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 5 && (current_object.friday_start ==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 6 && (current_object.saturday_start ==null)){
                                                return [false,"","unavailable"];
                                        }else if(date.getDay() == 0 && (current_object.sunday_start ==null)){
                                                return [false,"","unavailable"];
                                        }
                                    }
                                    return [true,""];
                            }
                });
        $(".ui-datepicker-prev, .ui-datepicker-next").remove();
        $("#icon").click(function() { $("#datepicker").datepicker( "show" );});


    </script>


    <script>
        // function convert 24hr time to 12hr
        function tConv24(time24) {
            var ts = time24;
            var H = +ts.substr(0, 2);
            var h = (H % 12) || 12;
            h = (h < 10)?("0"+h):h;  // leading 0 at the left for 1 digit hours
            var ampm = H < 12 ? " AM" : " PM";
            ts = h + ts.substr(2, 3) + ampm;
            return ts;
        }
        // function ends

        var user_id;
        var allData;
        $(document).ready(function(){
            $(".viewDoctor").click(function(){
                user_id = $(this).attr('id');   // current id


                allData = $('.AllData').attr('id'); // all records
                var obj = JSON.parse(allData);

                for(var i=0;i<obj.length;i++){
                    if(user_id == obj[i].doctor_available_id){
                        $("#fullName").html(obj[i].fname+' '+obj[i].lname);
                        $("#gender").html(obj[i].gender);
                        $("#doctorSpecialist").html(obj[i].specialist);

                        if(obj[i].image != null){
                            $('#image').attr("src", 'data:image/*;base64,'+obj[i].image);
                        }
                        else{
                            $('#image').attr('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU');
                        }

                        if(obj[i].monday_start==null || obj[i].monday_end==null){
                            $("#monday_time").html('N/A');
                            $("#Monday").hide();
                        }else{
                            $("#Monday").show();
                            $("#monday_time").html(tConv24(obj[i].monday_start) + ' - ' + tConv24(obj[i].monday_end));
                        }

                        if(obj[i].tuesday_start==null || obj[i].tuesday_end==null){
                            $("#tuesday_time").html('N/A');
                            $("#Tuesday").hide();
                        }else{
                            $("#Tuesday").show();
                            $("#tuesday_time").html(tConv24(obj[i].tuesday_start) + ' - ' + tConv24(obj[i].tuesday_end));
                        }

                        if(obj[i].wednesday_start==null || obj[i].wednesday_end==null){
                            $("#wednesday_time").html('N/A');
                            $("#Wednesday").hide();
                        }else{
                            $("#Wednesday").show();
                            $("#wednesday_time").html(tConv24(obj[i].wednesday_start) + ' - ' + tConv24(obj[i].wednesday_end));
                        }

                        if(obj[i].thursday_start==null || obj[i].thursday_end==null){
                            $("#thursday_time").html('N/A');
                            $("#Thursday").hide();
                        }else{
                            $("#Thursday").show();
                            $("#thursday_time").html(tConv24(obj[i].thursday_start) + ' - ' + tConv24(obj[i].thursday_end));
                        }

                        if(obj[i].friday_start==null || obj[i].friday_end==null){
                            $("#friday_time").html('N/A');
                            $("#Friday").hide();
                        }else{
                            $("#Friday").show();
                            $("#friday_time").html(tConv24(obj[i].friday_start) + ' - ' + tConv24(obj[i].friday_end));
                        }

                        if(obj[i].saturday_start==null || obj[i].saturday_end==null){
                            $("#saturday_time").html('N/A');
                            $("#Saturday").hide();
                        }else{
                            $("#Saturday").show();
                            $("#saturday_time").html(tConv24(obj[i].saturday_start) + ' - ' + tConv24(obj[i].saturday_end));
                        }

                        if(obj[i].sunday_start==null || obj[i].sunday_end==null){
                            $("#sunday_time").html('N/A');
                            $("#Sunday").hide();
                        }else{
                            $("#Sunday").show();
                            $("#sunday_time").html(tConv24(obj[i].sunday_start) + ' - ' + tConv24(obj[i].sunday_end));
                        }

                    }
                }
            });
        });
    </script>

@endsection


