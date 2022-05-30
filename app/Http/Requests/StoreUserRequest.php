<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
                'unique:App\Models\User,email',
            ],
            'gender' => [
                'bail',
                'required',
                'boolean'
            ],
            'birthdate' => [
                'bail',
                'required',
                'before:today'
            ],
            'password' => [
                'bail',
                'required',
                'min:8'
            ]
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute bắt buộc phải điền',
            'min' => ':attribute ít nhất phải có :min ký tự',
            'max' => ':attribute không được nhiều hơn :max ký tự',
            'email' => ':attribute phải hợp lệ',
            'before' => ':attribute phải hợp lệ',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
{
    return [
        'name' => 'Họ và Tên',
        'email' => 'Địa chỉ email',
        'gender' => 'Giới tính',
        'birthdate' => 'Ngày sinh',
        'password' => 'Mật khẩu',
    ];
}
}
