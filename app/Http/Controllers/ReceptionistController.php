<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Hospital_data;
use App\Appointment_request;
use App\Room;
use App\Bed;

class ReceptionistController extends Controller
{
    function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::findOrFail($primary_ID);
        $appointmentTable = Appointment_request::all();
        $totalAppointment = count($appointmentTable);   // total appointments count
        $requestedAppointment = Appointment_request::where('confrim', '0')->count();   //requested appointments count
        $approvedAppointment = $totalAppointment - $requestedAppointment;   // approved appointment count
        return view('receptionist.index', ['userData'=>$userData, 'totalAppointment'=>$totalAppointment, 'requestedAppointment'=>$requestedAppointment, 'approvedAppointment'=>$approvedAppointment]);
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

    // Delete Room on click
    function deleteBed($id){
        return 1;
        $data = Bed::findOrFail($id);
        $data->delete();
        return redirect("receptionist/room-bed/")->with('msg','success');
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
            return redirect("/receptionist/room-bed/")->with('msg','success');
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
            return redirect("/receptionist/room-bed/")->with('msg','success');
        }
    }

    function deleteRoom($id){
        $rooms = Room::with('bed')->where('room_number', '=', $id)->firstOrFail();
        $rooms->delete();
        return redirect("/receptionist/room-bed/")->with('msg','success');
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

        return redirect("/receptionist/room-bed/");
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

        return redirect("/receptionist/room-bed/");
    }

    //  Room Bed Management ENDS ------------------------------------------

}
