<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workingDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_name'
    ];

    public function times()
    {
        return $this->hasMany(workingTime::class);
    }

    public $timestamps = true;
}
