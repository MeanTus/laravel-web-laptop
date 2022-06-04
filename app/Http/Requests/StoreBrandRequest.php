<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
                'unique:App\Models\Brand,brand_name',
                'min:2',
                'max:50',
            ],
            'avatar' => [
                'required',
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
            'unique' => ':attribute đã tồn tại',
            'string' => ':attribute phải là chữ',
            'image' => ':attribute không hợp lệ'
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => 'Tên danh mục',
            'image' => 'Hình ảnh'
        ];
    }
}
