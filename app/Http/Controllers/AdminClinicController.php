<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\clinic;
use Illuminate\Http\Request;

class AdminClinicController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(admin $id)
    {
        $admins = admin::find($id);
        $clinics = clinic::all();
        return view('admin.clinicIndex', [
            'clinics' => $clinics,
            'admins'   => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clinicCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'telegram' => 'nullable|url'
        ]);

        $clinic = Clinic::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'telegram' => $request->telegram
        ]);

        return redirect()->route('clinic.index')->with('success', 'Clinic created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clinic = clinic::find($id);
        return view('admin.clinicShow', [
            'clinic' => $clinic
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinic = clinic::find($id);

        $data = [
            'clinic'          =>          $clinic
        ];

        return view("admin.clinicEdit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'telegram' => 'nullable|url'
        ]);
        $clinic= clinic::find($id);

        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->contact_number =  $request->contact_number;
        $clinic->email =  $request->email;
        $clinic->password =  $request->password;
        $clinic->facebook =  $request->facebook;
        $clinic->instagram = $request->instagram;
        $clinic->telegram = $request->telegram;


        if (!$clinic) {
            return redirect()->back()->withErrors(['id' => '=Clinic not found']);
        }

        if ($request->has('password')) {
            $validated['password'] = bcrypt($request->password);
        }


        $clinic->save();


        // if (!$clinic->save()) {

        //     return back()->withErrors([
        //         'error' => 'Error updating clinic'
        //     ]);
        

        return redirect()->route('clinic.index')->with('success', 'clinic updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clinic = clinic::find($id);
        $clinic->delete();
        return redirect()->back()->with("success", "Deleted  Successfully");
    }
}
