<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Patient;
use App\Laboratorist;
use App\Receptionist;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function department(){
        return view('admin.department');
    }

    function doctor(){
        $doctors = Doctor::All();
        return view('admin.doctor',['doctors'=>$doctors]);
    }

    function patient(){
        $patients = Patient::All();
        return view('admin.patient',['patients'=>$patients]);
    }

    function laboratorist(){
        $laboratorists = Laboratorist::All();
        return view('admin.laboratorist',['laboratorists'=> $laboratorists]);
    }

    function receptionist(){
        return view('admin.receptionist');
    }

    function viewAppointment(){
        return view('admin.viewAppointment');
    }
    //============================================
    //           Doctor Crud Operation
    // ==========================================
    
    
    // Add Doctor
    public function createDoctor()
    {
        return view('admin.manageDoctors.create');
    }
   
    public function addDoctor()
    {
        $doctor = new Doctor();
        $doctor->doctor_name=request('doctor_name');
        $doctor->doctor_password=request('doctor_password');
        $doctor->last_name=request('last_name');
        $doctor->CNIC=request('CNIC');
        $doctor->gender=request('gender');
        $doctor->address=request('address');
        $doctor->contact_no=request('contact_no');
        $doctor->DOB=request('DOB');
        $doctor->email=request('email');
        $doctor->specialist=request('specialist');
        $doctor->save();
        return redirect('/admin/doctor')->with('success','Doctor added successfully.');
    }
    // Show Doctor
    public function showDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.manageDoctors.show',['doctor'=>$doctor]);
    }
    //  Delete Doctor
    public function deleteDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect('/admin/doctor')->with('success','Doctor deleted successfully.');
    }
    // Edit Doctor
    public function editDoctor($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.manageDoctors.edit',['doctor'=>$doctor]);
    }
    public function updateDoctor($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->doctor_name=request('doctor_name');
        $doctor->doctor_password=request('doctor_password');
        $doctor->last_name=request('last_name');
        $doctor->CNIC=request('CNIC');
        $doctor->gender=request('gender');
        $doctor->address=request('address');
        $doctor->contact_no=request('contact_no');
        $doctor->DOB=request('DOB');
        $doctor->email=request('email');
        $doctor->specialist=request('specialist');
        $doctor->save();
        return redirect('/admin/doctor')->with('success','Doctor updated successfully.');
    }

    //============================================
    //           Patient Crud Operation
    // ==========================================
    
    
    // Add Patient
    public function createPatient()
    {
        return view('admin.managePatients.create');
    }
   
    public function addPatient()
    {
        $patient = new Patient();
        $patient->patient_name=request('patient_name');
        $patient->patient_password=request('patient_password');
        $patient->last_name=request('last_name');
        $patient->CNIC=request('CNIC');
        $patient->gender=request('gender');
        $patient->address=request('address');
        $patient->contact_no=request('contact_no');
        $patient->DOB=request('DOB');
        $patient->email=request('email');
        $patient->date_admitted=request('date_admitted');
        $patient->admission_id=request('admission_id');
        $patient->room=request('room');
        $patient->PID=request('PID');
        $patient->date_discharged=request('date_discharged');
        $patient->save();
        return redirect('/admin/patient')->with('success','Patient added successfully.');
    }
    // Show Patient
    public function showPatient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.managePatients.show',['patient'=>$patient]);
    }
    //  Delete Patient
    public function deletePatient($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect('/admin/patient')->with('success','Patient deleted successfully.');
    }
    // Edit Patient
    public function editPatient($id){
        $patient = Patient::findOrFail($id);
        return view('admin.managePatients.edit',['patient'=>$patient]);
    }
    public function updatePatient($id){
        $patient = Patient::findOrFail($id);
        $patient->patient_name=request('patient_name');
        $patient->patient_password=request('patient_password');
        $patient->last_name=request('last_name');
        $patient->CNIC=request('CNIC');
        $patient->gender=request('gender');
        $patient->address=request('address');
        $patient->contact_no=request('contact_no');
        $patient->DOB=request('DOB');
        $patient->email=request('email');
        $patient->date_admitted=request('date_admitted');
        $patient->admission_id=request('admission_id');
        $patient->room=request('room');
        $patient->PID=request('PID');
        $patient->date_discharged=request('date_discharged');
        $patient->save();
        return redirect('/admin/patient')->with('success','Patient updated successfully.');
    }

    //============================================
    //           Laboratorist Crud Operation
    // ==========================================
    
    
    // Add Laboratorist
    public function createLaboratorist()
    {
        return view('admin.manageLaboratorist.create');
    }
   
    public function addLaboratorist()
    {
        $laboratorist = new Laboratorist();
        $laboratorist->tech_name=request('tech_name');
        $laboratorist->tech_password=request('tech_password');
        $laboratorist->gender=request('gender');
        $laboratorist->DOB=request('DOB');
        $laboratorist->CNIC=request('CNIC');
        $laboratorist->contact_no=request('contact_no');
        $laboratorist->description=request('description');
        $laboratorist->email=request('email');
        $laboratorist->save();
        return redirect('/admin/laboratorist')->with('success','Laboratorist added successfully.');
    }
    // Show Laboratorist
    public function showLaboratorist($id)
    {
        $laboratorist = Laboratorist::findOrFail($id);
        return view('admin.manageLaboratorist.show',['laboratorist'=>$laboratorist]);
    }
    //  Delete Laboratorist
    public function deleteLaboratorist($id)
    {
        $laboratorist = Laboratorist::findOrFail($id);
        $laboratorist->delete();
        return redirect('/admin/laboratorist')->with('success','laboratorist deleted successfully.');
    }
    // Edit Laboratorist
    public function editLaboratorist($id){
        $laboratorist = Laboratorist::findOrFail($id);
        return view('admin.manageLaboratorist.edit',['laboratorist'=>$laboratorist]);
    }
    public function updateLaboratorist($id){
        $laboratorist = Laboratorist::findOrFail($id);
        $laboratorist->tech_name=request('tech_name');
        $laboratorist->tech_password=request('tech_password');
        $laboratorist->gender=request('gender');
        $laboratorist->DOB=request('DOB');
        $laboratorist->CNIC=request('CNIC');
        $laboratorist->contact_no=request('contact_no');
        $laboratorist->description=request('description');
        $laboratorist->email=request('email');
        $laboratorist->save();
        return redirect('/admin/laboratorist')->with('success','laboratorist updated successfully.');
    }

}
