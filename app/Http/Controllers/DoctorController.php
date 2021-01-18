<?php

namespace App\Http\Controllers;
use App\Doctor;

use Illuminate\Http\Request;

class DoctorController extends Controller
{   // ==========================================
    //    Doctor Dashboard Left Side Bar Tabs
    // ==========================================
    function index(){
        return view('doctor.index');
    }

    function patient(){
        return view('doctor.patient');
    }

    function laboratorist(){
        return view('doctor.laboratorist');
    }

    function receptionist(){
        return view('doctor.receptionist');
    }

    function viewAppointment(){
        return view('doctor.viewAppointment');
    }
    //============================================
    //           Doctor Crud Operation
    // ==========================================
    
    
    // Add Doctor
    // public function createDoctor()
    // {
    //     return view('doctor.manageDoctors.create');
    // }
   
    // public function addDoctor()
    // {
    //     $doctor = new Doctor();
    //     $doctor->doctor_name=request('doctor_name');
    //     $doctor->doctor_password=request('doctor_password');
    //     $doctor->last_name=request('last_name');
    //     $doctor->CNIC=request('CNIC');
    //     $doctor->gender=request('gender');
    //     $doctor->address=request('address');
    //     $doctor->contact_no=request('contact_no');
    //     $doctor->DOB=request('DOB');
    //     $doctor->email=request('email');
    //     $doctor->specialist=request('specialist');
    //     $doctor->save();
    //     return redirect('/doctor/doctor')->with('success','Doctor added successfully.');
    // }
    // // Show Doctor
    // public function showDoctor($id)
    // {
    //     $doctor = Doctor::findOrFail($id);
    //     return view('doctor.manageDoctors.show',['doctor'=>$doctor]);
    // }
    // //  Delete Doctor
    // public function deleteDoctor($id)
    // {
    //     $doctor = Doctor::findOrFail($id);
    //     $doctor->delete();
    //     return redirect('/doctor/doctor')->with('success','Doctor deleted successfully.');
    // }
    // // Edit Doctor
    // public function editDoctor($id){
    //     $doctor = Doctor::findOrFail($id);
    //     return view('doctor.manageDoctors.edit',['doctor'=>$doctor]);
    // }
    // public function updateDoctor($id){
    //     $doctor = Doctor::findOrFail($id);
    //     $doctor->doctor_name=request('doctor_name');
    //     $doctor->doctor_password=request('doctor_password');
    //     $doctor->last_name=request('last_name');
    //     $doctor->CNIC=request('CNIC');
    //     $doctor->gender=request('gender');
    //     $doctor->address=request('address');
    //     $doctor->contact_no=request('contact_no');
    //     $doctor->DOB=request('DOB');
    //     $doctor->email=request('email');
    //     $doctor->specialist=request('specialist');
    //     $doctor->save();
    //     return redirect('/doctor/doctor')->with('success','Doctor updated successfully.');
    // }
}
