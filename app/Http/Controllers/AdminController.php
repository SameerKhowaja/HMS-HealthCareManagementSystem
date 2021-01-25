<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

class AdminController extends Controller
{

    // Admin Dashboard ---------------------------------

    function dashboard(){
        $patientCount = 0;
        $doctorCount = 0;
        $staffCount = 0;

        $type_data = Type::all();
        $patient_type_id = 'patient';
        $doctor_type_id = 'doctor';
        forEach($type_data as $data){
            if(strtolower($data->type_name) == $patient_type_id){
                $patient_type_id = $data->type_id;
            }
            if(strtolower($data->type_name) == $doctor_type_id){
                $doctor_type_id = $data->type_id;
            }
        }

        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            if($data->type_id == $patient_type_id){
                $patientCount++;
            }
            elseif($data->type_id == $doctor_type_id){
                $doctorCount++;
            }
            else{
                $staffCount++;
            }
        }

        $admins_data = DB::table('admins')->get();
        return view('admin.index', ['data'=>$admins_data, 'patientCount'=>$patientCount, 'doctorCount'=>$doctorCount, 'staffCount'=>$staffCount]);
    }

    // Admin Edit Profile
    function editProfile($id){
        $admin_data = Admin::findOrFail($id);
        session(['username'=>$admin_data->fname.' '.$admin_data->lname]);   //update session username
        return view('admin.editProfile', ['admin_data'=>$admin_data]);
    }

    // Admin Edit Profile Update Button
    function updateProfile($id, Request $request){
        $admin_data = Admin::findOrFail($id);

        $request->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
        ]);

        $admin_data->fname = request('fname');
        $admin_data->lname = request('lname');
        $admin_data->save();
        return redirect('/admin/editProfile/'.$id)->with('msg','success');
    }

    // Admin Edit Password
    function updatePassword($id){
        $cur_pass = request('current_pass');
        $new_pass = request('new_pass');

        $admin_data = Admin::findOrFail($id);
        if($admin_data->password == $cur_pass){
            $admin_data->password = $new_pass;
            $admin_data->save();
            return redirect('/admin/editProfile/'.$id)->with('msg','success');
        }
        return redirect('/admin/editProfile/'.$id)->with('msg','failed');
    }

    // Add admin view
    function addAdminRecord(){
        return view('admin.manageAdmin.addAdmin');
    }

    // Save Admin on click
    function addAdminRecordSave(Request $req){
        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200',
            'password1' => 'required|max:100',
            'password2' => 'required|max:100',
        ]);

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('admin.manageAdmin.addAdmin', ['msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Check if same email not exits
        $email_check = request('email_id');
        $admin_data = Admin::all();
        forEach($admin_data as $data){
            if($data->email_id == $email_check){
                return view('admin.manageAdmin.addAdmin', ['msg'=>'Error! ', 'long_msg'=>"Email Already Present"]);
            }
        }

        // image add
        $add_admin = new Admin;
        // Add data if everything correct
        $add_admin->fname = request('fname');
        $add_admin->lname = request('lname');
        $add_admin->email_id = request('email_id');
        $add_admin->password = request('password1');
        $add_admin->save();

        return view('admin.manageAdmin.addAdmin', ['msg'=>'Success! ', 'long_msg'=>"Added New Admin to database"]);
    }

    // Delete Admin Record
    function deleteAdminData($id){
        $UserID = session('userID');
        // could not delete yourself
        if($UserID == $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'You Are Deleting Yourself']);
        }

        $count = Admin::count();
        // could not delete if count is less than 1
        if($count<=1){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Only One Admin Left']);
        }

        // if everything fine then delete admin
        $data = Admin::findOrFail($id);
        $data->delete();
        return redirect("/admin")->with('msg','success');
    }

// Admin Dashboard Ends ---------------------------------


