<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConfigRequest extends BaseRequest
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
            'config_name' => 'required|unique:config|max:255',
            'config_code' => 'required|unique:config',
        ],
        // 更新表单需要验证的字段
        'update' => [
            'config_name' => 'required|max:255',
            'config_code' => 'required',
        ],
        // 不管是创建还是更新都要验证的字段
        'edit'   => [
//            '_token'  => 'required|string',
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
            '_token'   => '令牌',
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
        if (static::getMethod() !== 'GET'){

            if (static::getPathInfo() == '/admin/config/create')
            {
                $this->useRules = array_merge($this->rules['create'], $this->rules['edit']);
                if (intval($this->request->get('config_id')) > 0){
                    $this->useRules = array_merge($this->rules['update'], $this->rules['edit']);
                }
            }
            return $this->useRules;
        } else{
            return [];
        }
    }





}
