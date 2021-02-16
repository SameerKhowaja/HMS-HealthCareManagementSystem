<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabTechnicianController extends Controller
{
    function index(){
        return view('labtechnician.index');
    }
}
