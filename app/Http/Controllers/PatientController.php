<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    function index(){
        return view('patient.index');
    }

    function doctor(){
        return view('patient.doctor');
    }

    function patient(){
        return view('patient.patient');
    }

    function receptionist(){
        return view('patient.receptionist');
    }

    function viewAppointment(){
        return view('patient.viewAppointment');
    }
}
