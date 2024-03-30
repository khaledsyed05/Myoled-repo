<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\doctor;
use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    public function index()
    {
        return view('Admin.doctorIndex', [
            'doctors' => doctor::all()
        ]);
    }
    public function create()
    {
        $departments = department::all();
        $data = [
            'departments'   =>      $departments
        ];
        return view('admin.doctorCreate', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:6',
            'profile_picture' => 'required',
            'department_id' => 'required|exists:departments,id'
        ]);
        $fileName = uniqid('DrProf_') . '.' . $request->file('profile_picture')->getClientOriginalExtension();
        try {
            $doctor = doctor::create([
                'name'          =>      $request->name,
                'email'         =>      $request->email,
                'password'      =>      bcrypt($request->password),
                'department_id' =>      $request->department_id,
                'profile_picture' =>     $fileName
            ]);
            $request->file('profile_picture')->move(public_path('DrProf-images'), $fileName);
            $doctor->profile_picture = $fileName;
            $doctor->save();
            return redirect()->route('doctor.index')->with('success', 'Doctor Added');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(
                [
                    'massage'   =>  $e->getMessage()
                ]
            );
        }
    }
    public function show(doctor $doctor)
    {
        return view('admin.doctorShow', [
            'doctor'    =>  $doctor
        ]);
    }

    public function edit($id)
    {
        $doctor = doctor::find($id);
        $departments = department::all();
        $data = [
            'doctor'             =>      $doctor,
            'departments'        =>      $departments
        ];
        return view('admin.doctorEdit', $data);
    }

    public function update(Request $request, $id)
    {
        $doctor = doctor::find($id);

        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:6',
            'department_id' => 'required|exists:departments,id'
        ]);

        $doctor->name = $request->name;
        $doctor->password = $request->password;
        $doctor->department_id = $request->department_id;
        $doctor->update();
        if ($request->email == $doctor->email) {
            unset($request->email);
        }
        if ($request->hasFile('profile_picture')) {

            if ($doctor->profile_picture && file_exists(public_path("DrProf-images/{$doctor->profile_picture}"))) {
                unlink(public_path("DrProf-images/{$doctor->profile_picture}"));
            }

            $newFileName = uniqid('DrProf_') . '.' . $request->file('profile_picture')->getClientOriginalExtension();

            $request->file('profile_picture')->move(public_path('DrProf-images'), $newFileName);

            $doctor->profile_picture = $newFileName;
        }

        if (!$doctor->save()) {

            return back()->withErrors([
                'error' => 'Error updating doctor'
            ]);
        };

        return redirect()->route('doctor.index')
            ->with('success', 'doctor updated');
    }
    public function destroy($id)
    {
        $doctor = doctor::find($id);
        if (file_exists(public_path("DrProf-images/{$doctor->profile_picture}"))) {
            unlink(public_path("DrProf-images/{$doctor->profile_picture}"));
        }
        $doctor->Delete();
        return redirect()->route('doctor.index')->with('success', 'Doctor Deleted');
    }
}
