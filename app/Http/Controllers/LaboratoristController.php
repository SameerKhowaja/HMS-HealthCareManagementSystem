<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoristController extends Controller
{
    function index(){
        return view('laboratorist.index');
    }

    function department(){
        return view('laboratorist.department');
    }

    function viewAppointment(){
        return view('laboratorist.viewAppointment');
    }
}
