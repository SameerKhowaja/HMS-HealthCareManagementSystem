<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Doctor;
use App\Patient;
use App\Treatment;
use App\Prescription;
use App\Hospital_data;
use App\Appointment_request;
use App\Appointment_history;
use App\Past_event;
use App\Medicine;
use App\Type;
use App\Doctor_availability;
use App\Lab_technician;
use App\Lab_test_name;
use App\Lab_test_report;
use App\Lab_test;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function index(){
        date_default_timezone_set('Asia/Karachi');

        $primary_ID = session("userID");
        $userData = Hospital_data::findOrFail($primary_ID);
        $userDataSpecialist = Doctor::where('primary_id', '=', $primary_ID)->firstOrFail();
        $doctor_id = $userDataSpecialist->doctor_id;
        $doctorAvailibility = Doctor_availability::where('doctor_id', '=', $doctor_id)->firstOrFail();

        $patientCount_wrt_days = ['Mon'=>0,'Tue'=>0,'Wed'=>0,'Thu'=>0,'Fri'=>0,'Sat'=>0,'Sun'=>0];
        $appoinments_wrt_days = ['monday'=>0,'tuesday'=>0,'wednesday'=>0,'thursday'=>0,'friday'=>0,'saturday'=>0,'sunday'=>0];
        
        $fut_appointment = Appointment_request::where("doctor_id", $doctor_id)
        ->where("appointment_date",'>',date('Y-m-d'))->get('day');

        foreach($fut_appointment as $app){
            $appoinments_wrt_days[ $app->day ] +=1;
        }

    
        return view('doctor.index', ['userData'=>$userData, "userDataSpecialist"=>$userDataSpecialist, "doctorAvailibility"=>$doctorAvailibility, 'patientCount_wrt_days'=>$patientCount_wrt_days,'appointments_wrt_days'=>$appoinments_wrt_days]);
    }


    // Edit Profile Page
    function editProfile($id){
        // Check for invalid forgery attack
        if(session("userID") != $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Do not try to change URL...!']);
        }

        $hospital_data = Hospital_data::findOrFail($id);
        session(['username'=>$hospital_data->fname.' '.$hospital_data->lname]);   //update session username
        session(['image'=>$hospital_data->image]);   //update session image
        return view('doctor.editProfile', ['hospital_data'=>$hospital_data]);
    }

    // Edit Profile Save on btn click
    function editProfileSave(Request $req, $id){
        $hospitalData = Hospital_data::findOrFail($id);

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);


        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id && $hospitalData->type_id == $data->type_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic && $hospitalData->type_id == $data->type_id){
                // email present in db so return error msg
                return view("doctor.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
            }
        }

        // If everything is OK update Data
        $hospitalData->fname = request('fname');
        $hospitalData->lname = request('lname');
        $hospitalData->cnic = request('cnic');
        $hospitalData->email_id = request('email_id');
        $hospitalData->phone_number = request('phone_number');
        $hospitalData->gender = request('gender');
        $hospitalData->city = request('city');
        $hospitalData->address = request('address');
        $hospitalData->dob = request('dob');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $hospitalData->image = $img;
        }
        $hospitalData->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Self Profile Updated";
        $newEvent->save();

        session(['username'=>$hospitalData->fname.' '.$hospitalData->lname]);   //update session username
        session(['image'=>$hospitalData->image]);   //update session image

        return view('doctor.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
    }


    // Change Profile Password
    function editProfilePassword($id){
        // Check for invalid forgery attack
        if(session("userID") != $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Do not try to change URL...!']);
        }

        $hospital_data = Hospital_data::findOrFail($id);
        // check for old password
        $oldPassword = request("current_pass");
        if($oldPassword != $hospital_data->password){
            return view('doctor.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>"Error!", 'long_msg'=>' Invalid Old Password...!']);
        }
        else{   // old password is same
            $hospital_data->password = request("new_pass");
            $hospital_data->save();

            // Event Update
            $primaryID = session()->get('userID');
            $newEvent = new Past_event;
            $newEvent->event_type = "Modified";
            $newEvent->primary_id = $primaryID;
            $newEvent->description = "Self Profile Password Updated";
            $newEvent->save();
            return view('doctor.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }

    // viewing Patients of hospital with treatment link
    // function viewPatients(){

    //     $PatientType = Type::where("type_name","Patient")->get();
    //     // Complete Data of Hospital Table join with Types Table
    //     $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')
    //     ->where("hospital_datas.type_id",$PatientType[0]->type_id)
    //     ->get(['hospital_datas.*', 'types.type_name']);

    //     $rowsReturn = count($hospital_data);

    //     if($rowsReturn == 0){
    //         return view('doctor.patients.viewPatients', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
    //     }else{
    //         return view('doctor.patients.viewPatients', ['dataFetched'=>$hospital_data]);
    //     }
    // }


    function viewPatients(){
        $doctor_PrimaryID = session()->get('userID');

        $doctor_data = Doctor::where("primary_id",$doctor_PrimaryID)->get();

        $hospital_data = Treatment::where("doctor_id",$doctor_data[0]->doctor_id)
        ->with(["patient","patient.hospital_data"])
        ->get();


        $rowsReturn = count($hospital_data);

        if($rowsReturn == 0){
            return view('doctor.patients.viewPatients', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('doctor.patients.viewPatients', ['dataFetched'=>$hospital_data]);
        }
    }

    function patientTreatment($id,Request $req){
        date_default_timezone_set('Asia/Karachi');

        $patient = Hospital_data::findOrFail($id);
        $meds = Medicine::all();

        return view("doctor.patients.addPrescription",["patient"=>$patient,"medicine"=>$meds]);
    }


    function patientTreatmentSave($id,Request $req){

        date_default_timezone_set('Asia/Karachi');

        $req->validate([
            'medical_condition' => 'required|max:400',
            'patient_primary_id' => 'required|max:20',
            'doctor_primary_id' => 'required|max:20',
        ]);


        $patient = Patient::where("primary_id",$req->patient_primary_id)->get();
        $doctor = Doctor::where("primary_id",$req->doctor_primary_id)->get();

        if($patient->count() && $doctor->count()){
            $treatment = new Treatment;
            $treatment->patient_id = $patient[0]->patient_id;
            $treatment->doctor_id = $doctor[0]->doctor_id;
            $treatment->medical_condition = $req->medical_condition;
            $treatment->comment = $req->comment;
            $saved= $treatment->save();

            if($saved){
                foreach($req->medicines as $med){

                    if( Medicine::where("medicine_id",$med)->exists() ){
                        $patient_med = new Prescription;
                        $patient_med->medicine_id = $med;
                        $patient_med->treatment()->associate($treatment);
                        $patient_med->save();
                    }else{
                        return redirect()->back()->with("msg","Medicines Prescribed Doesn't Exist! ");
                    }
                }
            }else{
                return redirect()->back()->with("msg","Medicine Prescription Could Not be Added! ");
            }
        }

        return redirect()->back()->with("msg","Prescription Added Successfully! ");

    }

    function patientMedicalHistory($id){

        $patient_data = Patient::where("patients.primary_id",$id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        $medical_history = Treatment::where("patient_id",$patient_data[0]->patient_id)
        ->with(["patient","doctor","doctor.hospital_data","prescription","prescription.medicine"])
        ->orderBy('created_at', "desc")
        ->get();

        // dd($medical_history);

        // dd($patient_data);

        return view("doctor.patients.viewMedicalHistory",["patient"=>$patient_data,"medical_history"=>$medical_history]);
    }
    
    // lab test history of a particular patient
    function patientLabHistory($id){
        $patient_data = Patient::where("patients.primary_id",$id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        $reports = Lab_test_report::where('patient_id',$patient_data[0]->patient_id)
        ->with(['lab_technician','lab_technician.hospital_data',
        'patient','patient.hospital_data','lab_report_params',
        'lab_report_params.lab_test_parameter','lab_test_name'])
        ->orderBy('created_at', "desc")
        ->get();


        // dd($patient_data);

        return view("doctor.patients.viewTestReportHistory",["patient"=>$patient_data,"reports"=>$reports]);
    }

    function printTestReport($id){

        $report = Lab_test_report::where('report_id',$id)
        ->with(['lab_technician','lab_technician.hospital_data',
        'patient','patient.hospital_data','lab_report_params',
        'lab_report_params.lab_test_parameter','lab_test_name'])
        ->get();

        // dd($report);

        return view('doctor.patients.printTestReport',['report'=>$report]);
    }


    // All Patient Appointments View
    function patientAllAppointmentView(){
        date_default_timezone_set('Asia/Karachi');
        $primaryID = session()->get('userID');
        // joining 3 tables
        $doctorID = Hospital_data::join('doctors', 'hospital_datas.primary_id', '=', 'doctors.primary_id')->where("hospital_datas.primary_id", $primaryID)->get("doctors.doctor_id");
        $dataFetched = Appointment_request::where("doctor_id", $doctorID[0]->doctor_id)
        ->where("appointment_date",'>',date('Y-m-d'))
        ->with(["patient", "patient.hospital_data"])->get();

        return view("doctor.appointment.futureAppointment.viewAppointment", ["dataFetched"=>$dataFetched]);
    }


    function patientPastAppointmentView(){
        date_default_timezone_set('Asia/Karachi');
        $primaryID = session()->get('userID');
        // joining 3 tables
        $doctorID = Hospital_data::join('doctors', 'hospital_datas.primary_id', '=', 'doctors.primary_id')->where("hospital_datas.primary_id", $primaryID)->get("doctors.doctor_id");
        $dataFetched = Appointment_history::where("doctor_id", $doctorID[0]->doctor_id)
        ->where("appointment_date",'<',date('Y-m-d'))
        ->with(["patient", "patient.hospital_data"])->get();

        $allStatus = Appointment_history::select("status")->distinct()->get();
        // dd($allStatus);

        if($dataFetched->count()){
            return view("doctor.appointment.pastAppointment.viewAppointment", ["dataFetched"=>$dataFetched,"allStatus"=>$allStatus]);
        }else{
            return view("doctor.appointment.pastAppointment.viewAppointment", ["dataFetched"=>$dataFetched,"msg"=>"No Past Appointment","allStatus"=>$allStatus]);
        }


    }


    function patientPastAppointmentSearch(Request $req){
        date_default_timezone_set('Asia/Karachi');

        $req->validate([
            'statusType' => 'required',
        ]);


        $primaryID = session()->get('userID');
        // joining 3 tables
        $doctorID = Hospital_data::join('doctors', 'hospital_datas.primary_id', '=', 'doctors.primary_id')->where("hospital_datas.primary_id", $primaryID)->get("doctors.doctor_id");
        $dataFetched;
        if($req->statusType ==  "All Records"){
            $dataFetched = Appointment_history::where("doctor_id", $doctorID[0]->doctor_id)
            ->where("appointment_date",'<',date('Y-m-d'))
            ->with(["patient", "patient.hospital_data"])->get();
        }else{
            $dataFetched = Appointment_history::where("doctor_id", $doctorID[0]->doctor_id)
            ->where("appointment_date",'<',date('Y-m-d'))
            ->where("status",$req->statusType)
            ->with(["patient", "patient.hospital_data"])->get();
        }


        $allStatus = Appointment_history::select("status")->distinct()->get();
        // dd($allStatus);

        if($dataFetched->count()){
            return view("doctor.appointment.pastAppointment.viewAppointment", ["dataFetched"=>$dataFetched,"allStatus"=>$allStatus]);
        }else{
            return view("doctor.appointment.pastAppointment.viewAppointment", ["dataFetched"=>$dataFetched,"msg"=>"No Past Appointment","allStatus"=>$allStatus]);
        }
    }


    function patientCurrentAppointmentView(){
        date_default_timezone_set('Asia/Karachi');

        $primaryID = session()->get('userID');
        // joining 3 tables
        $doctorID = Hospital_data::join('doctors', 'hospital_datas.primary_id', '=', 'doctors.primary_id')->where("hospital_datas.primary_id", $primaryID)->get("doctors.doctor_id");
        $dataFetched = Appointment_history::where("doctor_id", $doctorID[0]->doctor_id)
        ->where("appointment_date",date('Y-m-d'))
        ->where("confirm",1)
        ->where("appointment_id","!=",NULL)
        ->with(["patient", "patient.hospital_data"])->get();


        if($dataFetched->count()){
            return view("doctor.appointment.todayAppointment.viewAppointment", ["dataFetched"=>$dataFetched]);
        }else{
            return view("doctor.appointment.todayAppointment.viewAppointment", ["dataFetched"=>$dataFetched,"msg"=>"No Current Appointment"]);
        }
    }



    function patientAppointmentTreatment($id,Request $req){
        $req->validate([
            'appointment_id' => 'required'
        ]);

        date_default_timezone_set('Asia/Karachi');

        $patient = Hospital_data::findOrFail($id);
        $meds = Medicine::all();

        return view("doctor.appointment.todayAppointment.addPrescription",["patient"=>$patient,"medicine"=>$meds,"appointment_id"=>$req->appointment_id]);
    }


    function patientAppointmentTreatmentSave($id,Request $req){

        date_default_timezone_set('Asia/Karachi');

        $req->validate([
            'medical_condition' => 'required|max:400',
            'patient_primary_id' => 'required|max:20',
            'doctor_primary_id' => 'required|max:20',
            'appointment_id' => 'required'

        ]);


        $patient = Patient::where("primary_id",$req->patient_primary_id)->get();
        $doctor = Doctor::where("primary_id",$req->doctor_primary_id)->get();

        if($patient->count() && $doctor->count()){
            $treatment = new Treatment;
            $treatment->patient_id = $patient[0]->patient_id;
            $treatment->doctor_id = $doctor[0]->doctor_id;
            $treatment->medical_condition = $req->medical_condition;
            $treatment->comment = $req->comment;

            if($req->appointment_id){
                $treatment->appointment_id = $req->appointment_id;

            }

            $saved = $treatment->save();

            if($req->appointment_id){
                Appointment_history::where("appointment_id",$req->appointment_id)
                ->update(["status"=>"Appointment Successful"]);

                Appointment_request::where("appointment_id",$req->appointment_id)
                ->delete();
            }

            if($saved){
                foreach($req->medicines as $med){

                    if( Medicine::where("medicine_id",$med)->exists() ){
                        $patient_med = new Prescription;
                        $patient_med->medicine_id = $med;
                        $patient_med->treatment()->associate($treatment);
                        $patient_med->save();
                    }else{
                        return redirect()->back()->with("msg","Medicines Prescribed Doesn't Exist! ");
                    }
                }
            }else{
                return redirect()->back()->with("msg","Medicine Prescription Could Not be Added! ");
            }
        }

        return redirect()->back()->with("msg","Prescription Added Successfully! ");

    }

    function patientAppointmentMedicalHistory($id){

        $patient_data = Patient::where("patients.primary_id",$id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        $medical_history = Treatment::where("patient_id",$patient_data[0]->patient_id)
        ->with(["patient","doctor","doctor.hospital_data","prescription","prescription.medicine"])
        ->orderBy('created_at', "desc")
        ->get();

        // dd($medical_history);

        // dd($patient_data);


        return view("doctor.appointment.todayAppointment.viewMedicalHistory",["patient"=>$patient_data,"medical_history"=>$medical_history]);
    }

    function viewResearch(){
        
        $meds = Medicine::all();
        
        return view("doctor.research.performResearch",['meds'=>$meds]);
    }

    function performResearch(Request $req){
        $req->validate([
            'disease' => 'required|max:400'
        ]);
        
        $meds = Medicine::all();
        

        if($req->var2 == 'age'){
            $data = [   'type'=>'age',
                        'disease'=>$req->disease,
                        'cured'=>["0-10"=>0,"11-20"=>0,"21-30"=>0,"31-40"=>0,"41-50"=>0,"51-60"=>0,"61-70"=>0,"71-80"=>0,"81-90"=>0  ],
                        'not_cured'=>["0-10"=>0,"11-20"=>0,"21-30"=>0,"31-40"=>0,"41-50"=>0,"51-60"=>0,"61-70"=>0,"71-80"=>0,"81-90"=>0  ]
            ]; 
            $research_data = Treatment::where("medical_condition",'like',"%".$req->disease."%")
            ->with(["patient","patient.hospital_data"])
            ->get();


            foreach($research_data as $d){
                $cured_or_not_cured='not_cured';
                if(! is_null($d->cured) ){
                    $age = floor(abs(strtotime(date('Y-m-d')) - strtotime($d->patient->hospital_data->dob))/(365*60*60*24));

                    if( $d->cured == 1){
                        $cured_or_not_cured='cured';
                    }

                    if( $age >= 0 && $age <= 10 ){
                        $data[ $cured_or_not_cured ]['0-10'] +=1;
                    }else if( $age >= 11 && $age <= 20 ){
                        $data[ $cured_or_not_cured ]['11-20'] +=1;
                    }else if( $age >= 21 && $age <= 30 ){
                        $data[ $cured_or_not_cured ]['21-30'] +=1;
                    }else if( $age >= 31 && $age <= 40 ){
                        $data[ $cured_or_not_cured ]['31-40'] +=1;
                    }else if( $age >= 41 && $age <= 50 ){
                        $data[ $cured_or_not_cured ]['41-50'] +=1;
                    }else if( $age >= 51 && $age <= 60 ){
                        $data[ $cured_or_not_cured ]['51-60'] +=1;
                    }else if( $age >= 61 && $age <= 70 ){
                        $data[ $cured_or_not_cured ]['61-70'] +=1;
                    }else if( $age >= 71 && $age <= 80 ){
                        $data[ $cured_or_not_cured ]['71-80'] +=1;
                    }else if( $age >= 81 && $age <= 90 ){
                        $data[ $cured_or_not_cured ]['81-90'] +=1;
                    }

                }
            }
        }else if($req->var2 == 'medicine'){
            
            $data = [   'type'=>'medicine',
                        'disease'=>$req->disease,
                        'meds'=>$req->meds,
                        'cured'=>[],
                        'not_cured'=>[]
                    ];
            
            if( ! $req->meds ){
                return redirect()->back()->with("msg","Please Select Atleast One Medicine");
            }
            

            $research_data = Treatment::where("medical_condition",'like',"%".$req->disease."%")
            ->with(["patient","patient.hospital_data","prescription","prescription.medicine"])
            ->get();

            foreach($research_data as $d){
                $cured_or_not_cured='not_cured';
                if(! is_null($d->cured) ){
                    

                    if( $d->cured == 1){
                        $cured_or_not_cured='cured';
                    }


                    foreach( $d->prescription as $p  ){
        
                        if( in_array( $p->medicine->medicine,$req->meds ) ){

                            if( array_key_exists ( $p->medicine->medicine, $data[ $cured_or_not_cured ] )  ){
                                $data[ $cured_or_not_cured ][$p->medicine->medicine] +=1;
                            
                            }else{
                                $data[ $cured_or_not_cured ][$p->medicine->medicine] =1;
                            }

                        }
                    }
                    
                }
            }
            // dd($data);

            //}
        }else if($req->var2 == 'gender'){
            $data = [   'type'=>'gender',
                        'disease'=>$req->disease,
                        'cured'=>["male"=>0,"female"=>0],
                        'not_cured'=>["male"=>0,"female"=>0]
                    ]; 
            $research_data = Treatment::where("medical_condition",'like',"%".$req->disease."%")
            ->with(["patient","patient.hospital_data"])
            ->get();

            
            foreach($research_data as $d){
                $cured_or_not_cured='not_cured';
                if(! is_null($d->cured) ){
                    

                    if( $d->cured == 1){
                        $cured_or_not_cured='cured';
                    }

                    if( strtolower( $d->patient->hospital_data->gender ) == 'male' ){
                        $data[ $cured_or_not_cured ]['male'] +=1;
                    }else{
                        $data[ $cured_or_not_cured ]['female'] +=1;
                    }
                    
                }
            }
            // dd($data);

        }
        return view("doctor.research.performResearch",['meds'=>$meds,'data'=>$data]);

    }






}
