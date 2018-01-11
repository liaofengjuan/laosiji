<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * 判断用户是否有权限使用该类.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'code' => 'required',
        ];
    }

    /**
     * 自定义错误信息提醒
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => '手机号必填',
            'password.required' => '密码必填',
            'code.required' => '验证码必填',
        ];
    }
}
