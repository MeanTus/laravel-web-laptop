<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'phone_number',
        'address',
        'city',
        'country',
        'discount_code',
        'discount_price',
        'payment_method',
        'total_price',
        'status',
        'note',
        'customer_id',
        'admin_id',
    ];
}
