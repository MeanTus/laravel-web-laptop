<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                'min:0',
                'numeric'
            ],
            'price' => [
                'bail',
                'required',
                'min:0',
                'numeric',
            ],
            'desc' => [
                'bail',
                'required',
            ],
            'avatar' => [
                'bail',
                'image',
            ],
            'pin' => [
                'bail',
                'required',
            ],
            'weight' => [
                'bail',
                'numeric',
                'min:0',
                'required'
            ],
            'ram_id' => [
                'bail',
                'required',
            ],
            'gpu_id' => [
                'bail',
                'required',
            ],
            'cpu_id' => [
                'bail',
                'required',
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
            'min' => ':attribute phải lớn hơn :min',
            'max' => ':attribute không được nhiều hơn :max ký tự',
            'email' => ':attribute phải hợp lệ',
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
            'pin' => 'Pin',
            'weight' => 'Trọng lượng',
            'ram_id' => 'Ram',
            'cpu_id' => 'CPU',
            'gpu_id' => 'GPU',
            'category_id' => 'Danh mục',
            'brand_id' => 'Thương hiệu',
            'supplier_id' => 'Nhà cung cấp',
        ];
    }
}
