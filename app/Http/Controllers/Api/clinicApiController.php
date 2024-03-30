<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\clinic;
use App\Models\doctor;
use Illuminate\Http\Request;

class clinicApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            'isSuccess'     =>      true,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, clinic $clinic,doctor $id)
    {
        $request->validate([
            'doctor_id' =>  'required'
        ]);
        $doctor = doctor::find($id);
        $doctor->clinic_id;
        $doctor->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
