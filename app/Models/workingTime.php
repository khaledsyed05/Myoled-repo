<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workingTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'working_day_id', 
        'start_time', 
        'end_time'
    ];

    public function day()
    {
        return $this->belongsTo(workingDay::class);
    }

    public $timestamps = true;
}
