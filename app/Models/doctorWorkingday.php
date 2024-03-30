<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorWorkingday extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id', 
        'working_day_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }

    public function day()
    {
        return $this->belongsTo(workingDay::class);
    }

    public function times()
    {
        return $this->hasMany(doctorWorkingTime::class);
    }

    public $timestamps = true;
}
