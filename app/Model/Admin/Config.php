<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Config extends Base
{
    protected $table = 'config';
    protected $primaryKey = 'config_id';
    public $timestamps = true;


}
