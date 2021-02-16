<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    // Error Page
    function index(){
        return view('page404');
    }
}