// Admin / Hospital Data Management ---------------------------------

    // Hospital Data View
    function hospitalData(){
        $getType = Type::all();
        return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>'none', 'doctorList'=>'none']);
    }

    // Add Record View btn click view
    function addRecord(){
        $getType = Type::all();
        return view('admin.hospitalData.addRecord', ['typesList'=>$getType]);
    }

    // Add Record Save to database according to account type
    function addRecordSave(Request $req){
        $req->validate([
            'accountType' => 'required',
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'password1' => 'required|max:100',
        ]);

        $dataType = Type::all();    // Type Table Access

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Check if same email not exits for patient type
        $email_check = request('email_id');
        $userType_id = request('accountType'); // In number 1,2,...
        $Hospital_data = Hospital_data::all();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check && $d->type_id == $userType_id) || ($userType_id == 0)){
                return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Error! ', 'long_msg'=>"Email Already Present"]);
            }
        }

        // Get Type name from Type ID
        $dataType_value = '';
        $nameOfType = '';
        forEach($dataType as $data){
            if($data->type_id == $userType_id){
                $nameOfType = $data->type_name; // original name use later for alert
                $dataType_value = strtolower($data->type_name); // lower case string
                $dataType_value = ucwords(str_replace(" ", "_", $dataType_value));  // capital first letter and replace space with underscore
            }
        }

        // If type name not present in database
        if($dataType_value == ''){
            return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Error! ', 'long_msg'=>"No Account Type Available"]);
        }

        // add Image ?

        // if all fine add Data
        $add_patient = new Hospital_data;
        $add_patient->type_id = $userType_id;
        $add_patient->fname = request('fname');
        $add_patient->lname = request('lname');
        $add_patient->cnic = request('cnic');
        $add_patient->email_id = request('email_id');
        $add_patient->phone_number = request('phone_number');
        $add_patient->gender = request('gender');
        $add_patient->city = request('city');
        $add_patient->address = request('address');
        $add_patient->dob = request('dob');
        $add_patient->password = request('password1');
        $add_patient->save();
        $primaryid = $add_patient->primary_id;  // return currently saved ID

        $dataType_value = $dataType_value.'s';  // Table name has 's' in end
        DB::table($dataType_value)->insert([
            'primary_id' => $primaryid,
        ]);

        return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Success! ', 'long_msg'=>"Added New ".$nameOfType." Record to database"]);
    }

    function searchRecord(Request $req, $id){
        $getType = Type::all();
        $doctorList = Doctor::all();
        $type_id = request('accountType');
        $type_name = '';
        if($type_id == 0){    // All Records
            // Complete Data of Hospital Table join with Types Table
            $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')->get(['hospital_datas.*', 'types.type_name']);
            $rowsReturn = count($hospital_data);
            if($rowsReturn == 0){
                return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList, 'msg'=>'No Records Found']);
            }else{
                return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList]);
            }
        }
        else{
            // Fetch Data on the basis of account Type
            $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')->where('types.type_id', $type_id)->get(['hospital_datas.*', 'types.type_name']);
            $rowsReturn = count($hospital_data);
            if($rowsReturn == 0){
                return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList, 'msg'=>'No Records Found']);
            }else{
                return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList]);
            }
        }

        // At Failure
        return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>'none', 'msg'=>'No Records Found']);
    }

    // Delete User in hospital data using modal
    function deleteUserData($id){
        $userData = Hospital_data::findOrFail($id);
        $primary_id = $userData->primary_id;    // primary_id of hospital data table
        $getType_id = $userData->type_id;       // type is also fetched

        $userTypeData = Type::findOrFail($getType_id);
        $getType_name = $userTypeData->type_name;   // type name fetched

        $getType_name = strtolower($getType_name); // lower case string
        $getType_name = ucwords(str_replace(" ", "_", $getType_name));  // capital first letter and replace space with underscore

        $getType_name = $getType_name.'s';    // Table name has 's' in end
        DB::table($getType_name)->where('primary_id', $primary_id)->delete();
        $userData->delete();    // Delete from hospital table

        return redirect("/admin/hospital-data")->with('msg','Successfully Deleted');
    }

    // Edit User Data View
    function editUserData($id){
        $hospitalData = Hospital_data::findOrFail($id);
        $getType = Type::all(); // for getting type name
        $typeName_val = '';
        forEach($getType as $typ){
            if($typ->type_id == $hospitalData->type_id){
                $typeName_val = $typ->type_name;
            }
        }

        if($typeName_val == "Doctor" || $typeName_val=="doctor"){
            $getSpecialist = Doctor::all();   // for getting doctor specialist
            $specialist_val = '';
            forEach($getSpecialist as $spec){
                if($spec->primary_id == $hospitalData->primary_id){
                    $specialist_val = $spec->specialist;
                }
            }
            return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'doctorSpecialist'=>$specialist_val]);
        }

        // if type is not doctor
        return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'doctorSpecialist'=>'']);
    }

    // Edit User Data on btn click save to DB
    function editUserDataSave($id, Request $req){
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
            'password1' => 'required|max:100',
        ]);

        // Getting Type Name
        $getType = Type::all();
        $typeName_val = '';
        forEach($getType as $typ){
            if($typ->type_id == $hospitalData->type_id){
                $typeName_val = $typ->type_name;
            }
        }

        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if($hospitalData->email_id != $email_id && $email_id == $data->email_id && $hospitalData->type_id == $data->type_id){
                // email present in db so return error msg
                return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'msg'=>'Error! ', 'long_msg'=>"Email Already Exists...!"]);
            }
        }

        // Image is also require ??
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
        $hospitalData->password = request('password1');
        $hospitalData->save();

        // Check if doctor or not
        $specialist = request('specialist');
        if($specialist != ''){
            // Type is Doctor
            $primaryID = $hospitalData->primary_id;  // return currently saved ID
            $doctor_data = Doctor::all();
            forEach($doctor_data as $data){
                if($data->primary_id == $primaryID){
                    $data->specialist = $specialist;
                    $data->save();
                }
            }
        }

        return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'doctorSpecialist'=>$specialist, 'msg'=>'Success! ', 'long_msg'=>"Record Updated...!"]);
    }




// Admin / Patient Management Ends ---------------------------------

    function roomManagement(){
        return view('admin.roomManagement');
    }

    function accountType(){
        return view('admin.accountType');
    }

    function admittedPatient(){
        return view('admin.admittedPatient');
    }

    function appointment(){
        return view('admin.appointment');
    }

    function labTest(){
        return view('admin.labTest');
    }


}
