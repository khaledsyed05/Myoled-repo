<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'message'
    ];
    public function contact(){
        return $this->belongsTo(admin::class);
    }
}
