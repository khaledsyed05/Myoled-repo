<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\clinicWorkingTime;
use Illuminate\Http\Request;

class ClinicWorkingTimecontroller extends Controller
{
    public function index($clinicid){
        $workingtime = clinicWorkingTime::all();

        $data=[
            'workingtime'       =>      $workingtime,
            'clinicid'          =>      $clinicid

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
            'clinicid'      =>          'required'

        ]);

        $clinicworkingtime = clinicWorkingTime::create([
            'clinicid'          =>         $request->clinicid,
            'day'              =>          $request->day,
            'start_time'       =>          $request->start_time,
            'end_time'         =>          $request->end_time,
        ]);
        
        $clinicworkingtime->save();
        return redirect()->route('workingtime.index', 'clinicid');

    }

}
