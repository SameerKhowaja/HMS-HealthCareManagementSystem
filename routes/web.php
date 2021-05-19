<?php

use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/','HomepageController@index');     //Home Page View
Route::post('/contact-us','HomepageController@contactUs');     //Contact us post
Route::get('/view-doctors-list','HomepageController@viewDoctorsList');   //Doctor List

// Login and Registration
Route::get('/login','LoginController@login');   //login form
Route::post('/login','LoginController@profile');  //login submit click
Route::get('/patient-registration','SignupController@signup');  //registration form
Route::post('/patient-registration-progress','SignupController@register');  //registration submit click

// Error Page
Route::get('/error-page','ErrorController@index');  //error page


//======================================================
//                 Admin Module START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/admin','AdminController@dashboard');   //dashboard
Route::get('/admin/message','AdminController@messages');   //Messages
Route::get('/admin/past-event','AdminController@pastEvent');   //Past Event
Route::get('/admin/hospital-data','AdminController@hospitalData');    //hospital-data
Route::get('/admin/doctor-timing','AdminController@doctorTiming');    //doctor-timing
Route::get('/admin/patient-admitted','AdminController@admittedPatient');  //patient admitted
Route::get('/admin/patient-appointment','AdminController@appointmentPatient'); //patient appointment
Route::get('/admin/patient-lab-test','AdminController@labTestPatient'); //patient lab tests
Route::get('/admin/room-management','AdminController@roomManagement');  //room-management
Route::get('/admin/lab-test','AdminController@labTest');    //lab-test
Route::get('/admin/account-type','AdminController@accountType');    //account-type
Route::get('/admin/medicine','AdminController@viewMedicine');   //view Medicines
// ---------------------------------------------------------------------

// admin dashboard routes
Route::get('/admin/editProfile/{id}','AdminController@editProfile');    //edit profile view
Route::post('/admin/editProfile/{id}','AdminController@updateProfile'); //edit profile btn click
Route::post('/admin/editProfile/editPassword/{id}','AdminController@updatePassword');   //change password btn click
Route::get('/admin/add-record','AdminController@addAdminRecord'); //add admin view
Route::post('/admin/add-record','AdminController@addAdminRecordSave'); //add admin btn click
Route::delete('/admin/delete-record/{id}','AdminController@deleteAdminData'); //delete admin data which click

// Announcement & Messages
Route::post('/admin/message/create-announcement', 'AdminController@createAnnouncement');  //create new announcement
Route::get('/admin/message/manage-announcement', 'AdminController@manageAnnouncement');  //manage announcement view
Route::delete('/admin/message/manage-announcement/delete-announcement/{id}','AdminController@deleteAnnouncement'); //delete announcement
Route::post('/admin/message/manage-announcement/edit-announcement/{id}', 'AdminController@editAnnouncement');    //edit announcement message
Route::delete('/admin/message/delete-contact/{id}','AdminController@deleteContactData'); // delete contacts
Route::delete('/admin/message/delete-all-contacts','AdminController@deleteAllContactData'); // delete all contacts

// Past Events Routes
Route::post('/admin/past-event','AdminController@searchEventType'); //Event Search By Event Type Btn Click
Route::delete('/admin/past-event/delete-event/{id}','AdminController@deleteEvent'); //delete single event
Route::delete('/admin/past-event/delete-all-event','AdminController@deleteAllEvent'); //delete all events

// admin hospital-data routes
Route::get('/admin/hospital-data/addRecord','AdminController@addRecord');    //add patient record view
Route::post('/admin/hospital-data/addRecord','AdminController@addRecordSave');    //add patient record on btn click
Route::post('/admin/hospital-data','AdminController@searchRecord');    //search account type data using select box on button click
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
Route::post('/admin/room-management','AdminController@searchAvailable');    //search Room and Bed According to Availability on click
Route::post('/admin/room-management/room-edit/{id}','AdminController@editRoomNumber');    //edit room number on admin modal click
Route::post('/admin/room-management/bed-edit/{id}','AdminController@editBedNumber');    //edit bed number on admin modal click

