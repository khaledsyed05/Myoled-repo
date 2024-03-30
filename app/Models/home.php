<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\department;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;
    public function departments()
    {
        return $this->hasMany(department::class);
    }
    public function doctors()
    {
        return $this->hasMany(doctor::class);
    }
    public function clinics(){
        return $this->belongsTo(clinic::class);
    }
    

}
