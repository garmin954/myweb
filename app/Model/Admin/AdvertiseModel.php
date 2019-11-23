<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdvertiseModel extends Base
{
    protected $table = 'advertise';
    protected $primaryKey = 'adv_id';
    public $timestamps = true;

    public function saveAdvertise($params)
    {
        $res = $this->saveData($params);

        return $res;
    }
}
