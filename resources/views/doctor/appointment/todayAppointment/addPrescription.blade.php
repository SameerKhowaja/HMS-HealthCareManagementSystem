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
                    <h3 class="text-large text-grey">Doctor / Patient / Add Medcial Prescription</h3>
                </div>

                <!-- Table -->
                <div style='height:auto; box-shadow: 5px 3px 5px 3px #1b99d8; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>

                    <form action="/doctor/patient-current-appointment/treatment/{{$patient->primary_id}}" method="POST" enctype='application/json'>
                        @csrf
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Medical Prescription</h1>
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
                            <div class="col-sm-6" style="text-align:center;">
                                <div class="form-group">
                                    
                                    <p class="display-6"><strong>Patient : </strong> {{$patient->fname." ".$patient->lname}}</p>
                                </div>
                            </div>

                            <div class="col-sm-6" style="text-align:center;">
                                <div class="form-group">
                                    <p class="display-6"><strong>Phone : </strong>{{$patient->phone_number}}</p>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <!-- row2 -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <strong>Medical Condition*</strong>
                                    <input type="text" name="medical_condition" class="form-control form-control-lg" placeholder="Disease Or Injury" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="patient_primary_id" value="{{$patient->primary_id}}" >

                        <input type="hidden" name="doctor_primary_id" value="{{session('userID')}}" >

                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-6">Add Medicines</h1>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="m-auto text-center">
                                @if(count($medicine))
                                <div>
                                    <strong> Select Medicine*</strong>
                                </div>
                                
                                <select name="medicines[]" id="medicineMenu" multiple>
                                
                                        @foreach($medicine as $med)
                                            <option value="{{$med->medicine_id}}">{{$med->medicine}}</option>
                                        @endforeach
                
                                </select>
                                @else
                                <h3 class="display-6"> No Medicine In Records</h3>
                                @endif
                                

                                
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
                        <input type="hidden" name="appointment_id" value="{{$appointment_id}}">

                        <!-- row4 -->
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="/doctor/patient-current-appointment" role="button" class="btn btn-secondary btn-lg active">Back</a>
                            <button type="submit" class="btn btn-primary btn-lg active">Save Prescription</button>
                        </div>
                    </form
                </div>
            </div>

        </div>
       
        <script>
            $('#medicineMenu').picker({search : true});       
        </script>
@endsection

