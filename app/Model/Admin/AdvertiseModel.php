<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdvertiseModel extends Model
{
    protected $table = 'advertise';
    protected $primaryKey = 'adv_id';
    public $timestamps = true;
}
