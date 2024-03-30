<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\clinicWorkingTime;
use Illuminate\Http\Request;

class ClinicWorkingTimecontroller extends Controller
{
    public function index(){
        $workingtime = clinicWorkingTime::all();

        $data=[
            'workingtime'       =>      $workingtime
        ];
        return view('clinic.clinicWorkingtimeIndex', $data);
    }
    public function create(){
        $clinicid = clinic::all();
        $data = [
            'clinicid'  =>  $clinicid
        ];

        return view('clinic.clinicWorkingtimeEdit', $data);

    }
    public function store(Request $request){
        $request->validate([
            'day'            =>          'required',
            'start_time'     =>          'required',
            'end_time'       =>          'required',
            'clinic_id'      =>          'required'

        ]);

        $clinicworkingtime = clinicWorkingTime::create([

            'day'              =>          $request->day,
            'start_time'       =>          $request->start_time,
            'end_time'         =>          $request->end_time,
        ]);
        
        $clinicworkingtime->save();

    }

}