// admin lab-management routes
Route::get('/admin/lab-test/addTest','AdminController@addTest');    //add Test record view
Route::post('/admin/lab-test/addTest','AdminController@addTestSave');    //add patient record view on btn click
Route::post('/admin/lab-test','AdminController@searchTest');    //search-test
Route::delete('/admin/lab-test/delete-record/{id}','AdminController@deleteLabData');    //delete Lab Test Data when modal btn clicks
Route::get('/admin/lab-test/edit-test/{id}','AdminController@editTestData');    //edit lab view
Route::post('/admin/lab-test/edit-test/{id}','AdminController@editLabDataSave');    //edit lab data on btn click

// admin medicine routes
Route::post('/admin/medicine/addMedicine','AdminController@saveAddedMedicine');   //save added Medicines
Route::delete('/admin/medicine/delete-medicine/{id}','AdminController@delMedicine');  //delete medicine
Route::get('/admin/medicine/edit-medicine/{id}','AdminController@editMedicine');   //edit view Medicines
Route::put('/admin/medicine/edit-medicine/{id}','AdminController@editMedicineSave');   //save edited Medicines

// admin Account Other Privileges
Route::get('/admin/account-type/edit-privilege/{id}','AdminController@editPrivileges');   //edit privileges view
Route::post('/admin/account-type/edit-privilege/{id}','AdminController@editPrivilegesSave');   //edit privileges save on btn click
Route::get('/admin/account-type/manage-other-role','AdminController@manageOtherRoles'); // manage roles
Route::post('/admin/account-type/manage-other-role/addRole','AdminController@addNewRole');   //add role on btn click
Route::post('/admin/account-type/manage-other-role/editRole/{id}','AdminController@editRole');   //edit role on btn click
Route::delete('/admin/account-type/manage-other-role/deleteRole/{id}','AdminController@deleteRole');    //delete role

//======================================================
//                 Admin Module ENDS
//=======================================================



//======================================================
//                 Patient Module START
//=======================================================


// navbar routes   -----------------------------------------------------
Route::get('/patient','PatientController@index');   //dashboard
Route::get('/patient/doctor-appointment','PatientController@doctorAppointment');   //view-doctor


// changed by ali
Route::get('/patient/current-appointment/{id}','PatientController@currentAppointment');   //request-appointment
Route::delete('/patient/current-appointment','PatientController@delAppointment');   // delete confirmed appointment
Route::get('/patient/appointments-detail/{id}','PatientController@appointmentsDetail');   //appointments-detail
Route::get('/patient/lab-test/{id}','PatientController@labTest');   //lab-test
Route::get('/patient/admissions-detail','PatientController@admissionsDetail');   //admissions-detail
Route::get('/patient/contact-us','PatientController@contactUs');   //contact-us  NOT SET
// ---------------------------------------------------------------------

Route::get('/patient/editPatientProfile/{id}','PatientController@editProfile');   //edit patient profile data
Route::post('/patient/editPatientProfile/{id}','PatientController@editProfileSave');   //edit patient profile data save on btn click
Route::post('/patient/editPatientProfile/editPassword/{id}','PatientController@editProfilePassword');   //edit patient profile password modal save on btn click

// ali changed ------
Route::post('/patient/doctor-appointment','PatientController@requestAppointment');   //schedule appointment request
Route::get('/patient/medical-history/{id}','PatientController@medicalHistory');
Route::post('/patient/survey/{id}','PatientController@saveSurvey');

// lab test route
Route::get("/patient/lab-test/printTestReport/{id}",'PatientController@printTestReport'); // print test report view


//======================================================
//                 Patient Module ENDS
//=======================================================



//======================================================
//                 Doctor Module START
//=======================================================

