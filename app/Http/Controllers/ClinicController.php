<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function loginPage(){
        return view('clinic.login');
    }
}
