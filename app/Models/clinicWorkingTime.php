<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clinicWorkingTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'strat_time',
        'end_time'
    ];

    public function time()
    {
        return $this->belongsTo(workingTime::class);
    }

    public $timestamps = true;
}