// ---------------------------------------------------------------------
Route::get('/doctor','DoctorController@index');   //dashboard
Route::get('/doctor/editDoctorProfile/{id}','DoctorController@editProfile');   //edit profile view
Route::post('/doctor/editDoctorProfile/{id}','DoctorController@editProfileSave');  //edit profile save btn click
Route::post('/doctor/editDoctorProfile/editPassword/{id}','DoctorController@editProfilePassword');   //edit Doctor profile password modal save on btn click

// Doctor All Appointments
Route::get('/doctor/patient-future-appointment','DoctorController@patientAllAppointmentView');   //dashboard
Route::get('/doctor/patient-past-appointment','DoctorController@patientPastAppointmentView');   //dashboard
Route::post('/doctor/patient-past-appointment','DoctorController@patientPastAppointmentSearch');   //status wise seacrh
Route::get('/doctor/patient-current-appointment','DoctorController@patientCurrentAppointmentView');
// Doctor treatment and history through appointment
Route::get('/doctor/patient-current-appointment/treatment/{id}','DoctorController@patientAppointmentTreatment');
Route::post('/doctor/patient-current-appointment/treatment/{id}','DoctorController@patientAppointmentTreatmentSave');
Route::get('/doctor/patient-current-appointment/medical-history/{id}','DoctorController@patientAppointmentMedicalHistory');


// Doctor Patient History routes
Route::get('/doctor/patients-history','DoctorController@viewPatients');   //view Patients
Route::get('/doctor/patients/treatment/{id}','DoctorController@patientTreatment');   //Interface of Add  Patient Treatment
Route::post('/doctor/patients/treatment/{id}','DoctorController@patientTreatmentSave');
Route::get('/doctor/patients/printPrescription/{id}','DoctorController@printPrescription'); // print test report view
Route::get('/doctor/patients/medical-history/{id}','DoctorController@patientMedicalHistory');  // This will show patient's complete medical record
Route::get('/doctor/patient-research-data','DoctorController@viewResearch');
Route::post('/doctor/perform-research','DoctorController@performResearch');
Route::get('/doctor/patients/lab-history/{id}','DoctorController@patientLabHistory');  // This will show patient's complete medical record
Route::get("/doctor/patient/lab-test/printTestReport/{id}",'DoctorController@printTestReport'); // print test report view
//======================================================
//                 Doctor Module ENDS
//=======================================================



//======================================================
//                 Receptionist Module START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/receptionist','ReceptionistController@index');   //dashboard
Route::get('/receptionist/doctor-view','ReceptionistController@doctorView');   //doctor view
Route::get('/receptionist/doctor-timing','ReceptionistController@doctorTiming');   //doctor timing
Route::get('/receptionist/patient-view','ReceptionistController@patientView');   //patient view
Route::get('/receptionist/patient-view/book-appointment/{id}','ReceptionistController@bookAppointment');   //patient view
Route::post('/receptionist/patient-view/book-appointment','ReceptionistController@saveAppointment');  // this will save an appoointment for a patient
Route::get('/receptionist/patient-admission','ReceptionistController@patientAdmission');   //patient admission
Route::get('/receptionist/patient-appointment','ReceptionistController@patientAppointment');   //patient appointment
Route::get('/receptionist/patient-lab-test','ReceptionistController@patientLabTest');   //patient lab test
Route::get('/receptionist/room-bed','ReceptionistController@viewRoomBed');   //room bed view
// ---------------------------------------------------------------------

Route::get('/receptionist/editReceptionistProfile/{id}','ReceptionistController@editProfile');   //edit profile view
Route::post('/receptionist/editReceptionistProfile/{id}','ReceptionistController@editProfileSave');   //edit profile save btn click
Route::post('/receptionist/editReceptionistProfile/editPassword/{id}','ReceptionistController@editProfilePassword');   //edit patient profile password modal save on btn click

