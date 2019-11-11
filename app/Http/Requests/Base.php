<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Base extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 确定用户是否有权发出此请求。
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
            'config_name' => 'required|unique:posts|max:255',
            'config_code' => 'required',
        ];
    }

    protected $messages = array(
        'config_name.required' => '配置名称必填',
        'config_name.unique' => '不能重复',
        'config_name.max' => '最大不能超过255',
        'config_code.required' => '配置代码必填',
    );

}
