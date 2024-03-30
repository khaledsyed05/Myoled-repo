<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function clinics()
    {
        return $this->hasMany(clinic::class);
    }

    public function doctors()
    {
        return $this->hasMany(doctor::class);
    }

    public function departments()
    {
        return $this->hasMany(department::class);
    }
    public function contacts(){
        return $this->hasMany(contact::class);
    }
    public function hashPassword($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
