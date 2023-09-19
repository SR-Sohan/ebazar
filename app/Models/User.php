<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable =[
        "name",
        "email",
        "role",
        "password",
        "otp"
    ];

    protected $attributes =[
        "role" => 'user'
    ];

    public function userprofile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
