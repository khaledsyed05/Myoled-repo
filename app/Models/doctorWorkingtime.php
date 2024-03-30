<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorWorkingtime extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_working_day_id',
        'working_time_id'
    ];

    public function day()
    {
        return $this->belongsTo(doctorWorkingDay::class);
    }

    public function time()
    {
        return $this->belongsTo(workingTime::class);
    }

    public $timestamps = true;
}
