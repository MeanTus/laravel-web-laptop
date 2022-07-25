<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'brand_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
            ],
            'avatar' => [
                'image'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'min' => ':attribute ít nhất phải có :min ký tự',
            'max' => ':attribute không được nhiều hơn :max ký tự',
            'string' => ':attribute phải là chữ',
            'image' => ':attribute phải là hình ảnh'
        ];
    }

    public function attributes()
    {
        return [
            'brand_name' => 'Tên danh mục',
            'avatar' => 'Ảnh đại diện'
        ];
    }
}
