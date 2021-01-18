<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    function index(){
        return view('receptionist.index');
    }

    function doctor(){
        return view('receptionist.doctor');
    }

    function patient(){
        return view('receptionist.patient');
    }

    function laboratorist(){
        return view('receptionist.laboratorist');
    }


    function viewAppointment(){
        return view('receptionist.viewAppointment');
    }
}
