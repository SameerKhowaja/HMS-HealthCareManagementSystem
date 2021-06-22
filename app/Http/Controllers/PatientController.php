<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Admin;
use App\Appointment_result;
use App\Appointment;
use App\Bed;
use App\Doctor;
use App\Doctor_availability;
use App\Hospital_data;
use App\Lab_technician;
use App\Lab_test_name;
use App\Lab_test_report;
use App\Lab_test;
use App\Patient_addmission;
use App\Patient;
use App\Receptionist;
use App\Room;
use App\Type;
use App\Other;
use App\Past_event;
use App\User;
use App\Appointment_request;
use App\Appointment_history;
use App\Treatment;
use App\Prescription;
use App\Medicine;

class PatientController extends Controller
{
    // Patient Home Page
    function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::findOrFail($primary_ID);
        return view('patient.index', ['userData'=>$userData]);
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
        return view('patient.editProfile', ['hospital_data'=>$hospital_data]);
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
                return view("patient.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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

        return view('patient.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
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
            return view('patient.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Error! ', 'long_msg'=>"Invalid Old Password...!"]);
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

            return view('patient.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }

    // View Doctor List
    function doctorAppointment(){
        // joining 3 tables where clause
        $hospital_data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.specialist','doctors.doctor_id', 'hospital_datas.fname','hospital_datas.lname','hospital_datas.gender','hospital_datas.image', 'doctor_availability.*')
            ->get();

        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('patient.doctorAppointment', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('patient.doctorAppointment', ['dataFetched'=>$hospital_data]);
        }
    }

    // request for appointment patient side
    function requestAppointment(Request $req){
        $req->validate([
            'appointment_date' => 'required|max:100',
            'primary_id' => 'required|max:20',
            'doctor_id' => 'required|max:20'
        ]);

        $dtArray = explode('/', $req->appointment_date);
        $dt = $dtArray[2].'-'.$dtArray[0].'-'.$dtArray[1];

        $patient_data = Patient::where('primary_id',$req->primary_id)->get();
        $doctor_data = Doctor::where('doctor_id',$req->doctor_id)->get();

        if($patient_data->count() && $doctor_data->count()){
            $requestAlreadySent = Appointment_request::where("patient_id",$patient_data[0]->patient_id)
                                  ->where("doctor_id",$doctor_data[0]->doctor_id)
                                  ->where("appointment_date",$dt)->get();

            if( $requestAlreadySent->count() ){
                return redirect('patient/doctor-appointment')->with('msg','Appointment Request Already Sent!');
            }
        }

        if($patient_data->count() > 0){

        $app_req = new Appointment_request;
        $app_req->appointment_date = $dt;
        $app_req->description = $req->description;

        if($doctor_data->count() > 0 ){
            $app_req->doctor_id = $req->doctor_id;
        }else{
            return redirect()->back()->with('msg','Doctor does not exist!');

        }
        $app_req->patient_id = $patient_data[0]->patient_id;
        $app_req->day = strtolower( date('l',strtotime($req->appointment_date)) );

        $doc_availability = Doctor_availability::where("doctor_id",$req->doctor_id)->select($app_req->day."_start as start_time",$app_req->day."_end as end_time")->get();

        if($doc_availability->count() > 0){

            $app_req->start_time = $doc_availability[0]->start_time;
            $app_req->end_time = $doc_availability[0]->end_time;

        }else{
            return redirect()->back()->with('msg','Doctor does not exist!');
        }

        $app_req->save();
        // appointments that are sent by patient but not confirmed by receptionist
        // are ADDED as
        // "request pending" status in history

        $app_history  = new Appointment_history;
        $app_history->appointment_date = $app_req->appointment_date;
        $app_history->day = $app_req->day;
        $app_history->patient_id = $app_req->patient_id;
        $app_history->doctor_id = $app_req->doctor_id;
        $app_history->appointment_id = $app_req->appointment_id;
        $app_history->Description = $app_req->Description;
        $app_history->start_time = $app_req->start_time;
        $app_history->end_time = $app_req->end_time;
        $app_history->status = "request pending";
        $app_history->save();


        $doctor_FullData = Hospital_data::findOrFail($doctor_data[0]->doctor_id);
        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Added";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Requested Appointment of Doctor (".$doctor_FullData->fname." ".$doctor_FullData->lname.")";
        $newEvent->save();

        }else{
            return redirect()->back()->with('msg','Patient is not authorized!');
        }

        return redirect()->back()->with('msg','Appointment Request Sent!');

    }

    // this will display the current appointments of patient
    function currentAppointment($id,Request $req){
        date_default_timezone_set('Asia/Karachi');

        $patient =Patient::where("primary_id",$id)->get();
        $appointments = Appointment_request::where("patient_id",$patient[0]->patient_id)
            ->join("doctors","appointment_requests.doctor_id","=","doctors.doctor_id")
            ->join("hospital_datas","doctors.primary_id","=","hospital_datas.primary_id")
            ->join("doctor_availability","appointment_requests.doctor_id","=","doctor_availability.doctor_id")
            ->where(
                function($query){
                    $query->where("appointment_date",'>',date("Y-m-d"))
                    ->orWhere(
                        function($query2){
                            $query2->where("appointment_date",'=',date("Y-m-d"))
                            ->where( strtolower(date('l'))."_end" , '>' , date("H:i:s") );

                        });

                })
            ->select("appointment_requests.*","doctors.specialist","hospital_datas.fname","hospital_datas.lname")
            ->get();

        //   dd($appointments);

        // dd( date('l',strtotime("Mon"))  );

        // dd(date("g:i a", strtotime("11:30 am")) > date('g:i a'));

        if($appointments->count() == 0){

            return view("patient.currentAppointment",['dataFetched'=>$appointments, 'msg'=>'No Current Appointments']);

        }else{

            return view("patient.currentAppointment",['dataFetched'=>$appointments]);
        }

    }


    function delAppointment(Request $req){

        $a = Appointment_request::findOrFail($req->appointment_id);

        // appointments that are cancelled by patient are changed as
        // "cancelled by patient" status in history

        if($a){

            $app_history = Appointment_history::where("appointment_id",$a->appointment_id)
                           ->update(["status"=>"cancelled by patient"]);
        }

        Appointment_request::findOrFail($req->appointment_id)->delete();

        return redirect()->back()->with('msg','Appointment Request Deleted!');

    }


    function appointmentsDetail($id){

        if($id != session("userID")){
            return view("page404");
        }

        $history;
        $patient = Patient::where("primary_id",$id)->get();



        Appointment_history::where("patient_id",$patient[0]->patient_id)
        ->where("appointment_date",'<',date("Y-m-d"))
        ->where(
            function($query){
                $query->where("status","request pending")
                ->orWhere(
                    function($query2){
                        $query2->where("status","Appointment Booked");
                    });
            })
        ->update(["status"=>"Appointment Missed"]);


        Appointment_request::where("patient_id",$patient[0]->patient_id)
        ->where("appointment_date",'<',date("Y-m-d"))
        ->delete();




        if($patient->count()){
            $history = Appointment_history::where("patient_id",$patient[0]->patient_id)
                       ->join("doctors","appointment_histories.doctor_id","=","doctors.doctor_id")
                       ->join("hospital_datas","doctors.primary_id","=","hospital_datas.primary_id")
                       ->select("appointment_histories.*","doctors.specialist","hospital_datas.fname","hospital_datas.lname")
                       ->orderBy('updated_at', 'desc')
                       ->get();
        }


        if( $history->count() == 0){
            return view("patient.appointmentDetails",['dataFetched'=>$history, 'msg'=>'No Appointment Details']);
        }else{
            return view("patient.appointmentDetails",['dataFetched'=>$history]);
        }



    }

    function medicalHistory($id){

        if($id != session("userID")){
            return view("page404");
        }

        $patient_data = Patient::where("patients.primary_id",$id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        $medical_history = Treatment::where("patient_id",$patient_data[0]->patient_id)
        ->with(["patient","doctor","doctor.hospital_data","prescription","prescription.medicine"])
        ->orderBy('created_at', "desc")
        ->get();

        // dd($medical_history);

        // dd($patient_data);

        return view("patient.viewMedicalHistory",["patient"=>$patient_data,"medical_history"=>$medical_history]);
    }


    // view complete lab report history of logged in patient
    function labTest($id){

        $patient= Patient::where('patients.primary_id',$id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        $reports = Lab_test_report::where('patient_id',$patient[0]->patient_id)
        ->with(['lab_technician','lab_technician.hospital_data',
        'patient','patient.hospital_data','lab_report_params',
        'lab_report_params.lab_test_parameter','lab_test_name'])
        ->orderBy('created_at', "desc")
        ->get();

        return view('patient.viewTestReportHistory',["patient"=>$patient,'reports'=>$reports]);

    }

    function printTestReport($id){

        $report = Lab_test_report::where('report_id',$id)
        ->with(['lab_technician','lab_technician.hospital_data',
        'patient','patient.hospital_data','lab_report_params',
        'lab_report_params.lab_test_parameter','lab_test_name'])
        ->get();

        // dd($report);

        return view('patient.printTestReport',['report'=>$report]);
    }


    function saveSurvey(Request $req,$id){
        $req->validate([
            'dob' => 'required|max:100',
            'treatment_id' => 'required|max:20',
            'primary_id' => 'required|max:20',
            'cured'=>'required|max:1'
        ]);


        $patient= Hospital_data::findOrFail( $req->primary_id );
        $patient->dob = $req->dob;
        $patient->save();


        $patient_data = Patient::where("patients.primary_id",$req->primary_id)
        ->join("hospital_datas","hospital_datas.primary_id","=","patients.primary_id")->get();


        Treatment::where("patient_id",$patient_data[0]->patient_id)
        ->where('treatment_id',$req->treatment_id)
        ->update(['cured'=>$req->cured]);

        return redirect('/patient/medical-history/'.$req->primary_id)->with("msg","Survey Recorded Successfully");


    }







}
