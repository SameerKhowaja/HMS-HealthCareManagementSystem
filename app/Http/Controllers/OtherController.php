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
use App\Announcement;
use App\Contact_table;
use App\Lab_test_parameter;
use App\Lab_test_report;
use App\Lab_test;
use App\Patient_addmission;
use App\Patient;
use App\Receptionist;
use App\Room;
use App\Type;
use App\Other;
use App\Past_event;
use App\Medicine;
use App\User;

class OtherController extends Controller
{
    // Profile View
    public function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        return view("other.index", ['userData'=>$userData]);
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
        return view('other.editProfile', ['hospital_data'=>$hospital_data]);
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
                return view("other.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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

        return view('other.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
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
            return view('other.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>"Error!", 'long_msg'=>' Invalid Old Password...!']);
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
            return view('other.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }


    // Patient Manage View
    // Profile View
    public function managePatient(){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->get();
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('other.managePatient', ['userData'=>$userData, 'dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('other.managePatient', ['userData'=>$userData, 'dataFetched'=>$hospital_data]);
        }
    }

    // Edit Patient
    public function editPatient($id){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->findOrFail($id);
        return view('other.managePatient.editRecord', ['userData'=>$userData, 'hospitalData'=>$hospital_data]);
    }

    // Edit Patient Save
    public function editPatientSave($id, Request $req){
        $hospitalData = Hospital_data::findOrFail($id);

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200|email',
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
                return redirect()->back()->with("msg", "Email/CNIC Already Exists...!");
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
        return redirect()->back()->with("msg", "Record Updated...!");
    }

    // add Patient
    public function addPatient(){
        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        return view('other.managePatient.addRecord', ['userData'=>$userData]);
    }

    // add Patient Save
    public function addPatientSave(Request $req){
        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'password1' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }


        // Check if same email-cnic not exits for patient type
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $userType_id = $patientTypeID; // In number 1,2,...
        $Hospital_data = Hospital_data::all();
        $Hospital_data = Hospital_data::all();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check && $d->type_id == $userType_id) || ($d->cnic == $cnic_check && $d->type_id == $userType_id) || ($userType_id == 0)){
                return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
            }
        }

        // if all fine add Data
        $add_HospitalData = new Hospital_data;
        $add_HospitalData->type_id = $userType_id;
        $add_HospitalData->fname = request('fname');
        $add_HospitalData->lname = request('lname');
        $add_HospitalData->cnic = request('cnic');
        $add_HospitalData->email_id = request('email_id');
        $add_HospitalData->phone_number = request('phone_number');
        $add_HospitalData->gender = request('gender');
        $add_HospitalData->city = request('city');
        $add_HospitalData->address = request('address');
        $add_HospitalData->dob = request('dob');
        $add_HospitalData->password = request('password1');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_HospitalData->image = $img;
        }
        $add_HospitalData->save();
        $primaryid = $add_HospitalData->primary_id;  // return currently saved ID

        DB::table('patients')->insert([
            'primary_id' => $primaryid,
        ]);
        return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Success! ', 'long_msg'=>"Added New Patient Record to Database"]);
    }

    // Delete Patient
    public function deletePatient($id){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        if($userData->editPatient == 1){
            $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->findOrFail($id);
            $hospital_data->delete();
            return redirect("/other/manage-patient")->with('msg','Successfully Deleted...!');
        }
        else{
            return redirect("/other/manage-patient")->with('msg','You have no Rights to Delete...!');
        }

    }

}
