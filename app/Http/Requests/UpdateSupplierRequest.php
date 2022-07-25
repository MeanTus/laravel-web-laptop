<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'string',
                'min:2',
                'max:50',
            ],
            'email' => [
                'bail',
                'required',
                'email:rfc,dns',
            ],
            'phone_number' => [
                'bail',
                'required',
                'numeric',
                'min:10',
            ],
            'GST' => [
                'bail',
                'required',
            ],
            'address' => [
                'bail',
                'required',
            ],
            'city' => [
                'bail',
                'required',
            ],
            'country' => [
                'bail',
                'required',
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'min' => ':attribute ít nhất phải có :min ký tự',
            'max' => ':attribute không được nhiều hơn :max ký tự',
            'email' => ':attribute phải hợp lệ',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhà cung cấp',
            'email' => 'Email nhà cung cấp',
            'phone_number' => 'Số điện thoại',
            'gst' => 'GST',
            'address' => 'Địa chỉ',
            'city' => 'Thành phố',
            'country' => 'Quốc Gia',
        ];
    }
}
