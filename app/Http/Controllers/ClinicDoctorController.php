<?php

namespace App\Http\Controllers;

use App\Models\clinic;
use App\Models\clinicWorkingday;
use App\Models\clinicWorkingTime;
use App\Models\doctor;
use App\Models\workingDay;
use App\Models\workingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicDoctorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index($clinicid)
    {
        // $clinicId = Auth::user()->clinic;

        // $clinic = clinic::findOrFail($clinicId);
        // $doctors = $clinic->doctors;

        // return response()->json($doctors);;
        $doctors = doctor::all();
        $clinic = clinic::all();
        $data = [
            'doctors'   =>      $doctors,
            'clinicid'    =>      $clinicid,
            'clinic'        =>      $clinic
        ];
        return view('clinic.doctorsIndex', $data);
    }
    public function create(Request $request, clinic $clinic, $clinicid)
    {
        // $request->validate([
        //     'doctor_id' => 'required'
        // ]);

        // $doctor = Doctor::find($request->doctor_id);

        // $clinic->doctors()->attach($doctor);


        // return redirect()->back()->with('success', 'Doctor attached to clinic');
        $doctors = doctor::all();
        $clinics = clinic::all();
        $data = [
            'doctors'    =>      $doctors,
            'clinics'    =>      $clinics,
            'clinicid'    =>      $clinicid,

        ];
        return view('clinic.doctorAttach', $data);
    }
    public function store(Request $request, $clinicid)
    {
        $request->validate([
            'doctor' => 'required',
            'clinicid' => 'required'
        ]);

        $doctorid = $request->doctor;

        $doctor = doctor::find($doctorid);
        $doctor->clinic_id = $clinicid; // Assign the clinic ID from the request to the doctor's clinic_id property

        $doctor->save();
        return redirect()->route('doctors.index', ['clinicid' => $clinicid])->with('success', 'Added To Clinic');
    }
    public function destroy($clinicid, Request $request)
    {
        $doctorid = $request->doctor;

        $doctor = doctor::find($doctorid);
        $doctor->clinic_id = $clinicid;
        $doctor->clinic_id = null;
        $doctor->save();

        return redirect()->route('doctors.index', ['clinicid' => $clinicid, 'doctor' => $doctorid])->with('success', 'Clinic ID removed successfully');
    }
    // public function addWorkingDay(Request $request, clinic $clinic)
    // {
    //     $request->validate([
    //         'workingDay_id'     => 'required'
    //     ]);
    //     $workingDay = workingDay::find($request->workingDay_id);

    //     $clinic->days()->attach($workingDay);

    //     return redirect()->back()->with('success', 'Working Day Added');
    // }

    // public function addWorkingTime(Request $request, clinic $clinic, clinicWorkingTime $day)
    // {

    //     $request->validate([
    //         'workingTime_id' => 'required'
    //     ]);

    //     $time = workingTime::find($request->workingTime_id);

    //     $clinicDay = $clinic->days()
    //         ->where('id', $day->id)
    //         ->first();

    //     $clinicDay->times()->attach($time);

    //     return redirect()->back()->with('success', 'Working Time Added');
    // }
    // public function showBookedAppointments(clinic $clinic)
    // {

    //     $appointments = $clinic->bookedAppointments()
    //         ->with(['appointment', 'user', 'doctor'])
    //         ->get();

    //     return view('clinic.bookedAppointments', [
    //         'clinic' => $clinic,
    //         'appointments' => $appointments
    //     ]);
    // }
}
