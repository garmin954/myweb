<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use think\Exception;

class GoodsModel extends Base
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

    /**
     * 保存
     * @param $params
     * @return bool
     */
    public function saveGoods($params)
    {
        DB::beginTransaction();
        try{
            $cateList = $params['category_list'];
            unset($params['category_list']);
            $params['picture_list'] = implode(',', $params['picture_list']);

            $res = $this->saveData($params);
            if (isset($params['goods_id'])){
                $goodsId = $params['goods_id'];
            }else{
                $goodsId = $res;
            }
            if ($res){
                $goodsCateLinkModel = new GoodsCategoryLinkModel();
                $res2 = $goodsCateLinkModel->saveGoodsCateLink($cateList, $goodsId);
            } else{
                DB::commit();
                return true;
            }
            if ($res && $res2){
                DB::commit();
                return true;
            }
        }catch (Exception $e){
            DB::rollback();
            return false;
        }

    }



}
