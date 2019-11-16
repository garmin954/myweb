<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class GoodsCategoryModel extends \App\Model\Base
{
    protected $table = 'goods_category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;

    public function saveGoodsCategory($params)
    {
        $res = $this->saveData($params);

        return $res;
    }

    /**
     * 获取配置类型
     * @return mixed
     */
    public function getGoodsCategoryList()
    {
        $list = $this->where('status', 1)->get();

        return $list;
    }

    /**
     * 获取所有商品分类
     * @return array
     */
    public function getCategoryList()
    {
        $list = $this->where('status', 1)->get();
        $data = $this->getSonList(0, $list);

        return $data;
    }
}
