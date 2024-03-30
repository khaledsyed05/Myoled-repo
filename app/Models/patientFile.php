<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id', 
        'disease',
        'status',
        'file'
    ];

    public function appointment() 
    {
        return $this->belongsTo(Appointment::class);
    }

    public $timestamps = true;
}
