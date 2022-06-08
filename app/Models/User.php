<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'birthdate',
        'role_id',
        'avatar',
        'phone_number',
        'password',
    ];

    public function getGenderUser()
    {
        return $this->attributes['gender'] === 1 ? "Nam" : "Nữ";
    }
}
