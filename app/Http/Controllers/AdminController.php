<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Admin;
use App\Appointment_result;
use App\Appointment;
use App\Bed;
use App\Doctor;
use App\Doctor_availability;
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

// Admin Dashboard STARTS ---------------------------------

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
        session(['image'=>$admin_data->image]);   //update session image
        return view('admin.editProfile', ['admin_data'=>$admin_data]);
    }

    // Admin Edit Profile Update Button
    function updateProfile($id, Request $request){
        $admin_data = Admin::findOrFail($id);

        $request->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:30',  // image size less than 30KB
        ]);

        $admin_data->fname = request('fname');
        $admin_data->lname = request('lname');
        if($request->hasFile('image')){
            $img = base64_encode(file_get_contents($request->file('image')->path()));
            $admin_data->image = $img;
        }
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
            'cnic' => 'required|max:100',
            'password1' => 'required|max:100',
            'password2' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:30',  // image size less than 30KB
        ]);

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('admin.manageAdmin.addAdmin', ['msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Check if same email-cnic not exits
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $admin_data = Admin::all();
        forEach($admin_data as $data){
            if($data->email_id == $email_check || $data->cnic == $cnic_check){
                return view('admin.manageAdmin.addAdmin', ['msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
            }
        }

        $add_admin = new Admin;
        // Add data if everything correct
        $add_admin->fname = request('fname');
        $add_admin->lname = request('lname');
        $add_admin->email_id = request('email_id');
        $add_admin->cnic = request('cnic');
        $add_admin->password = request('password1');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_admin->image = $img;
        }
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

// Admin Dashboard ENDS ---------------------------------


// Admin / Hospital Data Management STARTS ---------------------------------

    // Hospital Data View All Records Show
    function hospitalData(){
        $getType = Type::all();
        $doctorList = Doctor::all();
        // Complete Data of Hospital Table join with Types Table
        $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')->get(['hospital_datas.*', 'types.type_name']);
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList, 'msg'=>'No Records Found']);
        }else{
            return view('admin.hospitalData', ['typesList'=>$getType, 'dataFetched'=>$hospital_data, 'doctorList'=>$doctorList]);
        }
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
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        $dataType = Type::all();    // Type Table Access

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Check if same email-cnic not exits for patient type
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $userType_id = request('accountType'); // In number 1,2,...
        $Hospital_data = Hospital_data::all();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check && $d->type_id == $userType_id) || ($d->cnic == $cnic_check && $d->type_id == $userType_id) || ($userType_id == 0)){
                return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
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
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_patient->image = $img;
        }
        $add_patient->save();
        $primaryid = $add_patient->primary_id;  // return currently saved ID

        $dataType_value = $dataType_value.'s';  // Table name concat with 's' in end
        DB::table($dataType_value)->insert([
            'primary_id' => $primaryid,
        ]);

        // Now find doctor id if type is doctor
        try{
            $doctorsList = DB::table($dataType_value)->select('doctor_id')->where('primary_id', $primaryid)->get();
            $doctorAvailability = new Doctor_availability; // add doctor id to this table
            $doctorAvailability->doctor_id = $doctorsList[0]->doctor_id;
            $doctorAvailability->save();
        }catch (Throwable $e) {
            // is not doctor type
        }

        return view('admin.hospitalData.addRecord', ['typesList'=>$dataType, 'msg'=>'Success! ', 'long_msg'=>"Added New ".$nameOfType." Record to database"]);
    }

    function searchRecord(Request $req, $id){
        $getType = Type::all();
        $doctorList = Doctor::all();
        $type_id = request('accountType'); // All Record
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

        $getType_name = $getType_name.'s';    // Table name concat with 's' in end

        // Now find doctor id if type is doctor delete doctor data from doctor_availability table
        try{
            $doctorsList = DB::table($getType_name)->select('doctor_id')->where('primary_id', $primary_id)->get();
            DB::table('doctor_availability')->where('doctor_id', $doctorsList[0]->doctor_id)->delete();
        }catch (Throwable $e) {
            // is not doctor type
        }

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

        if($typeName_val == "Doctor" || $typeName_val=="doctor"){ // doctor have speciality
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
            'specialist' => 'max:300',
            'password1' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
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
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id && $hospitalData->type_id == $data->type_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic && $hospitalData->type_id == $data->type_id){
                // email present in db so return error msg
                return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
            }
        }

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
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $hospitalData->image = $img;
        }
        $hospitalData->save();
        $primaryID = $hospitalData->primary_id;  // return currently saved ID

        // Check if doctor or not
        $specialist = request('specialist');

        $doctor_data = Doctor::all();
        forEach($doctor_data as $data){
            if($data->primary_id == $primaryID){
                $data->specialist = request('specialist');
                $data->save();
            }
        }

        return view("admin.hospitalData.editRecord", ['hospitalData'=>$hospitalData, 'accountTypeName'=>$typeName_val, 'doctorSpecialist'=>$specialist, 'msg'=>'Success! ', 'long_msg'=>"Record Updated...!"]);
    }

    // doctor timing view
    function doctorTiming(){
        // joining 3 tables
        $dataFetched = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->get();

        return view("admin.doctorTiming", ['dataFetched'=>$dataFetched]);
    }

    //edit doctor timings view
    function doctorTimingEditView($id){
        // joining 3 tables where clause
        $data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->where('doctor_available_id', $id)->get();

        $dataFetched = $data[0]; // first index fetched
        return view("admin.doctorTiming.editTiming", ['dataFetched'=>$dataFetched]);
    }


