<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Token extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'token_reset_pass';
    protected $fillable = [
        'reset_token',
        'email',
        'user_id'
    ];
}
