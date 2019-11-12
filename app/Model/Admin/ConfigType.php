<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class ConfigType extends Base
{
    protected $table = 'config_type';
    protected $primaryKey = 'type_id';
    public $timestamps = true;

    public function saveConfigType($params)
    {
        $res = $this->saveData($params);

        return $res;
    }

    /**
     * 获取配置类型
     * @return mixed
     */
    public function getConfigTypeList()
    {
        $list = $this->where('status', 1)->get();

        return $list;
    }
}
