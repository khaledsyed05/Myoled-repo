<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequset;
use App\Models\clinic;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class apiAuthenticationController extends Controller
{

    public function login(LoginRequset $request)
    {
        $request->validate([
            'email'    =>  'required',
            'password' =>   'required'
        ]);
        $clinic = clinic::where('email', '=', $request->email)->first();
        if (!$clinic || !Hash::check($request->password, $clinic->password)) {
            throw ValidationException::withMessages([
                'message'     =>      ['Wrong email or password']
            ]);
        }
        $accessToken = $clinic->createToken('Api token')->plainTextToken;

       


        // Handle the response as needed

        return response([
            'isSuccess' => true,
            'token' => $accessToken,
        ]);

    }

    public function logout(Request $request, clinic $clinic)
    {
        $request->clinic()->currentAccessToken()->delete();

        return response([
            'authenticate' =>  true,
            'isSuccess' => true,
            'message' => 'Logged out successfully.',
        ], 200);
    }
}
