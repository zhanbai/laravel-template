<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|phone:CN,mobile|unique:users',
            'password' => 'required|alpha_dash|min:6',
            'sms_code' => 'required|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'phone' => '手机号',
            'password' => '密码',
            'sms_code' => '验证码',
        ];
    }
}
