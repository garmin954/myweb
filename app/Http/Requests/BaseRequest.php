<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{

    protected $useRules = [];     // 当前表单验证使用的规则



    // 各种验证规则的错误提示，当你子类里面添加了新的规则这里也需要加上，或者在子类复写该变量
    protected $errorMsg = [
        'required' => '为必填项',
        'min'      => '最小为:min',
        'max'      => '最大为:max',
        'between'  => '长度在:min和:max之间',
        'integer'  => '必须为整数',
        'string'   => '必须为字符串',
        'regex'    => '格式错误',
        'unique'   => '已存在',
        'present'  => '字段值可以为空但是必传',
        'array'    => '必须是数组格式',
        'json'     => '不是有效的json格式',
    ];

    /**
     * messages 返回给前台的错误信息转换成自定义提示，默认提示是英文
     * @return array
     */
    public function messages()
    {
        $array = [];
        foreach ($this->useRules as $key => $value) {
            // 获取单个字段的多个验证规则
            if (!is_array($value))
                $new_arr = explode('|', $value);
            else
                $new_arr = $value;
            foreach ($new_arr as $k => $v) {
                // 获取单个规则的前部分
                $v = current(explode(':', $v));
                // 最终得到每个字段对应的规则返回消息
                $array[$key . '.' . $v] = ':attribute' . $this->errorMsg[$v];
            }
        }
        return $array;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 根据不同的请求, 添加不同的验证规则，将对应的请求的规则和公共的规则合并
        if (static::getPathInfo() == '/api/system/setconfig')
        {
            $this->useRules = array_merge($this->rules['create'], $this->rules['edit']);
        }
        if (static::getPathInfo() == '/api/system/editconfig')
        {
            $this->useRules = array_merge($this->rules['update'], $this->rules['edit']);
        }
        return $this->useRules;
    }

    /**
     * attributes 设置各个字段的中文注解
     * @return array
     * @author   liuml  <liumenglei0211@163.com>
     * @DateTime 2018/9/13  20:34
     */
    public function attributes()
    {
        return [
            '_token'    => '令牌',

        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    //HttpResponseException
    public function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json([
            'code' => 0,
            'msg' => $validator->errors()->first(),
        ], 200)));
    }
}
