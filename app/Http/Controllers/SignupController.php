<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Admin;
use App\Appointment_result;
use App\Appointment;
use App\Bed;
use App\Doctor;
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
use App\Past_event;
use App\User;

class SignupController extends Controller
{
    // Login
    function signup(Request $req){
        return view('signup.registration', ['message'=>'none']);
    }

    function register(Request $req){

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'cnic' => 'required|max:100',
            'email_id' => 'required|max:200|email',
            'phone_number' => 'required|max:30',
            'password' => 'required|max:100',
        ]);

        $fname_no = $req->fname;
        $lname_no = request('lname');
        $cnic_no = request('cnic');
        $email_no = request('email_id');
        $gender_no = request('gender');
        $phone_no = request('phone_number');
        $password_no = request('password');

        // Check Patient is Type or not in types table
        $type_id = 0;
        $flag = false;
        $type_list = Type::all();
        forEach($type_list as $data){
            if($data->type_name == 'Patient' || $data->type_name == 'patient'){
                $type_id = $data->type_id;
                $flag = true;   // This means patient is store as a type
                break;
            }
        }

        // Check for email-cnic and type exist already or not
        $prev_data = Hospital_data::all();
        $check = true;
        if($flag == true){
            forEach($prev_data as $find_data){
                if(($find_data->email_id==$email_no && $find_data->type_id==$type_id) || ($find_data->cnic==$cnic_no && $find_data->type_id==$type_id)){
                    $check = false; // This means data is already Present
                    break;
                }
            }
        }

        $patient = new Patient();
        $add_data = new Hospital_data();
        $username = "User";

        if($check == true){
            $add_data->type_id = $type_id;  //Patient id type 1,2,3,...
            $add_data->fname = $req->fname;
            $add_data->lname = request('lname');
            $username = $req->fname.' '.$req->lname;    //set username
            $add_data->cnic = request('cnic');
            $add_data->email_id = request('email_id');
            $add_data->gender = request('gender');
            $add_data->phone_number = request('phone_number');
            $add_data->password = request('password');
            $add_data->save();
            $primaryid = $add_data->primary_id; // return currently saved ID

            $patient->primary_id = $primaryid;
            $patient->save();

            // Event Update
            $newEvent = new Past_event;
            $newEvent->event_type = "Added";
            $newEvent->primary_id = $primaryid;
            $newEvent->description = "Self Registered Patient (".$username.")";
            $newEvent->save();

            return view('signup.afterregistration', ['User'=>$username, 'msg'=>'Congratulation! ', 'msg_more'=>'Your Account is Successfully Created...Login to Continue.']);
        }

        return view('signup.afterregistration', ['User'=>$username, 'msg'=>'Error! ', 'msg_more'=>'Email ID / CNIC exist OR Invalid/Incorrect information entered...Register Again.']);
    }
}