// Admin / Hospital Data Management ENDS ---------------------------------


// Admin / Room Management STARTS ----------------------------------------

    // room management view
    function roomManagement(){
        $roomCount = Room::count(); // Room Count
        $bedCount = Bed::count(); // Bed Count

        $availableBed = 0;
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->available == 1){
                $availableBed++;
            }
        }

        $rooms = Room::all();
        $room_nums = array();   // total rooms
        forEach($rooms as $data){
            array_push($room_nums,$data->room_number);  // Add all rooms to array
        }

        // joining room and bed table using room id
        $room_data = Room::join('beds', 'beds.room_id', '=', 'rooms.room_id')->get(['rooms.*', 'beds.*']);
        $allRooms = array();    //Empty Rooms array
        forEach($room_nums as $num){
            $allRooms[$num]=array();
            forEach($room_data as $data){
                if($data["room_number"] == $num ){
                    array_push($allRooms[$num],$data['bed_number']);
                }
            }
        }
        //return $room_nums;
        return view('admin.roomManagement', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
    }

    // Delete Room on click
    function deleteBed($id){
        $data = Bed::findOrFail($id);
        $data->delete();
        return redirect("/admin/room-management/")->with('msg','success');
    }

    // Add new room to DB on btn click
    function addNewRoom(Request $req){
        $rooms = Room::all();
        $newRoomNumber = request("newRoomNumber");
        $flag = 1;
        forEach($rooms as $r){
            if($newRoomNumber == $r->room_number){
                $flag = 0;  // Means Room Already Exist
                return view("page404", ['msg'=>"Error", 'msg_long'=>'Room # '.$newRoomNumber.' Already Exist']);
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newRoom = new Room;
            $newRoom->room_number = $newRoomNumber;
            $newRoom->save();
            return redirect("/admin/room-management/")->with('msg','success');
        }
    }

    // Add new bed to DB on btn click
    function addNewBed(Request $req){
        // join room and bed
        $room_data = Room::join('beds', 'beds.room_id', '=', 'rooms.room_id')->get(['rooms.*', 'beds.*']);
        $roomID = request("roomID");
        $newBedNumber = request("newBedNumber");
        $flag = 1;
        forEach($room_data as $data){
            if($data->room_id == $roomID && $data->bed_number == $newBedNumber){
                $flag = 0;  // Means Room Already Exist
                return view("page404", ['msg'=>"Error", 'msg_long'=>$newBedNumber.' Already Exist in Room # '.$data->room_number]);
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newBed = new Bed;
            $newBed->bed_number = $newBedNumber;
            $newBed->room_id = $roomID;
            $newBed->save();
            return redirect("/admin/room-management/")->with('msg','success');
        }
    }

    function deleteRoom($id){
        // id is room number
        $rooms = Room::where('room_number', '=', $id)->firstOrFail();
        $roomID = $rooms->room_id;

        // First Delete All Beds
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->room_id == $roomID){
                $b->delete();
            }
        }

        // Then Delete Bed
        $rooms->delete();
        return redirect("/admin/room-management/")->with('msg','success');
    }

    // Search Room and Bed According to Availability
    function searchAvailable(Request $req, $id){
        $searchType = request("searchType");
        // 0=All Record, 1=Available Beds, 2=Occupied Beds

        $roomCount = Room::count(); // Room Count
        $bedCount = Bed::count(); // Bed Count

        $availableBed = 0;
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->available == 1){
                $availableBed++;
            }
        }

        $rooms = Room::all();
        $room_nums = array();   // total rooms
        forEach($rooms as $data){
            array_push($room_nums,$data->room_number);  // Add all rooms to array
        }

        if($searchType=='1'){   //Available Beds
            // joining room and bed table using room id where available is 1
            $room_data = Room::join('beds', 'beds.room_id', '=', 'rooms.room_id')->where('beds.available', '1')->get(['rooms.*', 'beds.*']);
            $allRooms = array();    //Empty Rooms array
            forEach($room_nums as $num){
                $allRooms[$num]=array();
                forEach($room_data as $data){
                    if($data["room_number"] == $num ){
                        array_push($allRooms[$num],$data['bed_number']);
                    }
                }
            }
            return view('admin.roomManagement', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
        }
        elseif($searchType=='2'){   //Occupied Beds
            // joining room and bed table using room id where available is 0
            $room_data = Room::join('beds', 'beds.room_id', '=', 'rooms.room_id')->where('beds.available', '0')->get(['rooms.*', 'beds.*']);
            $allRooms = array();    //Empty Rooms array
            forEach($room_nums as $num){
                $allRooms[$num]=array();
                forEach($room_data as $data){
                    if($data["room_number"] == $num ){
                        array_push($allRooms[$num],$data['bed_number']);
                    }
                }
            }
            return view('admin.roomManagement', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
        }
        else{   //All Record
            return redirect("/admin/room-management/");
        }
    }

    // Edit Room Number on Modal btn Click
    function editRoomNumber(Request $req, $id){
        $newRoomNumber = request("newRoomNumber");

        // If both Number are Same
        if($newRoomNumber == $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Entered Same Room Number']);
        }

        $rooms = Room::all();
        forEach($rooms as $r){
            if($r->room_number == $newRoomNumber && $newRoomNumber != $id){
                // Room Exist
                return view("page404", ['msg'=>"Error", 'msg_long'=>$newRoomNumber.' Already Exist']);
            }
        }

        // If everything is good
        $room_edit = Room::where('room_number', '=', $id)->firstOrFail();
        $room_edit->room_number = $newRoomNumber;
        $room_edit->save();

        return redirect("/admin/room-management/");
    }

    // Edit Bed Number on modal btn click
    function editBedNumber(Request $req, $id){
        $bed_data = Bed::findOrFail($id);
        $newBedNumber = request("newBedNumber");

        // If both Number are Same
        if($newBedNumber == $bed_data->bed_number){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Entered Same Bed Number']);
        }

        // Check if bed number is not same in that room
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->room_id == $bed_data->room_id && $b->bed_number == $newBedNumber){
                // Fail to enter
                return view("page404", ['msg'=>"Error", 'msg_long'=>$newBedNumber.' Already Exist in Room']);
            }
        }

        // if everything is good
        $bed_data->bed_number = $newBedNumber;
        $bed_data->save();

        return redirect("/admin/room-management/");
    }



// Admin / Room Management ENDS ----------------------------------------



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
