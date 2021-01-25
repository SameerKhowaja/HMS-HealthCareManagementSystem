<?php

use Illuminate\Support\Facades\Route;

// Login and Registration
Route::get('/login','LoginController@login');   //login form
Route::post('/profile','LoginController@profile');  //login submit click
Route::get('/patient-registration','SignupController@signup');  //registration form
Route::post('/patient-registration-progress','SignupController@register');  //registration submit click

// Error Page
Route::get('/error-page','ErrorController@index');  //error page

//======================================================
//                 Admin Dashboard START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/admin','AdminController@dashboard');   //dashboard
Route::get('/admin/hospital-data','AdminController@hospitalData');    //hospital-data
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


//======================================================
//                 Admin Dashboard ENDS
//=======================================================

// ------------------------------------------------------------------------------- No work down
