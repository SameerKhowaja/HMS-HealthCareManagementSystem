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
use App\Other;
use App\User;

class LoginController extends Controller
{
    // Login
    function login(Request $req){
        $getType = Type::all();

        $req->session()->put('userID',NULL);
        $req->session()->put('userType','none');

        return view('login.login',['message'=>'none', 'typesList'=>$getType]);
    }


    // Dashboards Navigation
    function profile(Request $req){
        $req->validate([
            'email_id' => 'required|max:200',
            'password' => 'required|max:100',
        ]);

        $getType = Type::all();
        $selectedType = request('LoginAs');
        $type_name = 'none';
        $type_val = 'none';
        $type_val_id = 'none';

        forEach($getType as $data){
            if($selectedType == $data->type_id){
                $type_val = $data->type_name;
                $type_val_id = $data->type_id;
            }
        }

        // Admin
        if($type_val == "Admin" || $type_val == "admin"){
            $message= 'none';
            $flag = false;
            $admins = Admin::all();
            forEach ($admins as $admin) {
                if((request('email_id')==$admin->email_id && request('password')==$admin->password) || request('email_id')==$admin->cnic && request('password')==$admin->password){
                    $page = 'admin.index';
                    $req->session()->put('userID',$admin->admin_id);
                    $req->session()->put('username',$admin->fname.' '.$admin->lname);
                    $req->session()->put('userType', strtolower($type_val));
                    $req->session()->put('userType_ID',$data->type_id);
                    // also send admin image if exist ------
                    $req->session()->put('image',$admin->image);
                    $flag = true;

                    return redirect('/'.strtolower($type_val)); // /admin url
                    //return view($page, ['type_val'=>strtolower($type_val)]);
                }
            }
            if($flag==false){
                $message = 'Invalid Email or Password';
                $page = 'login.login';
            }
        }
        // Other than Admin
        else{
            $flag = false;
            $message= 'none';
            // tables combined
            $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')->get(['hospital_datas.*', 'types.type_name']);

            forEach($hospital_data as $data){
                if($data->type_name == $type_val){
                    if((request('email_id')==$data->email_id && request('password')==$data->password) || request('email_id')==$data->cnic && request('password')==$data->password){
                        $lowercase_type_val = strtolower($data->type_name); //lowercase type value
                        $page = $lowercase_type_val.'.index';   //set page view
                        $req->session()->put('userID',$data->primary_id);
                        $req->session()->put('username',$data->fname.' '.$data->lname);
                        $req->session()->put('userType',$lowercase_type_val);
                        $req->session()->put('userType_ID',$data->type_id);
                        // also send image if exist ----
                        $req->session()->put('image',$data->image);
                        $flag = true;

                        return redirect('/'.strtolower($type_val)); // patient, doctor, etc dashboard
                    }
                }
            }
            if($flag==false){
                $message = 'Invalid Email or Password';
                $page = 'login.login';
            }

        }

        return view($page, ['message'=>$message, 'typesList'=>$getType]);
    }
}
