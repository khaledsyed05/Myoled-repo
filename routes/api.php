<?php

use App\Http\Controllers\Api\clinicApiController;
use App\Http\Controllers\apiAuthenticationController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\taskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::guard('sanctum')->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::apiResource('clinic/doctors', ClinicDoctorController::class);
    Route::get('clinic/doctors', [ClinicDoctorController::class, 'index'])->name('clinicIndex')
    ->middleware('auth:sanctum');
});
Route::apiResource('aclinics', clinicApiController::class);
Route::post('clinic/login',[apiAuthenticationController::class,'login'])->name('clinicLogin');
Route::delete('clinic/logout', [apiAuthenticationController::class, 'logout'])->name('clinicLogout');

