<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\department;
use App\Models\doctor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class patientController extends Controller
{
    public function index()
    {
        $doctors = doctor::all();
        $departments = department::all();
        $data = [
            'doctors'            =>      $doctors,
            'departments'       =>      $departments
        ];
        return view('patient.Home', $data);
    }
    public function showDr($id)
    {
        $doctor = doctor::find($id);
        $data = [
            'doctor'        =>      $doctor
        ];
        return view('patient.doctor', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>      'required',
            'email'     =>      'required|email',
            'message'   =>      'required'
        ]);
        $contact = contact::create([
            'name'      =>      $request->name,
            'email'     =>      $request->email,
            'message'   =>      $request->message
        ]);
        $contact->save();
        if (!$contact->save()) {
            return redirect()->route('home')->with('error', 'error');
        }
        return redirect()->route('contactsuccess')->with('thanks', 'thank you for contacting us');
    }
}
