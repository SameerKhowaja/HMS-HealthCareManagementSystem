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
use App\User;

class SignupController extends Controller
{
    // Login
    function signup(Request $req){
        return view('signup.registration', ['message'=>'none']);
    }

    function register(Request $req){
        $patient = new Patient();
        $add_data = new Hospital_data();

        $type_id = 0;
        $flag = false;
        $type_list = Type::all();
        forEach($type_list as $data){
            if($data->type_name == 'Patient' || $data->type_name == 'patient'){
                $type_id = $data->type_id;
                $flag = true;
            }
        }

        $username = "User";
        if($flag == true){
            $add_data->type_id = $type_id;  //Patient id type 1,2,3,...
            $add_data->fname = $req->fname;
            $add_data->lname = request('lname');
            $username = $req->fname.' '.$req->lname;

            $add_data->cnic = request('cnic');
            $add_data->email_id = request('email_id');
            $add_data->gender = request('gender');
            $add_data->phone_number = request('phone_number');
            $add_data->password = request('password');
            $add_data->save();
            $primaryid = $add_data->id;

            $patient->primary_id = $primaryid;
            $patient->save();

            return view('signup.afterregistration', ['User'=>$username, 'msg'=>'Congratulation! ', 'msg_more'=>'Your Account is Successfully Created...Login to Continue.']);
        }

        return view('signup.afterregistration', ['message'=>$username, 'msg'=>'Error! ', 'msg_more'=>'You have entered invalid/incorrect information...Register Again.']);
    }
}
