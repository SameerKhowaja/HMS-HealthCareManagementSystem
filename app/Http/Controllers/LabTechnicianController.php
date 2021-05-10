<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Hospital_data;
use App\Past_event;
use App\Type;
use App\Lab_test_name;
use App\Lab_test_parameter;
use App\Lab_test_report;
use App\Lab_report_params;
use App\Lab_technician;
use App\LabTestRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LabTechnicianController extends Controller
{
    

    function index(){
        $primary_ID = session("userID");
        $userData = Hospital_data::findOrFail($primary_ID);
        return view('labtechnician.index', ['userData'=>$userData]);
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
        return view('labtechnician.editProfile', ['hospital_data'=>$hospital_data]);
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
                return view("labtechnician.editProfile", ['hospital_data'=>$hospitalData, 'msg'=>'Error! ', 'long_msg'=>"Email/CNIC Already Exists...!"]);
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

        return view('labtechnician.editProfile', ['hospital_data'=>$hospitalData, 'msg'=>'Success! ', 'long_msg'=>" Profile Updated...!"]);
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
            return view('labtechnician.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>"Error!", 'long_msg'=>' Invalid Old Password...!']);
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
            return view('labtechnician.editProfile', ['hospital_data'=>$hospital_data, 'msg'=>'Success! ', 'long_msg'=>"Password Updated...!"]);
        }

        return view("page404", ['msg'=>"Error", 'msg_long'=>' Something got wrong...!']);
    }


    function viewLabTest(){
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
        $msg = "No Record Found";
    }
        return view('labtechnician.labTest',compact('labTests','testTypes','msg'));
    }


    function searchTest(Request $req){
        $testTypes = Lab_test_name::pluck('test_type');
        $testTypes = $testTypes->unique();
        $tests = NULL;
        if(request('testSection') == "All Lab Tests"){
            $tests = Lab_test_name::all();
        }else{
            $tests = Lab_test_name::where('test_type',request('testSection'))->get();
        }

        $msg = '';
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
            $msg="No Lab Test Found";

        }
        return view('labtechnician.labTest', ['labTests'=>$labTests,'testTypes'=>$testTypes,'msg'=>$msg]);
    }


    // viewing Patients of hospital with treatment link
    function viewPatients(){

        $PatientType = Type::where("type_name","Patient")->get();
        // Complete Data of Hospital Table join with Types Table
        $hospital_data = Hospital_data::join('types', 'types.type_id', '=', 'hospital_datas.type_id')
        ->where("hospital_datas.type_id",$PatientType[0]->type_id)
        ->get(['hospital_datas.*', 'types.type_name']);

        $rowsReturn = count($hospital_data);

        if($rowsReturn == 0){
            return view('labtechnician.viewPatients', ['dataFetched'=>$hospital_data, 'msg'=>'No Records Found']);
        }else{
            return view('labtechnician.viewPatients', ['dataFetched'=>$hospital_data]);
        }
    }

    function selectLabTest($id){

        $userData = Hospital_data::findOrFail($id);

        $testTypes = Lab_test_name::pluck('test_type');
        $testTypes = $testTypes->unique();
        $msg = "";

        $labTests = Lab_test_name::with(['lab_test_parameters'])->get();

        if($labTests->count() == 0){
            $msg = "No Lab Test Found";
        }

        return view('labtechnician.selectLabTest',['labTests'=>$labTests,'testTypes'=>$testTypes,'msg'=>$msg,'userData'=>$userData,'testRequest'=>NULL]);
    }

    // searchTest view after in select test view
    function searchTest_inSelectView(Request $req){


        $userData = Hospital_data::findOrFail($req->primary_id);

        $testTypes = Lab_test_name::pluck('test_type');
        $testTypes = $testTypes->unique();
        $tests = NULL;
        if(request('testSection') == "All Lab Tests"){
            $tests = Lab_test_name::all();
        }else{
            $tests = Lab_test_name::where('test_type',request('testSection'))->get();
        }

        $msg = '';
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
            $msg="No Lab Test Found";

        }
        return view('labtechnician.selectLabTest', ['labTests'=>$labTests,'testTypes'=>$testTypes,'msg'=>$msg,'userData'=>$userData]);
    }


    function addTestReport(Request $req,$id){

        $req->validate([
            "test_id" => 'required|max:20'
        ]);

        $patientData = Hospital_data::findOrFail($id);

        $labTest = Lab_test_name::where('test_id',$req->test_id)->with('lab_test_parameters')->get();

        if($labTest->count() ==0){
            return redirect()->back()->with('msg','Lab Test Does Not Exist!');
        }
        elseif(! $patientData){
            return redirect()->back()->with('msg','Patient Does Not Exist!');
        }
        // dd($labTest);

        if($req->test_req_id){
            $request = LabTestRequest::find($req->test_req_id);
            return view('labtechnician.addTestReport',['labTest'=>$labTest,'patientData'=>$patientData,'testRequest'=>$request]);
        }else{
            return view('labtechnician.addTestReport',['labTest'=>$labTest,'patientData'=>$patientData,'testRequest'=>NULL]);
        }

    }


    function saveTestReport(Request $req){
        date_default_timezone_set('Asia/Karachi');

        $req->validate([
            "test_id" => 'required|max:20',
            "patient_primary_id" => 'required|max:20',
            "labTechnician_primary_id" => 'required|max:20',
            "result"=>'required|max:1000',
            "params"=>'required'
        ]);


        $patient_id = Patient::where('primary_id',$req->patient_primary_id)->get();

        if( $patient_id->count() == 0){
            return redirect()->back()->with("msg","Patient does ot exist!");
        }

        $patient_id  = $patient_id[0]->patient_id;

        $technician_id = Lab_technician::where('primary_id',$req->labTechnician_primary_id)->get();
        
        if( $technician_id->count() == 0){
            return redirect()->back()->with("msg","Lab Technician does not exist!");
        }
        
        $technician_id = $technician_id[0]->technician_id;


        $add_report = new Lab_test_report;
        $add_report->test_id = $req->test_id;
        $add_report->patient_id = $patient_id;
        $add_report->technician_id = $technician_id;
        $add_report->result = $req->result;
        $add_report->comment = $req->comment;
        $add_report->save();

        $param_keys = array_keys( $req->params );

        for($i=0; $i< count($param_keys);$i++){
            $param_val = new Lab_report_params;
            $param_val->param_id = $param_keys[$i];
            $param_val->param_value = $req->params[ $param_keys[$i] ];
            $param_val->report_id  =  $add_report->report_id;
            $param_val->save();
        }

        if($req->test_req_id){
            $test_detail = Lab_test_name::find($req->test_id);
            $testReq = LabTestRequest::find($req->test_req_id);
            if( $testReq->test_performed==NULL ){
                $testReq->test_performed = [ $test_detail->test_name ];
            }else{
                $tmp = $testReq->test_performed;
                array_push($tmp,$test_detail->test_name);
                $testReq->test_performed = $tmp;
            }
            $testReq->save();

            if( count( $testReq->test_names ) == count( $testReq->test_performed) ){
                LabTestRequest::find($req->test_req_id)->delete();
                // return redirect('/labtechnician/test-request');
            }else{

                return redirect('/labtechnician/lab-test/printTestReport/'.$add_report->report_id)
                ->with("patient_primary_id",$req->patient_primary_id)
                ->with('test_req_id',$testReq->test_req_id)
                ->with("test_name",$test_detail->test_name)
                ->with("msg","Report Created Successfuly");

            }

        }

        return redirect('/labtechnician/lab-test/printTestReport/'.$add_report->report_id);
    }


    function printTestReport($id){

        $report = Lab_test_report::where('report_id',$id)
        ->with(['lab_technician','lab_technician.hospital_data',
        'patient','patient.hospital_data','lab_report_params',
        'lab_report_params.lab_test_parameter','lab_test_name'])
        ->get();

        // dd($report);

        return view('labtechnician.printTestReport',['report'=>$report]);
    }


    function backToRemainingTest(Request $req){
        $req->validate([
            "patient_primary_id" => 'required|max:20',
            'test_req_id'=> 'required|max:20'
        ]);

        $testReq = LabTestRequest::find($req->test_req_id);

        $selfMadeRequest = new Request();
        $selfMadeRequest->request->add(["test_name" => $testReq->test_names,"primary_id" => $req->patient_primary_id,'test_req_id'=> $req->test_req_id,"msg"=>"Report Created Successfuly"]);
        $selfMadeRequest->setMethod("POST");
        return $this->requestedLabTest($selfMadeRequest);


    }


    function viewTestRequest(){

        $testRequest = LabTestRequest::with(['patient','patient.hospital_data'])
        ->orderBy('created_at','desc')
        ->get();


        return view('labtechnician.labTestRequest',['testRequest'=>$testRequest]);

    }


    function requestedLabTest(Request $req){
        $req->validate([
            "primary_id" => 'required|max:20',
            'test_req_id'=> 'required|max:20'
        ]);

        $requestedTest;

        $request = LabTestRequest::find($req->test_req_id);


        $patient_data = Hospital_data::findOrFail($req->primary_id);
        // if no test is perform than all the requested tests will be retrieved
        if($request->test_performed == NULL){
            $requestedTest = Lab_test_name::whereIn('test_name',$request->test_names)
            ->with(['lab_test_parameters'])
            ->get();

        }elseif( $request->test_performed != NuLL){
            // if any test is performed already then it is not retrieved remaining test will be shown
            $requestedTest = Lab_test_name::whereIn('test_name',$request->test_names)
            ->whereNotIn('test_name',$request->test_performed)
            ->with(['lab_test_parameters'])
            ->get();
        }
        
        return view('labtechnician.selectLabTest',['labTests'=>$requestedTest ,'testTypes'=>NULL,'userData'=>$patient_data,'testRequest'=>$request]);

    }





}
