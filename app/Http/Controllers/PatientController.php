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
use App\User;
// ali added
use App\Appointment_request;
// ----

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
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Invalid Old Password']);
        }
        else{   // old password is same
            $hospital_data->password = request("new_pass");
            $hospital_data->save();
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

    // // Schedule Appointment View
    // function scheduleAppointmentView($id){
    //     // Hospital Table join with Doctor Table where doctor id = id
    //     $data = Hospital_data::join('doctors', 'doctors.primary_id', '=', 'hospital_datas.primary_id')->where('doctors.doctor_id', $id)->get(['hospital_datas.*', 'doctors.*']);
    //     $rowsReturn = count($data);
    //     if($rowsReturn == 0){
    //         return view('page404', ['msg'=>'Error', 'msg_long'=>' Doctor do not exist...!']);
    //     }

    //     $doctorData = $data[0];  // First Doctor Retrieved
    //     return view('patient.doctorAppointment.scheduleAppointment', ['doctorData'=>$doctorData]);
    // }

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
        $app_req->day = date('D',strtotime($req->appointment_date));
        $app_req->save();

        }else{
            return redirect()->back()->with('msg','Patient is not authorized!');
        }

        return redirect()->back()->with('msg','Appointment Request Sent!');

    }

}
