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
use App\User;

class AdminController extends Controller
{
    // Admin Dashboard View
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
        if ($req->hasFile('image')){
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            //return view('admin.manageAdmin.addAdmin', ['msg'=>'Error! ', 'long_msg'=>"Email Already Present"]);
        }
        else{
            // Add data if everything correct
            $add_admin->fname = request('fname');
            $add_admin->lname = request('lname');
            $add_admin->email_id = request('email_id');
            $add_admin->password = request('password1');
            $add_admin->save();
        }

        return view('admin.manageAdmin.addAdmin', ['msg'=>'Success! ', 'long_msg'=>"Added New Admin to database"]);
    }

    // Delete Admin Record
    function deleteData($id){
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




// ---------------------------
    function patientManagement(){
        return view('admin.patientManagement');
    }

    function doctorManagement(){
        return view('admin.doctorManagement');
    }

    function staffManagement(){
        return view('admin.staffManagement');
    }

    function hospitalData(){
        return view('admin.hospitalData');
    }

    function appointment(){
        return view('admin.appointment');
    }

    function labTest(){
        return view('admin.labTest');
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
