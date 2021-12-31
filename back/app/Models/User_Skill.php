<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Skill extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasMany(User::class);
    }

    public function skill(){
        return $this->hasMany(Skill::class);
    }
}