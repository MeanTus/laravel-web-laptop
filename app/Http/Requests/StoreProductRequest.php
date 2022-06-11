<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                'unique:App\Models\Product,name',
                'min:2',
                'max:50',
            ],
            'unit' => [
                'bail',
                'required',
                'string',
                'min:2',
                'max:10',
            ],
            'quantity' => [
                'bail',
                'required',
                'numeric'
            ],
            'price' => [
                'bail',
                'required',
                'numeric',
            ],
            'desc' => [
                'bail',
                'required',
            ],
            'avatar' => [
                'bail',
                'required',
                'image',
            ],
            'category_id' => [
                'bail',
                'required',
            ],
            'brand_id' => [
                'bail',
                'required',
            ],
            'supplier_id' => [
                'bail',
                'required',
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
            'email' => ':attribute phải hợp lệ',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'unit' => 'Đơn vị',
            'quantity' => 'Số lượng',
            'price' => 'Giá sản phẩm',
            'desc' => 'Mô tả',
            'avatar' => 'Ảnh đại diện',
            'category_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'supplier_id' => 'Nhà cung cấp',
        ];
    }
}