// receptionist doctor-view routes
Route::get('/receptionist/doctor-view/addRecord','ReceptionistController@addDoctorRecord');    //add record view
Route::post('/receptionist/doctor-view/addRecord','ReceptionistController@addDoctorRecordSave');    //add record on btn click
Route::delete('/receptionist/doctor-view/delete-record/{id}','ReceptionistController@deleteDoctorData');    //delete User when modal btn clicks
Route::get('/receptionist/doctor-view/edit-record/{id}','ReceptionistController@editDoctorData');    //edit User view
Route::post('/receptionist/doctor-view/edit-record/{id}','ReceptionistController@editDoctorDataSave');    //edit User data on btn click

// receptionist doctor-timing routes
Route::get('/receptionist/doctor-timing/edit-timing/{id}','ReceptionistController@doctorTimingEditView'); //edit doctor timing view
Route::post('/receptionist/doctor-timing/edit-timing/{id}','ReceptionistController@doctorTimingEditSave'); //edit doctor timing save on btn click

// receptionist room-bed management routes
Route::delete('/receptionist/room-bed/bed-delete/{id}','ReceptionistController@deleteBed'); //delete bed on admin modal click
Route::post('/receptionist/room-bed/add-new-room','ReceptionistController@addNewRoom');   //add new room on modal btn click
Route::post('/receptionist/room-bed/add-new-bed','ReceptionistController@addNewBed');   //add new bed on modal btn click
Route::delete('/receptionist/room-bed/room-delete/{id}','ReceptionistController@deleteRoom'); //delete room on admin modal click
Route::post('/receptionist/room-bed','ReceptionistController@searchAvailable');    //search Room and Bed According to Availability on click
Route::post('/receptionist/room-bed/room-edit/{id}','ReceptionistController@editRoomNumber');    //edit room number on admin modal click
Route::post('/receptionist/room-bed/bed-edit/{id}','ReceptionistController@editBedNumber');    //edit bed number on admin modal click

// receptionist patient-view routes
Route::get('/receptionist/patient-view/addRecord','ReceptionistController@addPatientRecord');    //add record view
Route::post('/receptionist/patient-view/addRecord','ReceptionistController@addPatientRecordSave');    //add record on btn click
Route::get('/receptionist/patient-view/edit-record/{id}','ReceptionistController@editPatientData');    //edit User view
Route::post('/receptionist/patient-view/edit-record/{id}','ReceptionistController@editPatientDataSave');    //edit User data on btn click

//  receptionist patient-appointment routes
Route::delete('/receptionist/patient-appointment','ReceptionistController@delAppointment');   //delete patient appointment
Route::get('/receptionist/patient-appointment/request','ReceptionistController@appointmentRequest');   //displays patient appointment
Route::put('/receptionist/patient-appointment/request','ReceptionistController@acceptAppointment');     //save appointment


// receptionist patient-lab test routes
Route::get('/receptionist/patient-lab-test/select-test/{id}','ReceptionistController@patientTestRequest');  // send lab test request to technician
Route::post('/receptionist/patient-lab-test/request','ReceptionistController@testRequestSave'); // select test view search
//======================================================
//                 Receptionist Module ENDS
//=======================================================



//======================================================
//                 Lab Technician Module START
//=======================================================

// navbar routes   -----------------------------------------------------
Route::get('/labtechnician','labTechnicianController@index');   //dashboard
Route::get('/labtechnician/editlabTechnicianProfile/{id}','labTechnicianController@editProfile');   //edit profile view
Route::post('/labtechnician/editlabTechnicianProfile/{id}','labTechnicianController@editProfileSave');  //edit profile save btn click
Route::post('/labtechnician/editlabTechnicianProfile/editPassword/{id}','labTechnicianController@editProfilePassword');   //edit Doctor profile password modal save on btn click
Route::get('/labtechnician/lab-test','labTechnicianController@viewLabTest'); //patient lab tests
Route::get('/labtechnician/perform-test','labTechnicianController@viewPatients'); //patient lab tests
Route::get('/labtechnician/test-request','labTechnicianController@viewTestRequest'); //patient lab tests


