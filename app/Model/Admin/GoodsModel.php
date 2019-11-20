<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = true;
    protected $treeParams;

    public function __construct(array $attributes = [])
    {
        $this->treeParams = [
            'label' => 'goods_name',
            'value' => 'goods_id',
            'children' => 'child',
        ];
        parent::__construct($attributes);
    }
}
