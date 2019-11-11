<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

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
            'config_name' => 'required|unique:posts|max:255',
            'config_code' => 'required',
        ],
        // 更新表单需要验证的字段
        'update' => [
            'testUpdate' => 'required'
        ],
        // 不管是创建还是更新都要验证的字段
        'edit'   => [
            'config.*.title' => 'required|string',
            'config.*.details' => 'present',
            'config.*.set_key' => 'required|string',
            'config.*.set_value' => 'present',
            'token'  => 'required|string',
        ],
    ];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 根据不同的请求, 添加不同的验证规则，将对应的请求的规则和公共的规则合并
        if (static::getPathInfo() == '/admin/config/create')
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
            'token'    => '令牌',
            'config'  => '配置项',
            'config.*.title'  => '配置项中标题',
            'config.*.details'  => '配置项中详情',
            'config.*.set_key'  => '配置项中设置的键名',
            'config.*.set_value'  => '配置项中设置的键值',
        ];
    }

}
