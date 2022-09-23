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
        switch ($this->path()) {
            case 'api/users/signup':
                return [
                    'phone' => 'required|phone:CN,mobile|unique:users',
                    'password' => 'required|alpha_dash|min:6',
                    'sms_code' => 'required|string',
                ];
                break;
            case 'api/users/login':
                return [
                    'phone' => 'required|phone:CN,mobile',
                    'password' => 'required|alpha_dash|min:6',
                ];
                break;
            case 'api/user/update':
                return [
                    'name' => 'between:2,25',
                    'avatar' => 'url',
                ];
                break;
        }
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
            'name' => '姓名',
            'avatar' => '头像',
        ];
    }
}
