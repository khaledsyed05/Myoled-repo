<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicWorkingTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'clinic_id',
        'day',
        'strat_time',
        'end_time'
    ];
    
}