// lab technician  lab-management routes
Route::post('/labtechnician/lab-test','labTechnicianController@searchTest');    //search-test
// lab technician  lab-management Lab analysis routes
Route::get('/labtechnician/lab-test/select-test/{id}','labTechnicianController@selectLabTest'); // select test view
Route::post('/labtechnician/lab-test/select-test/search','labTechnicianController@searchTest_inSelectView'); // select test view search
Route::post('/labtechnician/lab-test/perform-test/{id}','labTechnicianController@addTestReport'); // create test report view
Route::post('/labtechnician/lab-test/saveTestReport','labTechnicianController@saveTestReport'); // save test report view
Route::get('/labtechnician/lab-test/printTestReport/{id}','labTechnicianController@printTestReport'); // print test report view


// lab technician  lab-management lab test request routes
Route::post('/labtechnician/test-request/perform-test','labTechnicianController@requestedLabTest'); // this will show all the lab tests requested for a particular patient 
// this route will redirect back to remaining tests of a particular patient
Route::post('/labtechnician/test-request/back','labTechnicianController@backToRemainingTest');
// ---------------------------------------------------------------------

//======================================================
//                 Lab Technician Module ENDS
//=======================================================



//======================================================
//                 Other Module START
//=======================================================
Route::get('/other','OtherController@index');   //dashboard
Route::get('/other/editOtherProfile/{id}','OtherController@editProfile');   //profile view
Route::post('/other/editOtherProfile/{id}','OtherController@editProfileSave');   //edit profile save btn click
Route::post('/other/editOtherProfile/editPassword/{id}','OtherController@editProfilePassword');   //edit profile password modal save on btn click

// Other Navbar Routes
Route::get('/other/manage-patient','OtherController@managePatient');
Route::get('/other/doctor-timing','OtherController@doctorTiming');
Route::get('/other/room-bed-management','OtherController@roomBedManagement');
// Have not work below
Route::get('/other/patient-appointment','OtherController@patientAppointment');
Route::get('/other/patient-labTest','OtherController@patientLabTest');

// ---------------------

// managePatient Routes
Route::get('/other/manage-patient/edit-record/{id}','OtherController@editPatient');
Route::post('/other/manage-patient/edit-record/{id}','OtherController@editPatientSave');
Route::get('/other/manage-patient/add-record','OtherController@addPatient');
Route::post('/other/manage-patient/add-record','OtherController@addPatientSave');
Route::delete('/other/manage-patient/delete-record/{id}','OtherController@deletePatient');

// doctorTiming Routes
Route::get('/other/doctor-timing/edit-timing/{id}','OtherController@doctorTimingEdit'); //edit doctor timing view
Route::post('/other/doctor-timing/edit-timing/{id}','OtherController@doctorTimingEditSave'); //edit doctor timing save on btn click

// roomBedManagement Routes
Route::delete('/other/room-bed-management/bed-delete/{id}','OtherController@deleteBed'); //delete bed on admin modal click
Route::post('/other/room-bed-management/add-new-room','OtherController@addNewRoom');   //add new room on modal btn click
Route::post('/other/room-bed-management/add-new-bed','OtherController@addNewBed');   //add new bed on modal btn click
Route::delete('/other/room-bed-management/room-delete/{id}','OtherController@deleteRoom'); //delete room on admin modal click
Route::post('/other/room-bed-management','OtherController@searchAvailable');    //search Room and Bed According to Availability on click
Route::post('/other/room-bed-management/room-edit/{id}','OtherController@editRoomNumber');    //edit room number on admin modal click
Route::post('/other/room-bed-management/bed-edit/{id}','OtherController@editBedNumber');    //edit bed number on admin modal click

//======================================================
//                 Other Module ENDS
//=======================================================

// ------------------------------------------------------------------------------- No work down
