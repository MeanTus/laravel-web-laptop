<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_rate',
        'feature',
        'quantity',
        'status',
        'desc_coupon',
    ];

    public function getStatusCoupon()
    {
        $status = '';
        if ($this->status == 0) {
            $status = 'Chưa áp dụng';
        }
        if ($this->status == 1) {
            $status = 'Đang áp dụng';
        }

        return $status;
    }

    public function getFeatureCoupon()
    {
        $feature = '';
        if ($this->feature == 0) {
            $feature = 'Giảm theo phần trăm';
        }
        if ($this->feature == 1) {
            $feature = 'Giảm tiền';
        }

        return $feature;
    }
}
