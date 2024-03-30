<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookedAppointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id', 
        'user_id',
        'doctor_id', 
        'clinic_id'
    ];

    public function appointment()
    {
        return $this->belongsTo(appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class); 
    }

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function clinic()
    {
        return $this->belongsTo(clinic::class);
    }

    public $timestamps = true;
}
