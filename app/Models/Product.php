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
        'quantity_sold',
        'status',
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
        'color_id',
    ];

    public function formatPrice()
    {
        return number_format($this->price);
    }

    public function getStatusProduct()
    {
        $status = '';
        if ($this->status === 0) {
            $status = 'Đang bán';
        } else {
            $status = 'Đã ẩn';
        }
        return $status;
    }
}
