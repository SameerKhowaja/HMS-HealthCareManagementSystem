<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Doctor;
use App\Patient;
use App\Receptionist;
use App\Laboratorist;
class LoginController extends Controller
{
    // Login
    function login(Request $req){
        $req->session()->put('userID',NULL);
        $req->session()->put('userType','none');
        return view('login.login',['message'=>'none']);
    }

    // Dashboards Navigation
    function profile(Request $req){

        // Admin
        if(request('LoginAs')=='Admin'){
            $message= 'none';
            $flag = false;
            $admins = Admin::all();
            forEach ($admins as $admin) {
                if(request('email_id')==$admin->email_id){
                    if(request('password')==$admin->password){
                        $page = 'admin.index';
                        $req->session()->put('userID',$admin->admin_id);
                        $req->session()->put('username',$admin->fname.' '.$admin->lname);
                        $req->session()->put('userType','admin');
                        $flag = true;
                    }else{
                        $message = 'Wrong Password';
                    }
                }else{
                    $message = 'User does not exist';
                }
            }
            if($flag==false) $page = 'login.login';
        // Doctor
        }elseif(request('LoginAs')=='Doctor'){
            $message= 'none';
            $flag = false;
            $doctors = Doctor::all();
            forEach ($doctors as $doctor) {
                if(request('name')==$doctor->doctor_name){
                    if(request('password')==$doctor->doctor_password){
                        $page = 'doctor.index';
                        $req->session()->put('userID',$doctor->id);
                        $req->session()->put('user',$doctor->doctor_name);
                        $req->session()->put('userType','doctor');
                        $flag = true;
                    }else{
                        $message = 'Wrong Password';
                    }
                }else{
                    $message = 'User does not exist';
                }
            }
            if($flag==false) $page = 'login.login';
        // Patient
        }elseif(request('LoginAs')=='Patient'){
            $message= 'none';
            $flag = false;
            $patients = Patient::all();
            forEach ($patients as $patient) {
                if(request('name')==$patient->patient_name){
                    if(request('password')==$patient->patient_password){
                        $page = 'patient.index';
                        $req->session()->put('userID',$patient->id);
                        $req->session()->put('user',$patient->patient_name);
                        $req->session()->put('userType','patient');
                        $flag = true;
                    }else{
                        $message = 'Wrong Password';
                    }
                }else{
                    $message = 'User does not exist';
                }
            }
            if($flag==false) $page = 'login.login';
        // Receptionist
        }elseif(request('LoginAs')=='Receptionist'){
            $message= 'none';
            $flag = false;
            $receptionists = Receptionist::all();
            forEach ($receptionists as $receptionist) {
                if(request('name')==$receptionist->receptionist_name){
                    if(request('password')==$receptionist->receptionist_password){
                        $page = 'receptionist.index';
                        $req->session()->put('userID',$receptionist->id);
                        $req->session()->put('user',$receptionist->receptionist_name);
                        $req->session()->put('userType','receptionist');
                        $flag = true;
                    }else{
                        $message = 'Wrong Password';
                    }
                }else{
                    $message = 'User does not exist';
                }
            }
            if($flag==false) $page = 'login.login';
        // Laboratorist
        }elseif(request('LoginAs')=='Laboratorist'){
            $message= 'none';
            $flag = false;
            $laboratorists = Laboratorist::all();
            forEach ($laboratorists as $laboratorist) {
                if(request('name')==$laboratorist->tech_name){
                    if(request('password')==$laboratorist->tech_password){
                        $page = 'laboratorist.index';
                        $req->session()->put('userID',$laboratorist->id);
                        $req->session()->put('user',$laboratorist->tech_name);
                        $req->session()->put('userType','laboratorist');
                        $flag = true;
                    }else{
                        $message = 'Wrong Password';
                    }
                }else{
                    $message = 'User does not exist';
                }
            }
            if($flag==false) $page = 'login.login';
        }else{
            $page = 'page404';
        }
        return view($page,['message'=>$message]);
    }
}
