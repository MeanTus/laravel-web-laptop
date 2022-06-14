<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'quantity',
        'price',
        'desc',
        'avatar',
        'pin',
        'weight',
        'ram_id',
        'cpu_id',
        'gpu_id',
        'category_id',
        'brand_id',
        'supplier_id',
    ];
}
