<?php

use Illuminate\Support\Facades\Route;

// Login and Registration
Route::get('/','LoginController@login');
Route::post('/profile','LoginController@profile');
Route::get('/patient-registration','SignupController@signup');
Route::post('/patient-registration-progress','SignupController@register');

// Error Page
Route::get('/error-page','ErrorController@index');

//======================================================
//                 Admin Dashboard START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/admin','AdminController@dashboard');
Route::get('/admin/patient-management','AdminController@patientManagement');
Route::get('/admin/doctor-management','AdminController@doctorManagement');
Route::get('/admin/staff-management','AdminController@staffManagement');
Route::get('/admin/hospital-data','AdminController@hospitalData');
Route::get('/admin/appointment','AdminController@appointment');
Route::get('/admin/lab-test','AdminController@labTest');
// ---------------------------------------------------------------------

// admin dashboard routes
Route::get('/admin/editProfile/{id}','AdminController@editProfile');
Route::post('/admin/editProfile/{id}','AdminController@updateProfile');
Route::post('/admin/editProfile/editPassword/{id}','AdminController@updatePassword');



Route::get('/admin/department','AdminController@department');
Route::get('/admin/doctor','AdminController@doctor');
Route::get('/admin/patient','AdminController@patient');
Route::get('/admin/laboratorist','AdminController@laboratorist');
Route::get('/admin/receptionist','AdminController@receptionist');
Route::get('/admin/viewAppointment','AdminController@viewAppointment');

// Doctor Crud Operations
Route::get('/admin/createDoctor','AdminController@createDoctor');
Route::post('/admin/addDoctor','AdminController@addDoctor');
Route::get('/admin/showDoctor/{id}','AdminController@showDoctor');
Route::delete('/admin/deleteDoctor/{id}','AdminController@deleteDoctor');
Route::get('/admin/editDoctor/{id}','AdminController@editDoctor');
Route::post('/admin/updateDoctor/{id}','AdminController@updateDoctor');

// Patient Crud Operations
Route::get('/admin/createPatient','AdminController@createPatient');
Route::post('/admin/addPatient','AdminController@addPatient');
Route::get('/admin/showPatient/{id}','AdminController@showPatient');
Route::delete('/admin/deletePatient/{id}','AdminController@deletePatient');
Route::get('/admin/editPatient/{id}','AdminController@editPatient');
Route::post('/admin/updatePatient/{id}','AdminController@updatePatient');

// Laboratorist Crud Operations
Route::get('/admin/createLaboratorist','AdminController@createLaboratorist');
Route::post('/admin/addLaboratorist','AdminController@addLaboratorist');
Route::get('/admin/showLaboratorist/{id}','AdminController@showLaboratorist');
Route::delete('/admin/deleteLaboratorist/{id}','AdminController@deleteLaboratorist');
Route::get('/admin/editLaboratorist/{id}','AdminController@editLaboratorist');
Route::post('/admin/updateLaboratorist/{id}','AdminController@updateLaboratorist');




//======================================================
//                 Admin Dashboard START
//======================================================
// Doctor Dashboard
Route::get('/doctor','DoctorController@index');
Route::get('/doctor/department','DoctorController@department');
Route::get('/doctor/doctor','DoctorController@doctor');
Route::get('/doctor/patient','DoctorController@patient');
Route::get('/doctor/laboratorist','DoctorController@laboratorist');
Route::get('/doctor/receptionist','DoctorController@receptionist');
Route::get('/doctor/viewAppointment','DoctorController@viewAppointment');

// Doctor Crud Operations
Route::get('/doctor/createDoctor','DoctorController@createDoctor');
Route::post('/doctor/addDoctor','DoctorController@addDoctor');
Route::get('/doctor/showDoctor/{id}','DoctorController@showDoctor');
Route::delete('/doctor/deleteDoctor/{id}','DoctorController@deleteDoctor');
Route::get('/doctor/editDoctor/{id}','DoctorController@editDoctor');
Route::post('/doctor/updateDoctor/{id}','DoctorController@updateDoctor');




//======================================================
//                 Patient Dashboard
//======================================================

// Patient Dashboard
Route::get('/patient','PatientController@index');
Route::get('/patient/doctor','PatientController@doctor');
Route::get('/patient/patient','PatientController@patient');
Route::get('/patient/receptionist','PatientController@receptionist');
Route::get('/patient/viewAppointment','PatientController@viewAppointment');






//======================================================
//                 Laboratorist Dashboard
//======================================================

// Laboratorist Dashboard
Route::get('/laboratorist','LaboratoristController@index');
Route::get('/laboratorist/department','LaboratoristController@department');
Route::get('/laboratorist/viewAppointment','LaboratoristController@viewAppointment');



//======================================================
//                 Receptionist Dashboard
//======================================================

// Receptionist Dashboard
Route::get('/receptionist','ReceptionistController@index');
Route::get('/receptionist/patient','ReceptionistController@patient');
Route::get('/receptionist/doctor','ReceptionistController@doctor');

Route::get('/receptionist/laboratorist','ReceptionistController@laboratorist');

Route::get('/receptionist/viewAppointment','ReceptionistController@viewAppointment');



