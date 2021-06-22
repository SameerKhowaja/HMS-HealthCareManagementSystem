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
<link rel="stylesheet" href="{{asset('resources/sass/css/medical_history.css')}}">

<div class="container-fluid">
    <div style="display: flex; justify-content: space-between; align-items: center; height:10rem;" >
        <div style="display:inline;">
            <h2>Doctor / Patient Medical-History</h2>
        </div>
        <div style="display:flex;" >
            <a class="btn btn-primary btn-md active" role="button" aria-pressed="true" data-toggle="modal" data-target="#viewPatient_modal"><i class="fa fa-database fa-lg" aria-hidden="true"></i> Patient Detail</a>
            <a href="/doctor/patients-history" class="btn btn-primary btn-md" role="button" aria-pressed="true"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Back
            </a>
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
   <div class="row bg-white">
      
      <div class="col-md-12 col-lg-12">
      <div id="tracking-pre"></div>
         <div id="tracking">
            <div class="text-center tracking-status-intransit bg-primary col-sm-12">
               <h3 class="tracking-status text-large">Medical History</h3>
            </div>
            @if($medical_history->count())
            @foreach($medical_history as $hist)
            <div class="tracking-list">
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="rgb(1, 90, 223)" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                     </svg>
                  </div>
                  <div class="tracking-date text-large">{{date('d/M/y',strtotime($hist->created_at))}} <span>{{date('h:i:s A',strtotime($hist->created_at)) }}</span></div>
                  <div class="tracking-content">
                      <div class="text-large"> 
                          Medical Condition : <span class="text-grey"> {{$hist->medical_condition}}</span>
                      </div>
                      <div class="text-large" style="word-wrap: break-word;">Medicines Given : 
                      @foreach($hist->prescription as $medicines)
                            <span class="text-grey">{{$medicines->medicine->medicine}},</span>
                      @endforeach
                      </div>
                      <div class="text-large">
                          Treatment Result Or Comments :
                          @if($hist->comment == "")
                          <span class="text-grey">None</span>
                          @else
                          <span class="text-grey">{{$hist->comment}}</span>
                          @endif
                      </div>
                      <div class="text-large">
                          Treating Doctor : 
                          <span class="text-grey" >{{$hist->doctor->hospital_data->fname." ".$hist->doctor->hospital_data->lname."( ".$hist->doctor->specialist." )"}}</span>
                      </div>
                   </div>

            </div>
            @endforeach
            @else
            <h2 class="text-grey text-center">No Medical History</h2>
            @endif
         </div>
      </div>
   </div>


   <!-- View Modal -->
   <div class="modal fade" id="viewPatient_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Photo and Name -->
                        <div class="row">
                            <div class="col-lg-12">
                                @if($patient[0]->image && $patient[0]->image != null)
                                    <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src='{{"data:image/*;base64,".$patient[0]->image}}' alt="profile" width="140" height="140">
                                @else
                                    <img id="image" class="img-fluid rounded img-thumbnail mx-auto d-block rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCU4AoQASk65ZwYPHbNqQvYp5pwbhS-tOLbg&usqp=CAU" alt="profile" width="140" height="140">
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <h1 id="fullName" class="media-heading display-5 text-center">{{$patient[0]->fname." ".$patient[0]->lname}}</h1>
                            </div>
                            <div class="col-lg-12">
                                <h3 class="text-center"><span id="gender" class="badge badge-pill badge-dark">{{$patient[0]->gender}}</span></h3>
                            </div>
                        </div>
                        <hr>
                        <!-- Main Data -->
                        <div class="row" style="padding-left:2%;">
                            <table class="table table-hover" style="padding-left:2%;">
                                <tr>
                                    <td><h4 class="display-6"><strong>Email Address: </strong></h4></td>
                                    @if($patient[0]->email_id)
                                    <td><h4 class="display-6">{{$patient[0]->email_id}}</h4></td>
                                    @else
                                    <td><h4 class="display-6">---</h4></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Date Of Birth : </strong></h4></td>
                                    @if($patient[0]->dob)
                                    <td><h4 class="display-6">{{$patient[0]->dob}}</h4></td>
                                    @else
                                    <td><h4 class="display-6">---</h4></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>CNIC Number: </strong></h4></td>
                                    @if($patient[0]->cnic)
                                    <td><h4 class="display-6">{{$patient[0]->cnic}}</h4></td>
                                    @else
                                    <td><h4 class="display-6">---</h4></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Phone Number: </strong></h4></td>
                                    @if($patient[0]->phone_number)
                                    <td><h4 class="display-6">{{$patient[0]->phone_number}}</h4></td>
                                    @else
                                    <td><h4 class="display-6">---</h4></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><h4 class="display-6"><strong>Address: </strong></h4></td>
                                    @if($patient[0]->address)
                                    <td><h4 class="display-6">{{$patient[0]->address}}</h4></td>
                                    @else
                                    <td><h4 class="display-6">---</h4></td>
                                    @endif
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
@endsection
