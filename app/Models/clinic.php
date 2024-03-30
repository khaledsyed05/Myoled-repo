<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class clinic extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'name', 
        'address',
        'contact_number',
        'facebook',
        'instagram',
        'telegram',
        'email',
        'password',
        'is_admin'
    ];

    public function doctors()
    {
        return $this->hasMany(doctor::class);
    }

    public function clinic(){
        return $this->hasOne(clinic::class);
    }

    public function users() 
    {
        return $this->hasMany(user::class);
    }

    public function appointments()
    {
        return $this->hasManyThrough(appointment::class,doctor::class);
    }

    public function departments()
    {
        return $this->hasManyThrough(Department::class,Doctor::class);
    }

    // Get Doctors
    public function getDoctors()
    {
        return $this->doctors;
    }

    // Get Patients
    public function getUses()
    {
        return $this->users; 
    }

    // Get Appointments
    public function getAppointments()
    {
        return $this->appointments;
    }
    

}
