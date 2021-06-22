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
use App\Contact_table;
use App\Announcement;
use App\User;

class HomepageController extends Controller
{
    function index(){
        $doctors = Doctor::all();
        $doctorCount = count($doctors); // doctor count
        $patients = Patient::all();
        $patientCount = count($patients); // patient count
        $beds = Bed::all();
        $bedCount = count($beds);   // bed count

        $dataFetched = Announcement::join('admins', 'admins.admin_id', '=', 'announcements.admin_id')->get(['announcements.*', 'admins.fname', 'admins.lname']);
        $dataFetchedCount = count($dataFetched);
        if($dataFetchedCount <= 0){
            return view("home.index", ['doctorCount'=>$doctorCount, 'patientCount'=>$patientCount, 'bedCount'=>$bedCount, 'dataFetched'=>'none']);
        }

        return view("home.index", ['doctorCount'=>$doctorCount, 'patientCount'=>$patientCount, 'bedCount'=>$bedCount, 'dataFetched'=>$dataFetched]);
    }

    function contactUs(Request $req){
        // validating
        $req->validate([
            'fullname' => 'required|max:150',
            'email_id' => 'required|max:150',
            'message' => 'required|max:500',
        ]);

        $contactTable = new Contact_table;
        $contactTable->fullname = request('fullname');
        $contactTable->email_id = request('email_id');
        $contactTable->message = request('message');
        $contactTable->save();

        return redirect('/'); // home page
    }

    function viewDoctorsList(){
        $data = Hospital_data::join('doctors', 'doctors.primary_id', '=', 'hospital_datas.primary_id')->get(['hospital_datas.fname','hospital_datas.lname','hospital_datas.image', 'doctors.specialist']);
        $dataCount = count($data);
        if($dataCount <= 0){
            return view("home.doctorList", ['doctorData'=>"none"]);
        }
        else{
            return view("home.doctorList", ['doctorData'=>$data]);
        }
        return redirect('/'); // In case of error
    }
}
