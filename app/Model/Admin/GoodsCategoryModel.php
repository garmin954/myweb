<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class GoodsCategoryModel extends \App\Model\Base
{
    protected $table = 'goods_category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
    protected $switchField = ['status'];
    protected $treeParams;

    public function __construct(array $attributes = [])
    {
        $this->treeParams = [
            'label' => 'category_name',
            'value' => 'category_id',
//            'disabled' => 'exist',
            'children' => 'child',
        ];
        parent::__construct($attributes);
    }

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

    public function getGoodsCateTree($goodsId = 0)
    {
        $data = $this->get()->toArray();
        $goodsCateLinkModel = new GoodsCategoryLinkModel();
        $existList = $goodsCateLinkModel->getGoodsCateLinkItem($goodsId);

        foreach ($data as &$val){
            $val['exist'] = false;
            if (in_array($val['category_id'], $existList)){
                $val['exist'] = true;
            }
        }

        $list = $this->getSonTree(0, $data);

        return $list;
    }

    public function getGoodsCateTrees($goodsId = 0)
    {
        $this->treeParams = [
            'title' => 'category_name',
            'id' => 'category_id',
            'children' => 'child',
        ];

        return $this->getGoodsCateTree();;
    }

    public function delData($id)
    {
        return $this->where($this->primaryKey, $id)->delete();
    }
}
