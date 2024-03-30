<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'profile_picture',
        'contact_number'
    ];

    public function appointments()
    {
        return $this->hasMany(appointment::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(doctor::class);
    }
}
