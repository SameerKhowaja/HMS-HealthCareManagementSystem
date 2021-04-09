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
use App\Announcement;
use App\Contact_table;
use App\Lab_test_parameter;
use App\Lab_test_report;
use App\Lab_test;
use App\Patient_addmission;
use App\Patient;
use App\Receptionist;
use App\Room;
use App\Type;
use App\Other;
use App\Past_event;
use App\Medicine;
use App\User;

class OtherController extends Controller
{
    // Profile View
    public function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        return view("other.index", ['userData'=>$userData]);
    }

    // Edit Profile Page
    function editProfile($id){
        // Check for invalid forgery attack
        if(session("userID") != $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Do not try to change URL...!']);
        }

        $hospital_data = Hospital_data::findOrFail($id);
        session(['username'=>$hospital_data->fname.' '.$hospital_data->lname]);   //update session username
        session(['image'=>$hospital_data->image]);   //update session image
        return view('other.editProfile', ['hospital_data'=>$hospital_data]);
    }

    // Edit Profile Save on btn click
    function editProfileSave(Request $req, $id){
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
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);


        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id && $hospitalData->type_id == $data->type_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic && $hospitalData->type_id == $data->type_id){
                // email present in db so return error msg
                return view("other.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $hospitalData->image = $img;
        }
        $hospitalData->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Self Profile Updated";
        $newEvent->save();

        session(['username'=>$hospitalData->fname.' '.$hospitalData->lname]);   //update session username
        session(['image'=>$hospitalData->image]);   //update session image

        return view('other.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
    }

    // Change Profile Password
    function editProfilePassword($id){
        // Check for invalid forgery attack
        if(session("userID") != $id){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Do not try to change URL...!']);
        }

        $hospital_data = Hospital_data::findOrFail($id);
        // check for old password
        $oldPassword = request("current_pass");
        if($oldPassword != $hospital_data->password){
            return view('other.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>"Error!", 'long_msg'=>' Invalid Old Password...!']);
        }
        else{   // old password is same
            $hospital_data->password = request("new_pass");
            $hospital_data->save();

            // Event Update
            $primaryID = session()->get('userID');
            $newEvent = new Past_event;
            $newEvent->event_type = "Modified";
            $newEvent->primary_id = $primaryID;
            $newEvent->description = "Self Profile Password Updated";
            $newEvent->save();
            return view('other.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }


    // Patient Manage View
    // Profile View
    public function managePatient(){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->get();
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('other.managePatient', ['userData'=>$userData, 'dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('other.managePatient', ['userData'=>$userData, 'dataFetched'=>$hospital_data]);
        }
    }

    // Edit Patient
    public function editPatient($id){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->findOrFail($id);
        return view('other.managePatient.editRecord', ['userData'=>$userData, 'hospitalData'=>$hospital_data]);
    }

    // Edit Patient Save
    public function editPatientSave($id, Request $req){
        $hospitalData = Hospital_data::findOrFail($id);

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::all();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id && $hospitalData->type_id == $data->type_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic && $hospitalData->type_id == $data->type_id){
                // email present in db so return error msg
                return redirect()->back()->with("msg", "Email/CNIC Already Exists...!");
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
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $hospitalData->image = $img;
        }
        $hospitalData->save();
        return redirect()->back()->with("msg", "Record Updated...!");
    }

    // add Patient
    public function addPatient(){
        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        return view('other.managePatient.addRecord', ['userData'=>$userData]);
    }

    // add Patient Save
    public function addPatientSave(Request $req){
        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'password1' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }


        // Check if same email-cnic not exits for patient type
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $userType_id = $patientTypeID; // In number 1,2,...
        $Hospital_data = Hospital_data::all();
        $Hospital_data = Hospital_data::all();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check && $d->type_id == $userType_id) || ($d->cnic == $cnic_check && $d->type_id == $userType_id) || ($userType_id == 0)){
                return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
            }
        }

        // if all fine add Data
        $add_HospitalData = new Hospital_data;
        $add_HospitalData->type_id = $userType_id;
        $add_HospitalData->fname = request('fname');
        $add_HospitalData->lname = request('lname');
        $add_HospitalData->cnic = request('cnic');
        $add_HospitalData->email_id = request('email_id');
        $add_HospitalData->phone_number = request('phone_number');
        $add_HospitalData->gender = request('gender');
        $add_HospitalData->city = request('city');
        $add_HospitalData->address = request('address');
        $add_HospitalData->dob = request('dob');
        $add_HospitalData->password = request('password1');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_HospitalData->image = $img;
        }
        $add_HospitalData->save();
        $primaryid = $add_HospitalData->primary_id;  // return currently saved ID

        DB::table('patients')->insert([
            'primary_id' => $primaryid,
        ]);
        return view('other.managePatient.addRecord', ['userData'=>$userData, 'msg'=>'Success! ', 'long_msg'=>"Added New Patient Record to Database"]);
    }

    // Delete Patient
    public function deletePatient($id){
        $getType = Type::all();
        $patientTypeID = 0;
        forEach($getType as $type){
            if($type->type_name == 'Patient' || $type->type_name == 'patient'){
                $patientTypeID = $type->type_id;
                break;
            }
        }

        if($patientTypeID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>'Patient Type not Exists!']);
        }

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);
        if($userData->editPatient == 1){
            $hospital_data = Hospital_data::where('type_id', '=', $patientTypeID)->findOrFail($id);
            $hospital_data->delete();
            return redirect("/other/manage-patient")->with('msg','Successfully Deleted...!');
        }
        else{
            return redirect("/other/manage-patient")->with('msg','You have no Rights to Delete...!');
        }

    }

    // Doctor Timings View
    public function doctorTiming(){
        // joining 3 tables
        $dataFetched = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->get();

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        return view("other.doctorTiming", ['userData'=>$userData, 'dataFetched'=>$dataFetched]);
    }

    //edit doctor timings view
    function doctorTimingEdit($id){
        // joining 3 tables where clause
        $data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->where('doctor_available_id', $id)->get();

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $dataFetched = $data[0]; // first index fetched
        return view("other.doctorTiming.editTiming", ['userData'=>$userData, 'dataFetched'=>$dataFetched]);
    }

    //edit doctor timings on button click
    function doctorTimingEditSave($id){
        $doctorTiming = Doctor_availability::findOrFail($id);   // find in availability table

        // days mon-sun
        $monday_start = request("monday_start");
        $monday_end = request("monday_end");
        $tuesday_start = request("tuesday_start");
        $tuesday_end = request("tuesday_end");
        $wednesday_start = request("wednesday_start");
        $wednesday_end = request("wednesday_end");
        $thursday_start = request("thursday_start");
        $thursday_end = request("thursday_end");
        $friday_start = request("friday_start");
        $friday_end = request("friday_end");
        $saturday_start = request("saturday_start");
        $saturday_end = request("saturday_end");
        $sunday_start = request("sunday_start");
        $sunday_end = request("sunday_end");

        $doctorTiming->monday_start = $monday_start;
        $doctorTiming->monday_end = $monday_end;
        $doctorTiming->tuesday_start = $tuesday_start;
        $doctorTiming->tuesday_end = $tuesday_end;
        $doctorTiming->wednesday_start = $wednesday_start;
        $doctorTiming->wednesday_end = $wednesday_end;
        $doctorTiming->thursday_start = $thursday_start;
        $doctorTiming->thursday_end = $thursday_end;
        $doctorTiming->friday_start = $friday_start;
        $doctorTiming->friday_end = $friday_end;
        $doctorTiming->saturday_start = $saturday_start;
        $doctorTiming->saturday_end = $saturday_end;
        $doctorTiming->sunday_start = $sunday_start;
        $doctorTiming->sunday_end = $sunday_end;

        // if one of them null then both should be null
        if(($monday_start=='' && $monday_end!='') || ($monday_start!='' && $monday_end=='')){
            $doctorTiming->monday_start = null;
            $doctorTiming->monday_end = null;
        }
        if(($tuesday_start=='' && $tuesday_end!='') || ($tuesday_start!='' && $tuesday_end=='')){
            $doctorTiming->tuesday_start = null;
            $doctorTiming->tuesday_end = null;
        }
        if(($wednesday_start=='' && $wednesday_end!='') || ($wednesday_start!='' && $wednesday_end=='')){
            $doctorTiming->wednesday_start = null;
            $doctorTiming->wednesday_end = null;
        }
        if(($thursday_start=='' && $thursday_end!='') || ($thursday_start!='' && $thursday_end=='')){
            $doctorTiming->thursday_start = null;
            $doctorTiming->thursday_end = null;
        }
        if(($friday_start=='' && $friday_end!='') || ($friday_start!='' && $friday_end=='')){
            $doctorTiming->friday_start = null;
            $doctorTiming->friday_end = null;
        }
        if(($saturday_start=='' && $saturday_end!='') || ($saturday_start!='' && $saturday_end=='')){
            $doctorTiming->saturday_start = null;
            $doctorTiming->saturday_end = null;
        }
        if(($sunday_start=='' && $sunday_end!='') || ($sunday_start!='' && $sunday_end=='')){
            $doctorTiming->sunday_start = null;
            $doctorTiming->sunday_end = null;
        }

        // update data
        $doctorTiming->save();

        // joining 3 tables where clause
        $data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->where('doctor_available_id', $id)->get();

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        $dataFetched = $data[0]; // first index fetched
        return view("other.doctorTiming.editTiming", ['userData'=>$userData, 'dataFetched'=>$dataFetched, 'msg'=>'Success!', 'long_msg'=>' Timings Updated...!']);
    }

    public function roomBedManagement(){
        //return Room::with('bed')->get();
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
            array_push($room_nums, $data->room_number);  // Add all rooms to array
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

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

        return view('other.roomManagement', ['userData'=>$userData, 'roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
    }

    // Delete Room on click
    function deleteBed($id){
        $data = Bed::findOrFail($id);
        $data->delete();
        return redirect("/other/room-bed-management/")->with('msg','Bed Deleted Successfully...!');
    }

    // Add new room to DB on btn click
    function addNewRoom(Request $req){
        $rooms = Room::all();
        $newRoomNumber = request("newRoomNumber");
        $flag = 1;
        forEach($rooms as $r){
            if($newRoomNumber == $r->room_number){
                $flag = 0;  // Means Room Already Exist
                return redirect("/other/room-bed-management/")->with('msg','ERROR! '.$newRoomNumber.' Already Exist');
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newRoom = new Room;
            $newRoom->room_number = $newRoomNumber;
            $newRoom->save();
            return redirect("/other/room-bed-management/")->with('msg','New Room Added Successfully...!');
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
                return redirect("/other/room-bed-management/")->with('msg','ERROR! '.$newBedNumber.' Already Exist in '.$data->room_number);
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newBed = new Bed;
            $newBed->bed_number = $newBedNumber;
            $newBed->room_id = $roomID;
            $newBed->save();
            return redirect("/other/room-bed-management/")->with('msg','New Bed Added Successfully...!');
        }
    }

    function deleteRoom($id){
        $rooms = Room::with('bed')->where('room_number', '=', $id)->firstOrFail();
        $rooms->delete();
        return redirect("/other/room-bed-management/")->with('msg','Room Deleted Successfully...!');
    }

    // Search Room and Bed According to Availability
    function searchAvailable(Request $req){
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

        $primary_ID = session("userID");
        $userData = Hospital_data::join('others', 'others.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($primary_ID);

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
            return view('other.roomManagement', ['userData'=>$userData, 'roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
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
            return view('other.roomManagement', ['userData'=>$userData, 'roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
        }
        else{   //All Record
            return redirect("/other/room-bed-management/");
        }
    }

    // Edit Room Number on Modal btn Click
    function editRoomNumber(Request $req, $id){
        $newRoomNumber = request("newRoomNumber");

        // If both Number are Same
        if($newRoomNumber == $id){
            return redirect("/other/room-bed-management/")->with('msg','ERROR! Entered Same Room Number');
        }

        $rooms = Room::all();
        forEach($rooms as $r){
            if($r->room_number == $newRoomNumber && $newRoomNumber != $id){
                // Room Exist
                return redirect("/other/room-bed-management/")->with('msg','ERROR! '.$newRoomNumber.' Already Exist');
            }
        }

        // If everything is good
        $room_edit = Room::where('room_number', '=', $id)->firstOrFail();
        $room_edit->room_number = $newRoomNumber;
        $room_edit->save();

        return redirect("/other/room-bed-management/")->with('msg','Room Updated Successfully...!');
    }

    // Edit Bed Number on modal btn click
    function editBedNumber(Request $req, $id){
        $bed_data = Bed::findOrFail($id);
        $newBedNumber = request("newBedNumber");

        // If both Number are Same
        if($newBedNumber == $bed_data->bed_number){
            return redirect("/other/room-bed-management/")->with('msg','ERROR! Entered Same Bed Number');
        }

        // Check if bed number is not same in that room
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->room_id == $bed_data->room_id && $b->bed_number == $newBedNumber){
                // Fail to enter
                return redirect("/other/room-bed-management/")->with('msg','ERROR! '.$newBedNumber.' Already Exist in Room');
            }
        }

        // if everything is good
        $bed_data->bed_number = $newBedNumber;
        $bed_data->save();

        return redirect("/other/room-bed-management/")->with('msg','Bed Updated Successfully...!');
    }

}
