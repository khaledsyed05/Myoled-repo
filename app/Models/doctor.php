<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class doctor extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'department_id'

    ];

    public function department()
    {
        return $this->belongsTo(department::class);
    }

    public function clinic()
    {
        return $this->belongsTo(clinic::class);
    }

    public function users()
    {
        return $this->belongsToMany(user::class);
    }

    public function appointments()
    {
        return $this->hasMany(appointment::class);
    }

    public function hashPassword($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
