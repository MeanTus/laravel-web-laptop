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
        'desc_block',
        'avatar',
        'phone_number',
        'password',
    ];

    public function getGenderUser()
    {
        return $this->attributes['gender'] === 1 ? "Nam" : "Nữ";
    }

    public function getRoleName()
    {
        $role = '';
        if ($this->role_id == 1) {
            $role = 'Super Admin';
        } elseif ($this->role_id == 2) {
            $role = 'Admin';
        } else {
            $role = 'Customer';
        }

        return $role;
    }

    public function getStatusUser()
    {
        $status = '';
        if ($this->status == 0) {
            $status = 'Active';
        } else {
            $status = 'Block';
        }

        return $status;
    }

    public function formatDate($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
