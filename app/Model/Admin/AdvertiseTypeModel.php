<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdvertiseTypeModel extends Model
{
    protected $table = 'advertise_type';
    protected $primaryKey = 'type_id';
    public $timestamps = true;


    /**
     * 获取列表
     */
    public function getAdvertiseTypeList()
    {
        return $this->get();
    }
}
