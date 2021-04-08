<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Hospital_data;
use App\Appointment_request;
use App\Room;
use App\Bed;
use App\Type;
use App\Doctor;
use App\Doctor_availability;
use App\Patient;
use App\Past_event;
use App\Appointment_history;
use App\Lab_test_name;
use App\Lab_test_parameter;
use App\Lab_test_report;
use App\Lab_report_params;
use App\Lab_technician;
use App\LabTestRequest;

class ReceptionistController extends Controller
{
    function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::findOrFail($primary_ID);
        return view('receptionist.index', ['userData'=>$userData]);
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
        return view('receptionist.editProfile', ['hospital_data'=>$hospital_data]);
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
                return view("receptionist.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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

        return view('receptionist.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
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
            return view('receptionist.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>"Error!", 'long_msg'=>' Invalid Old Password...!']);
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
            return view('receptionist.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }


    //  Room Bed Management STARTS ----------------------------------------

    // room management view
    function viewRoomBed(){
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
        //return $room_nums;
        return view('receptionist.manageRoomBed', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
    }

    // Delete Bed on click
    function deleteBed($id){
        $data = Bed::findOrFail($id);
        $bedNumber = $data->bed_number;
        $data->delete();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Deleted";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Deleted Bed (".$bedNumber.")";
        $newEvent->save();

        return redirect("receptionist/room-bed/")->with('msg','Bed Deleted Successfully...!');
    }

    // Add new room to DB on btn click
    function addNewRoom(Request $req){
        $rooms = Room::all();
        $newRoomNumber = request("newRoomNumber");
        $flag = 1;
        forEach($rooms as $r){
            if($newRoomNumber == $r->room_number){
                $flag = 0;  // Means Room Already Exist
                return redirect("/receptionist/room-bed/")->with('msg','ERROR! '.$newRoomNumber.' Already Exist');
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newRoom = new Room;
            $newRoom->room_number = $newRoomNumber;
            $newRoom->save();

            // Event Update
            $primaryID = session()->get('userID');
            $newEvent = new Past_event;
            $newEvent->event_type = "Added";
            $newEvent->primary_id = $primaryID;
            $newEvent->description = "Added New Room (".$newRoomNumber.")";
            $newEvent->save();

            return redirect("/receptionist/room-bed/")->with('msg','New Room Added Successfully...!');
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
                return redirect("/receptionist/room-bed/")->with('msg','ERROR! '.$newBedNumber.' Already Exist in '.$data->room_number);
            }
        }

        // New room not exist in DB
        if($flag == 1){
            $newBed = new Bed;
            $newBed->bed_number = $newBedNumber;
            $newBed->room_id = $roomID;
            $newBed->save();

            // Event Update
            $primaryID = session()->get('userID');
            $newEvent = new Past_event;
            $newEvent->event_type = "Added";
            $newEvent->primary_id = $primaryID;
            $newEvent->description = "Added New Bed (".$newBedNumber.")";
            $newEvent->save();

            return redirect("/receptionist/room-bed/")->with('msg','New Bed Added Successfully...!');
        }
    }

    function deleteRoom($id){
        $rooms = Room::with('bed')->where('room_number', '=', $id)->firstOrFail();
        $roomNumber = $rooms->room_number;
        $rooms->delete();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Deleted";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Deleted Room (".$roomNumber.")";
        $newEvent->save();

        return redirect("/receptionist/room-bed/")->with('msg','Room Deleted Successfully...!');
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
            return view('receptionist.manageRoomBed', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
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
            return view('receptionist.manageRoomBed', ['roomCount'=>$roomCount, 'bedCount'=>$bedCount, 'availableBed'=>$availableBed, 'room_data'=>$room_data, 'roomNumbers'=>$rooms]);
        }
        else{   //All Record
            return redirect("/receptionist/room-bed/");
        }
    }

    // Edit Room Number on Modal btn Click
    function editRoomNumber(Request $req, $id){
        $newRoomNumber = request("newRoomNumber");

        // If both Number are Same
        if($newRoomNumber == $id){
            return redirect("/receptionist/room-bed/")->with('msg','ERROR! Entered Same Room Number');
        }

        $rooms = Room::all();
        forEach($rooms as $r){
            if($r->room_number == $newRoomNumber && $newRoomNumber != $id){
                // Room Exist
                return redirect("/receptionist/room-bed/")->with('msg','ERROR! '.$newRoomNumber.' Already Exist');
            }
        }

        // If everything is good
        $room_edit = Room::where('room_number', '=', $id)->firstOrFail();
        $oldRoomNumber = $room_edit->room_number; // old room
        $room_edit->room_number = $newRoomNumber;
        $room_edit->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Updated Room (".$oldRoomNumber.") to (".$newRoomNumber.")";
        $newEvent->save();

        return redirect("/receptionist/room-bed/")->with('msg','Room Updated Successfully...!');;
    }

    // Edit Bed Number on modal btn click
    function editBedNumber(Request $req, $id){
        $bed_data = Bed::findOrFail($id);
        $oldBedNumber = $bed_data->bed_number; // old bed
        $newBedNumber = request("newBedNumber");

        // If both Number are Same
        if($newBedNumber == $bed_data->bed_number){
            return redirect("/receptionist/room-bed/")->with('msg','ERROR! Entered Same Bed Number');
        }

        // Check if bed number is not same in that room
        $beds = Bed::all();
        forEach($beds as $b){
            if($b->room_id == $bed_data->room_id && $b->bed_number == $newBedNumber){
                // Fail to enter
                return redirect("/receptionist/room-bed/")->with('msg','ERROR! '.$newBedNumber.' Already Exist in Room');
            }
        }

        // if everything is good
        $bed_data->bed_number = $newBedNumber;
        $bed_data->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Updated Bed (".$oldBedNumber.") to (".$newBedNumber.")";
        $newEvent->save();

        return redirect("/receptionist/room-bed/")->with('msg','Bed Updated Successfully...!');
    }

    //  Room Bed Management ENDS ------------------------------------------


    // Doctor Data Management STARTS --------------------------------------

    // View All Records Show
    function doctorView(){
        $getType = Type::all();
        $doctorID = 0;
        foreach($getType as $type){
            if($type->type_name == 'doctor' || $type->type_name == 'Doctor'){
                $doctorID = $type->type_id;
            }
        }
        if($doctorID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Doctor Type Not Exist...!']);
        }
        $doctorList = Doctor::all();
        // Complete Data of Hospital Table join with Types Table
        $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')->where("hospital_datas.type_id", $doctorID)->get(['hospital_datas.*', 'types.type_name']);
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('receptionist.doctorDetail.doctorData', ['dataFetched'=>$hospital_data, 'doctorList'=>$doctorList, 'msg'=>'No Records Found']);
        }else{
            return view('receptionist.doctorDetail.doctorData', ['dataFetched'=>$hospital_data, 'doctorList'=>$doctorList]);
        }
    }

    // Add Record View btn click view
    function addDoctorRecord(){
        return view('receptionist.doctorDetail.doctorData.addRecord');
    }

    // Add Record Save to database according to account type
    function addDoctorRecordSave(Request $req){
        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'specialist' => 'max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'password1' => 'required|max:100',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('receptionist.doctorDetail.doctorData.addRecord', ['msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Getting Doctor ID
        $getType = Type::all();
        $doctorID = 0;
        foreach($getType as $type){
            if($type->type_name == 'doctor' || $type->type_name == 'Doctor'){
                $doctorID = $type->type_id; // doctor_id which is really type_id
            }
        }
        if($doctorID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Doctor Type Not Exist...!']);
        }

        // Check if same email-cnic not exits for patient type
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $Hospital_data = Hospital_data::where('type_id', $doctorID)->get();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check) || ($d->cnic == $cnic_check) || ($doctorID == 0)){
                return view('receptionist.doctorDetail.doctorData.addRecord', ['msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
            }
        }

        // if all fine add Data as Doctor
        $add_data = new Hospital_data;
        $add_data->type_id = $doctorID;
        $add_data->fname = request('fname');
        $add_data->lname = request('lname');
        $add_data->cnic = request('cnic');
        $add_data->email_id = request('email_id');
        $add_data->phone_number = request('phone_number');
        $add_data->gender = request('gender');
        $add_data->city = request('city');
        $add_data->address = request('address');
        $add_data->dob = request('dob');
        $add_data->password = request('password1');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_data->image = $img;
        }
        $add_data->save();
        $primaryid = $add_data->primary_id;  // return currently saved ID

        $add_dataDoctor = new Doctor;
        $add_dataDoctor->primary_id = $primaryid;
        $add_dataDoctor->specialist = request('specialist');
        $add_dataDoctor->save();
        $doctor_id = $add_dataDoctor->doctor_id; // return currently saved ID

        $doctorAvailability = new Doctor_availability; // add doctor id to this table
        $doctorAvailability->doctor_id = $doctor_id;
        $doctorAvailability->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Added";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Added New Doctor (".request('fname')." ".request('lname').")";
        $newEvent->save();

        return view('receptionist.doctorDetail.doctorData.addRecord', ['msg'=>'Success! ', 'long_msg'=>"Added New Doctor Record to database"]);
    }

    // Delete User in hospital data using modal
    function deleteDoctorData($id){
        $userData = Hospital_data::findOrFail($id);
        $doctorName = $userData->fname." ".$userData->lname;
        $userData->delete();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Deleted";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Deleted Doctor (".$doctorName.")";
        $newEvent->save();

        return redirect("/receptionist/doctor-view")->with('msg','Successfully Deleted Doctor...!');
    }

    // Edit User Data View
    function editDoctorData($id){
        $hospital_data = Hospital_data::join('doctors', 'doctors.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($id);
        return view("receptionist.doctorDetail.doctorData.editRecord", ['hospitalData'=>$hospital_data]);
    }

    // Edit User Data on btn click save to DB
    function editDoctorDataSave($id, Request $req){
        $hospitalData = Hospital_data::findOrFail($id);

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'specialist' => 'max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'specialist' => 'max:300',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        // Getting Doctor ID
        $getType = Type::all();
        $doctorID = 0;
        foreach($getType as $type){
            if($type->type_name == 'doctor' || $type->type_name == 'Doctor'){
                $doctorID = $type->type_id;
            }
        }
        if($doctorID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Doctor Type Not Exist...!']);
        }

        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::where('type_id', $doctorID)->get();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic){
                // email present in db so return error msg
                return view("receptionist.doctorDetail.doctorData.editRecord", ['hospitalData'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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
        $primaryID = $hospitalData->primary_id;  // return currently saved ID

        $doctor_data = Doctor::where("primary_id", $primaryID)->firstOrFail();
        $doctor_data->specialist = request('specialist');
        $doctor_data->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Updated Doctor (".request('fname')." ".request('lname').")";
        $newEvent->save();

        $hospital_data = Hospital_data::join('doctors', 'doctors.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($id);
        return view("receptionist.doctorDetail.doctorData.editRecord", ['hospitalData'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Record Updated...!"]);
    }

    // Doctor Data Management ENDS ---------------------------------


    // Doctor Timings STARTS -----------------------------------------

    // doctor timing view
    function doctorTiming(){
        // joining 3 tables
        $dataFetched = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->get();

        return view("receptionist.doctorDetail.doctorTiming", ['dataFetched'=>$dataFetched]);
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
        return view("receptionist.doctorDetail.doctorTiming.editTiming", ['dataFetched'=>$dataFetched]);
    }

    //edit doctor timings on button click
    function doctorTimingEditSave($id){
        $doctorTiming = Doctor_availability::findOrFail($id);   // find in availability table
        $doctor_id = $doctorTiming->doctor_id;
        $doctorData = DB::table('doctors')->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')->where("doctor_id", $doctor_id)->get();

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

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Modified";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Updated Doctor Timing (".$doctorData[0]->fname." ".$doctorData[0]->lname.")";
        $newEvent->save();

        // joining 3 tables where clause
        $data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.*', 'hospital_datas.*', 'doctor_availability.*')
            ->where('doctor_available_id', $id)->get();

        $dataFetched = $data[0]; // first index fetched
        return view("receptionist.doctorDetail.doctorTiming.editTiming", ['dataFetched'=>$dataFetched, 'msg'=>'Success!', 'long_msg'=>' Timings Updated...!']);
    }

    // Doctor Timings ENDS -----------------------------------------


    // Patient Vew STARTS -------------------------------------------

    // View All Records Show
    function patientView(){
        $getType = Type::all();
        $patientID = 0;
        foreach($getType as $type){
            if($type->type_name == 'patient' || $type->type_name == 'Patient'){
                $patientID = $type->type_id;
            }
        }
        if($patientID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Doctor Type Not Exist...!']);
        }
        // Complete Data of Hospital Table join with patient Table
        $hospital_data = Hospital_data::join('patients', 'patients.primary_id', '=', 'hospital_datas.primary_id')->get(['hospital_datas.*', 'patients.patient_id']);
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('receptionist.patientDetail.patientData', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('receptionist.patientDetail.patientData', ['dataFetched'=>$hospital_data]);
        }
    }

    // Add Record View btn click view
    function addPatientRecord(){
        return view('receptionist.patientDetail.patientData.addRecord');
    }

    // Add Record Save to database according to account type
    function addPatientRecordSave(Request $req){
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

        // Check Password1 and Password2 Matched
        if(request('password1') != request('password2')){
            return view('receptionist.patientDetail.patientData.addRecord', ['msg'=>'Error! ', 'long_msg'=>"Password Not Matched"]);
        }

        // Getting Doctor ID
        $getType = Type::all();
        $patientID = 0;
        foreach($getType as $type){
            if($type->type_name == 'patient' || $type->type_name == 'Patient'){
                $patientID = $type->type_id; // doctor_id which is really type_id
            }
        }
        if($patientID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Patient Type Not Exist...!']);
        }

        // Check if same email-cnic not exits for patient type
        $email_check = request('email_id');
        $cnic_check = request('cnic');
        $Hospital_data = Hospital_data::where('type_id', $patientID)->get();
        forEach($Hospital_data as $d){
            if(($d->email_id == $email_check) || ($d->cnic == $cnic_check) || ($patientID == 0)){
                return view('receptionist.patientDetail.patientData.addRecord', ['msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Present"]);
            }
        }

        // if all fine add Data as Doctor
        $add_data = new Hospital_data;
        $add_data->type_id = $patientID;
        $add_data->fname = request('fname');
        $add_data->lname = request('lname');
        $add_data->cnic = request('cnic');
        $add_data->email_id = request('email_id');
        $add_data->phone_number = request('phone_number');
        $add_data->gender = request('gender');
        $add_data->city = request('city');
        $add_data->address = request('address');
        $add_data->dob = request('dob');
        $add_data->password = request('password1');
        if($req->hasFile('image')){
            $img = base64_encode(file_get_contents($req->file('image')->path()));
            $add_data->image = $img;
        }
        $add_data->save();
        $primaryid = $add_data->primary_id;  // return currently saved ID

        $add_dataDoctor = new Patient;
        $add_dataDoctor->primary_id = $primaryid;
        $add_dataDoctor->save();

        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Added";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Added New Patient (".request('fname')." ".request('lname').")";
        $newEvent->save();

        return view('receptionist.patientDetail.patientData.addRecord', ['msg'=>'Success! ', 'long_msg'=>"Added New Patient Record to database"]);
    }

    // Edit User Data View
    function editPatientData($id){
        $hospital_data = Hospital_data::join('patients', 'patients.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($id);
        return view("receptionist.patientDetail.patientData.editRecord", ['hospitalData'=>$hospital_data]);
    }

    // Edit User Data on btn click save to DB
    function editPatientDataSave($id, Request $req){
        $hospitalData = Hospital_data::findOrFail($id);

        $req->validate([
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'specialist' => 'max:100',
            'email_id' => 'required|max:200|email',
            'cnic' => 'required|max:100',
            'phone_number' => 'required|max:30',
            'gender' => 'required|max:10',
            'city' => 'max:100',
            'address' => 'max:500',
            'specialist' => 'max:300',
            'image' => 'mimes:jpeg,png,jpg|max:25',  // image size less than 25KB
        ]);

        // Getting Doctor ID
        $getType = Type::all();
        $patientID = 0;
        foreach($getType as $type){
            if($type->type_name == 'patient' || $type->type_name == 'Patient'){
                $patientID = $type->type_id;
            }
        }
        if($patientID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Patient Type Not Exist...!']);
        }

        //Check for email not in use in hospital data table
        $email_id = request('email_id');    // input box mail
        $cnic_no = request('cnic');    // input box cnic
        $hospital_data = Hospital_data::where('type_id', $patientID)->get();
        forEach($hospital_data as $data){
            // check if updated email does not exist in db with same account type
            if(($hospitalData->email_id != $email_id && $email_id == $data->email_id) || $hospitalData->cnic != $cnic_no && $cnic_no == $data->cnic){
                // email present in db so return error msg
                return view("receptionist.patientDetail.patientData.editRecord", ['hospitalData'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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
        $newEvent->description = "Update Patient (".request('fname')." ".request('lname').")";
        $newEvent->save();

        $hospital_data = Hospital_data::join('patients', 'patients.primary_id', '=', 'hospital_datas.primary_id')->findOrFail($id);
        return view("receptionist.patientDetail.patientData.editRecord", ['hospitalData'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Record Updated...!"]);
    }

    // Patient Vew ENDS ---------------------------------------------


    // Patient Appointment Booking
    function bookAppointment($id){

        // joining 3 tables where clause
        $hospital_data = DB::table('doctors')
            ->join('hospital_datas', 'hospital_datas.primary_id', '=', 'doctors.primary_id')
            ->join('doctor_availability', 'doctor_availability.doctor_id', '=', 'doctors.doctor_id')
            ->select('doctors.specialist','doctors.doctor_id', 'hospital_datas.fname','hospital_datas.lname','hospital_datas.gender','hospital_datas.image', 'doctor_availability.*')
            ->get();

        $patient=Hospital_data::where("primary_id",$id)->get();

        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0 || !$patient){
            return view("receptionist.patientDetail.appointment.bookAppointment", ['dataFetched'=>$hospital_data,'patient'=>$patient[0], 'msg'=>'No Records Found']);
        }else{
            return view("receptionist.patientDetail.appointment.bookAppointment", ['dataFetched'=>$hospital_data,'patient'=>$patient[0]]);
        }

    }


    function saveAppointment(Request $req){
        $req->validate([
            'appointment_date' => 'required|max:100',
            'primary_id' => 'required|max:20',
            'doctor_id' => 'required|max:20'
        ]);

        $dtArray = explode('/', $req->appointment_date);
        $dt = $dtArray[2].'-'.$dtArray[0].'-'.$dtArray[1];

        $patient_data = Patient::where('primary_id',$req->primary_id)->get();
        $doctor_data = Doctor::where('doctor_id',$req->doctor_id)->get();

        if($patient_data->count() && $doctor_data->count()){
            $requestAlreadySent = Appointment_request::where("patient_id",$patient_data[0]->patient_id)
                                    ->where("doctor_id",$doctor_data[0]->doctor_id)
                                    ->where("appointment_date",$dt)->get();

            if( $requestAlreadySent->count() ){
                return redirect('receptionist/patient-view')->with('msg','Appointment Already Booked!');
            }
        }

        if($patient_data->count() > 0){

        $app_req = new Appointment_request;
        $app_req->appointment_date = $dt;
        $app_req->description = $req->description;

        if($doctor_data->count() > 0 ){
            $app_req->doctor_id = $req->doctor_id;
        }else{
            return redirect()->back()->with('msg','Doctor does not exist!');

        }
        $app_req->patient_id = $patient_data[0]->patient_id;
        $app_req->day = strtolower( date('l',strtotime($req->appointment_date)) );

        $doc_availability = Doctor_availability::where("doctor_id",$req->doctor_id)->select($app_req->day."_start as start_time",$app_req->day."_end as end_time")->get();

        if($doc_availability->count() > 0){

            $app_req->start_time = $doc_availability[0]->start_time;
            $app_req->end_time = $doc_availability[0]->end_time;

        }else{
            return redirect()->back()->with('msg','Doctor does not exist!');
        }

        $app_req->confirm = 1;
        $app_req->save();
        // appointments that are sent by patient but not confirmed by receptionist
        // are ADDED as
        // "request pending" status in history

        $app_history  = new Appointment_history;
        $app_history->appointment_date = $app_req->appointment_date;
        $app_history->day = $app_req->day;
        $app_history->patient_id = $app_req->patient_id;
        $app_history->doctor_id = $app_req->doctor_id;
        $app_history->appointment_id = $app_req->appointment_id;
        $app_history->Description = $app_req->Description;
        $app_history->confirm = 1;
        $app_history->start_time = $app_req->start_time;
        $app_history->end_time = $app_req->end_time;
        $app_history->status = "Appointment Booked";
        $app_history->save();



        $doctor_FullData = Hospital_data::findOrFail($doctor_data[0]->doctor_id);
        // Event Update
        $primaryID = session()->get('userID');
        $newEvent = new Past_event;
        $newEvent->event_type = "Added";
        $newEvent->primary_id = $primaryID;
        $newEvent->description = "Requested Appointment of Doctor (".$doctor_FullData->fname." ".$doctor_FullData->lname.")";
        $newEvent->save();

        }else{
            return redirect()->back()->with('msg','Patient does not exist!');
        }



        return redirect("receptionist/patient-view")->with('msg','Appointment Booked!');;
    }

    function patientAppointment(){
        date_default_timezone_set('Asia/Karachi');


        $appointments = Appointment_request::
            join("patients","appointment_requests.patient_id","=","patients.patient_id")
            ->join("hospital_datas as patient_datas","patients.primary_id","=","patient_datas.primary_id")
            ->join("doctors","appointment_requests.doctor_id","=","doctors.doctor_id")
            ->join("hospital_datas as doctor_datas","doctors.primary_id","=","doctor_datas.primary_id")
            ->join("doctor_availability","appointment_requests.doctor_id","=","doctor_availability.doctor_id")
            ->where("appointment_requests.confirm",1)
            ->where(
                function($query){
                    $query->where("appointment_date",'>',date("Y-m-d"))
                    ->orWhere(
                        function($query2){
                            $query2->where("appointment_date",'=',date("Y-m-d"))
                            ->where( strtolower(date('l'))."_end" , '>' , date("H:i:s") );

                        });

                })
            ->select("appointment_requests.*","doctors.specialist",
            "patient_datas.fname as patient_fname","patient_datas.lname as patient_lname",
            "doctor_datas.fname as doctor_fname","doctor_datas.lname as doctor_lname"
            )
            ->get();


            $request_count = Appointment_request::
            join("doctors","appointment_requests.doctor_id","=","doctors.doctor_id")
            ->join("doctor_availability","appointment_requests.doctor_id","=","doctor_availability.doctor_id")
            ->where("appointment_requests.confirm",0)
            ->where(
                function($query){
                    $query->where("appointment_date",'>',date("Y-m-d"))
                    ->orWhere(
                        function($query2){
                            $query2->where("appointment_date",'=',date("Y-m-d"))
                            ->where( strtolower(date('l'))."_end" , '>' , date("H:i:s") );

                        });
                })
            ->get()->count();




        if($appointments->count() == 0){

            return view("receptionist.patientDetail.appointment.viewAppointment",['dataFetched'=>$appointments,'request'=>$request_count, 'msg'=>'No Current Appointments']);

        }else{

            return view("receptionist.patientDetail.appointment.viewAppointment",['dataFetched'=>$appointments,'request'=>$request_count]);
        }


    }

    function delAppointment(Request $req){

        $a = Appointment_request::findOrFail($req->appointment_id);

        // appointments that are cancelled by patient are changed as
        // "cancelled by patient" status in history

        if($a){

            $app_history = Appointment_history::where("appointment_id",$a->appointment_id)
                        ->update(["status"=>"cancelled by receptionist"]);
        }

        Appointment_request::findOrFail($req->appointment_id)->delete();

        return redirect("/receptionist/patient-appointment")->with('msg','Appointment Cancelled!');

    }

    function appointmentRequest(){
        date_default_timezone_set('Asia/Karachi');


        $appointments = Appointment_request::
            join("patients","appointment_requests.patient_id","=","patients.patient_id")
            ->join("hospital_datas as patient_datas","patients.primary_id","=","patient_datas.primary_id")
            ->join("doctors","appointment_requests.doctor_id","=","doctors.doctor_id")
            ->join("hospital_datas as doctor_datas","doctors.primary_id","=","doctor_datas.primary_id")
            ->join("doctor_availability","appointment_requests.doctor_id","=","doctor_availability.doctor_id")
            ->where("appointment_requests.confirm",0)
            ->where(
                function($query){
                    $query->where("appointment_date",'>',date("Y-m-d"))
                    ->orWhere(
                        function($query2){
                            $query2->where("appointment_date",'=',date("Y-m-d"))
                            ->where( strtolower(date('l'))."_end" , '>' , date("H:i:s") );

                        });

                })
            ->select("appointment_requests.*","doctors.specialist",
            "patient_datas.fname as patient_fname","patient_datas.lname as patient_lname",
            "doctor_datas.fname as doctor_fname","doctor_datas.lname as doctor_lname"
            )
            ->get();

        if($appointments->count() == 0){
            return view("receptionist.patientDetail.appointment.appointmentRequest",['dataFetched'=>$appointments, 'msg'=>'No Appointment Requests']);
        }else{
            return view("receptionist.patientDetail.appointment.appointmentRequest",['dataFetched'=>$appointments]);
        }

    }



    function acceptAppointment(Request $req){
        $req->validate([
            'appointment_id' => 'required|max:20'
        ]);

        $app_req = Appointment_request::findOrFail($req->appointment_id);
        $app_req->confirm=1;
        $app_req->save();

        Appointment_history::where("appointment_id",$req->appointment_id)
        ->update(['confirm'=>1,'status' =>"Appointment Booked"]);

        return redirect("/receptionist/patient-appointment")->with('msg','Appointment Booked Successfully!');

    }

    function patientLabTest(){
        $getType = Type::all();
        $patientID = 0;
        foreach($getType as $type){
            if($type->type_name == 'patient' || $type->type_name == 'Patient'){
                $patientID = $type->type_id;
            }
        }
        if($patientID == 0){
            return view("page404", ['msg'=>"Error", 'msg_long'=>' Doctor Type Not Exist...!']);
        }
        // Complete Data of Hospital Table join with patient Table
        $hospital_data = Hospital_data::join('patients', 'patients.primary_id', '=', 'hospital_datas.primary_id')->get(['hospital_datas.*', 'patients.patient_id']);
        $rowsReturn = count($hospital_data);
        if($rowsReturn == 0){
            return view('receptionist.patientDetail.patientLabTest.TestRequest', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('receptionist.patientDetail.patientLabTest.TestRequest', ['dataFetched'=>$hospital_data]);
        }


    }


    function patientTestRequest($id){
        $userData = Hospital_data::findOrFail($id);

        $testTypes = Lab_test_name::pluck('test_type');
        $testTypes = $testTypes->unique();
        $msg = "";

        $tests = Lab_test_name::all();
        $params = Lab_test_parameter::all();

        $labTests = [];
        if($tests->count() > 0){
        foreach($tests as $data){
            $tmp = [];
            foreach($params as $p){
                if($data->test_id == $p->test_id){
                    array_push($tmp,$p);
                }
            }
            array_push($labTests,["test"=>$data,"params"=>$tmp]);
        }

    }else{
        $msg = "No Lab Test Found";
    }

    return view('receptionist.patientDetail.patientLabTest.selectLabTest', ['labTests'=>$labTests,'testTypes'=>$testTypes,'msg'=>$msg,'userData'=>$userData]);
   }



   function testRequestSave(Request $req){
    date_default_timezone_set('Asia/Karachi');
    $req->validate([
        'patient' => 'required|max:20'
    ]);

    $patient = Patient::where("primary_id",$req->patient)->get();
    $tests = "";
    $count=0;


    if($req->tests){
        foreach($req->tests as $test){
            if($count==0){
                $tests= $test;
                $count=1;
            }else{
                $tests= $tests.",".$test;
            }
            
        }
    }

    $testReq = new LabTestRequest;
    $testReq->patient_id = $patient[0]->patient_id;
    $testReq->test_names = $tests;
    $testReq->save();

    return redirect('/receptionist/patient-lab-test')->with('msg',"Request Sent!");
   }


   






}
