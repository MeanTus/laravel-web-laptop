<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
                'unique:App\Models\Supplier,name',
                'min:2',
                'max:50',
            ],
            'email' => [
                'bail',
                'required',
                'email:rfc,dns',
                'unique:App\Models\Supplier,email',
            ],
            'phone_number' => [
                'bail',
                'required',
                'min:10',
                'max:13'
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
            'unique' => ':attribute đã tồn tại'
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
