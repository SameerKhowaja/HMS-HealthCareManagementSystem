<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/','HomepageController@index');     //Home Page View
Route::post('/contact-us','HomepageController@contactUs');     //Contact us post
Route::get('/view-doctors-list','HomepageController@viewDoctorsList');   //Doctor List

// Login and Registration
Route::get('/login','LoginController@login');   //login form
Route::post('/profile','LoginController@profile');  //login submit click
Route::get('/patient-registration','SignupController@signup');  //registration form
Route::post('/patient-registration-progress','SignupController@register');  //registration submit click

// Error Page
Route::get('/error-page','ErrorController@index');  //error page

//======================================================
//                 Admin Module START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/admin','AdminController@dashboard');   //dashboard
Route::get('/admin/hospital-data','AdminController@hospitalData');    //hospital-data
Route::get('/admin/doctor-timing','AdminController@doctorTiming');    //doctor-timing
Route::get('/admin/room-management','AdminController@roomManagement');  //room-management
Route::get('/admin/account-type','AdminController@accountType');    //account-type
Route::get('/admin/admitted-patient','AdminController@admittedPatient');  //admitted-patient
Route::get('/admin/appointment','AdminController@appointment'); //appointment
Route::get('/admin/lab-test','AdminController@labTest');    //lab-test
// ---------------------------------------------------------------------

// admin dashboard routes
Route::get('/admin/editProfile/{id}','AdminController@editProfile');    //edit profile view
Route::post('/admin/editProfile/{id}','AdminController@updateProfile'); //edit profile btn click
Route::post('/admin/editProfile/editPassword/{id}','AdminController@updatePassword');   //change password btn click
Route::get('/admin/add-record','AdminController@addAdminRecord'); //add admin view
Route::post('/admin/add-record','AdminController@addAdminRecordSave'); //add admin btn click
Route::delete('/admin/delete-record/{id}','AdminController@deleteAdminData'); //delete admin data which click

// admin hospital-data routes
Route::get('/admin/hospital-data/addRecord','AdminController@addRecord');    //add patient record view
Route::post('/admin/hospital-data/addRecord','AdminController@addRecordSave');    //add patient record on btn click
Route::post('/admin/hospital-data/{id}','AdminController@searchRecord');    //search account type data using select box on button click
Route::delete('/admin/hospital-data/delete-record/{id}','AdminController@deleteUserData');    //delete User when modal btn clicks
Route::get('/admin/hospital-data/edit-record/{id}','AdminController@editUserData');    //edit User view
Route::post('/admin/hospital-data/edit-record/{id}','AdminController@editUserDataSave');    //edit User data on btn click

// admin doctor-timing routes
Route::get('/admin/doctor-timing/edit-timing/{id}','AdminController@doctorTimingEditView'); //edit doctor timing view
Route::post('/admin/doctor-timing/edit-timing/{id}','AdminController@doctorTimingEditSave'); //edit doctor timing save on btn click

// admin room-management routes
Route::delete('/admin/room-management/bed-delete/{id}','AdminController@deleteBed'); //delete bed on admin modal click
Route::post('/admin/room-management/add-new-room','AdminController@addNewRoom');   //add new room on modal btn click
Route::post('/admin/room-management/add-new-bed','AdminController@addNewBed');   //add new bed on modal btn click
Route::delete('/admin/room-management/room-delete/{id}','AdminController@deleteRoom'); //delete room on admin modal click
Route::post('/admin/room-management/{id}','AdminController@searchAvailable');    //search Room and Bed According to Availability on click
Route::post('/admin/room-management/room-edit/{id}','AdminController@editRoomNumber');    //edit room number on admin modal click
Route::post('/admin/room-management/bed-edit/{id}','AdminController@editBedNumber');    //edit bed number on admin modal click


// ali added
// admin lab-management routes
Route::get('/admin/lab-test/addTest','AdminController@addTest');    //add Test record view
Route::post('/admin/lab-test/addTest','AdminController@addTestSave');    //add patient record view on btn click
Route::post('/admin/lab-test/{id}','AdminController@searchTest');    //search-test
Route::delete('/admin/lab-test/delete-record/{id}','AdminController@deleteLabData');    //delete Lab Test Data when modal btn clicks
Route::get('/admin/lab-test/edit-test/{id}','AdminController@editTestData');    //edit lab view
Route::post('/admin/lab-test/edit-test/{id}','AdminController@editLabDataSave');    //edit lab data on btn click

//======================================================
//                 Admin Module ENDS
//=======================================================


//======================================================
//                 Patient Module START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/patient','PatientController@index');   //dashboard
Route::get('/patient/doctor-appointment','PatientController@doctorAppointment');   //view-doctor
Route::get('/patient/current-appointment','PatientController@currentAppointment');   //request-appointment
Route::get('/patient/appointments-detail','PatientController@appointmentsDetail');   //appointments-detail
Route::get('/patient/lab-test','PatientController@labTest');   //lab-test
Route::get('/patient/admissions-detail','PatientController@admissionsDetail');   //admissions-detail
Route::get('/patient/contact-us','PatientController@index');   //contact-us  NOT SET
// ---------------------------------------------------------------------

Route::get('/patient/editPatientProfile/{id}','PatientController@editProfile');   //edit patient profile data
Route::post('/patient/editPatientProfile/{id}','PatientController@editProfileSave');   //edit patient profile data save on btn click
Route::post('/patient/editPatientProfile/editPassword/{id}','PatientController@editProfilePassword');   //edit patient profile password modal save on btn click

Route::get('/patient/doctor-appointment/schedule-appointment/{id}','PatientController@scheduleAppointmentView');   //schedule appointment view



//======================================================
//                 Patient Module ENDS
//=======================================================

// ------------------------------------------------------------------------------- No work down
