<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'email',
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

    public function getStatusOrder()
    {
        $status = '';
        if ($this->status == 0) {
            $status = 'Chờ duyệt';
        } elseif ($this->status == 1) {
            $status = 'Đã duyệt';
        } elseif ($this->status == 2) {
            $status = 'Bị hủy bởi người dùng';
        } else {
            $status = 'Đã thanh toán bằng VN Pay';
        }

        return $status;
    }
}
