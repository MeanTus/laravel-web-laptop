<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = 'statistical';
    protected $fillable = [
        'order_date',
        'sales',
        'profit',
        'quantity',
        'total_order',
    ];
}
