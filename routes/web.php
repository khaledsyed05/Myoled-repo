<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminClinicController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\ClinicWorkingTimecontroller;
use App\Http\Controllers\patientController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::resource('admin/clinic', AdminClinicController::class);
Route::resource('admin/department', AdminDepartmentController::class);
Route::resource('admin/doctor', AdminDoctorController::class);
Route::resource('admin/contact', AdminContactController::class);
Route::get('admin', function () {
    return view('admin.admin');
});

//Route::resource('clinic/doctors', ClinicDoctorController::class);
// Route::post('/clinic/doctors', [ClinicDoctorController::class, 'index'])->name('clinicindex');

Route::resource('/clinic/{clinicid}/doctors', ClinicDoctorController::class);

Route::get('clinic', function () {
    return view('clinic.clinic');
});

Route::get('home', [patientController::class, 'index'])->name('home');
Route::get('doctor/{id}', [patientController::class, 'showDr'])->name('showDr');
Route::post('home', [patientController::class, 'store'])->name('storeContactUs');
Route::get('home#contactus')->name('contactsuccess');
Route::get('clinic/login', [ClinicController::class, 'loginPage'])->name('loginPage');

Route::resource('clinic/{clinicid}/workingtime', ClinicWorkingTimecontroller::class);

Auth::routes();

Route::post('user/register', [RegisterController::class]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');