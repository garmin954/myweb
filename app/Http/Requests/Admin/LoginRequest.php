<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends BaseRequest
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
     * @var array 定义验证规则
     */
    private $rules = [
        // 这里代表创建表单需要验证的字段
        'create' => [
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],

    ];

    /**
     * attributes 设置各个字段的中文注解
     * @return array
     * @author   liuml  <liumenglei0211@163.com>
     * @DateTime 2018/9/13  20:34
     */
    public function attributes()
    {
        return [
            'username' => '账号',
            'password' => '密码',
            'captcha' => '验证码',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 根据不同的请求, 添加不同的验证规则，将对应的请求的规则和公共的规则合并
        if (static::getMethod() == 'POST'){
            return $this->rules['create'];
        } else{
            return [];
        }
    }

}
