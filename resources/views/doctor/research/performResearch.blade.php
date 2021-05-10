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
            <section id="overview">
                <div style='margin-top: 1%; margin-bottom: 2%;'>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h3 class="text-large text-grey">Doctor's / Research</h3>
                    </div>
                </div>
            </section>

            <!-- Table Info -->
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; margin-top:1%; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Research Parameters</h1>
                                </div>
                            </div>
                        </div>
                        <hr>
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
                        <form action="/doctor/perform-research" method="POST">
                                @csrf
                                <div class="form-group" style="display:grid;grid-template-rows:1fr 1fr;">
                                    <h4 class="text-bold display-5">Disease:</h4>
                                    <div>
                                        <input type="text" name='disease' placeholder="Disease e.g diabetes" class="rounded-pill px-4 py-3 form-control form-control-lg">
                                    </div>
                                </div>

                                <br>
                                <div class="form-group">
                                    <h4 class="text-bold display-5" >Compare With:</h4>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input var2 active" type="radio" name="var2" id="res2" value="age" checked >
                                        <label class="form-check-label text-bold display-6" for="inlineRadio1">Age</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input var2 active" type="radio" name="var2" id="res3" value="gender" >
                                        <label class="form-check-label text-bold display-6" for="inlineRadio1">Gender</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input var2" type="radio" name="var2" id="res1" value="medicine" >
                                        <label class="form-check-label text-bold display-5" for="inlineRadio1">Medicine</label>
                                    </div>
                                </div>
                                <br>

                                

                                <div id="select_meds" class="form-group">
                                    <h4 class="text-bold display-5" >Drug:</h4>
                                    <select  name="meds[]" multiple data-style="text-bold text-large rounded-pill px-4 py-3 shadow-lg" class="selectpicker form-select form-control form-control-lg">
                                        @foreach($meds as $med)
                                        <option value="{{$med->medicine}}" class="text-bold">{{$med->medicine}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>


                                <div class="form-group text-center">
                                    <input type="submit" name="Submit" value="Submit" class="btn btn-primary btn-lg" >
                                </div>
                        </form>
            </div>
            @if( ! empty($data) )
            <div class="table-responsive" style='box-shadow: 5px 3px 5px 3px #1b99d8; margin-top:1%; background-color: white; padding: 2%; border-radius: 10px; font-size: 13px;'>
                        <!-- Head Row -->
                        <div class="row" style="margin:auto;">
                            <div class="col-sm-12" style="text-align:center;">
                                <div class="form-group">
                                    <h1 class="display-4">Result </h1>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if( $data['type'] == 'age' )
                        <div class="row">
                        <div class="chart col-lg-12">
                            <canvas id="age_wise" data-research_age = "{{json_encode($data)}}"  ></canvas>
                        </div>
                        </div>
                        @endif
                        @if( $data['type'] == 'gender' )
                        <div class="row">
                        <div class="chart col-lg-12">
                            <canvas id="gender_wise" data-research_gender = "{{json_encode($data)}}"  ></canvas>
                        </div>
                        </div>
                        @endif
                        @if( $data['type'] == 'medicine' )
                        <div class="row">
                        <div class="chart col-lg-12">
                            <canvas id="medicine_wise" data-research_medicine = "{{json_encode($data)}}"  ></canvas>
                        </div>
                        </div>
                        @endif

            </div>
            @endif


        </div>


<script>
$('#select_meds').css('display','none');
$('.var2').click(function (event){
    if( event.currentTarget.value != 'medicine'){
        $('#select_meds').css('display','none');

    }else if( event.currentTarget.value == 'medicine'){
        $('#select_meds').css('display','block');
    }
})

</script>
    

                   
    
@endsection
