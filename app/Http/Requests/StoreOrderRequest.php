<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => [
                'bail',
                'required',
                'string',
                'min:2',
                'max:50',
            ],
            'customer_id' => [
                'bail',
                'required',
            ],
            'phone_number' => [
                'bail',
                'required',
                'numeric'
            ],
            'address' => [
                'bail',
                'required',
                'string',
                'min:5',
                'max:80',
            ],
            'city' => [
                'bail',
                'required',
                'string',
                'min:5',
                'max:80',
            ],
            'country' => [
                'bail',
                'required',
                'string',
                'min:5',
                'max:80',
            ],
            'payment_method' => [
                'bail',
                'required',
            ],
            'total_price' => [
                'bail',
                'required',
            ],
            'email' => [
                'bail',
                'required',
            ],
            'note' => [
                'bail'
            ],
            'discount_code' => [
                'bail'
            ],
            'discount_price' => [
                'bail'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute phải là ký tự',
            'min' => ':attribute ít nhất phải có :min ký tự',
            'max' => ':attribute không được nhiều hơn :max ký tự',
            'numeric' => ':attribute phải là số',
        ];
    }

    public function attributes()
    {
        return [
            'customer_name' => 'Tên khách hàng',
            'phone_number' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'city' => 'Thành phố',
            'country' => 'Quốc gia',
            'discount_code' => 'Mã giảm giá',
            'discount_price' => 'Giá giảm',
            'payment_method' => 'Phương thức thanh toán',
            'total_price' => 'Tổng tiền',
        ];
    }
}
