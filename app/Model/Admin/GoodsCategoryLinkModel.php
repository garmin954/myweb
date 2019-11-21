<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class GoodsCategoryLinkModel extends Model
{
    //
    protected $table = 'goods_category_link';
    protected $primaryKey = 'gc_id';
    public $timestamps = true;


    /**
     * 更新商品分类关联表
     * @param $categoryList
     * @param $goodsId
     * @return mixed
     */
    public function saveGoodsCateLink($categoryList, $goodsId)
    {
        if (!empty($categoryList)){
            // 删除之前的
            $this->where('goods_id', $goodsId)->delete();
            $dataList = [];
            foreach ($categoryList as $cate){
                $item = [
                    'goods_id' => $goodsId,
                ];
                switch (count($cate)){
                    case 1:
                        $item['category_id'] = $cate[0];
                        break;
                    case 2:
                        $item['category_id'] = $cate[0];
                        $item['category_id_1'] = $cate[1];
                        break;
                    case 3:
                        $item['category_id'] = $cate[0];
                        $item['category_id_1'] = $cate[1];
                        $item['category_id_2'] = $cate[2];
                        break;
                }
                array_push($dataList, $item);
            }

            $res = $this->insert($dataList);

            return $res;
        }
    }


    /**
     * 获取商品的关联cateid
     * @param $goodsId
     * @return array
     */
    public function getGoodsCateLinkItem($goodsId)
    {
        $data = $this->where('goods_id', $goodsId)->get();
        $arr = [];
        foreach ($data as $val){
            if (intval($val['category_id_2']) != 0){
                $arr[] = $val['category_id_2'];
                continue;

            }else if(intval($val['category_id_1']) != 0){
                $arr[] = $val['category_id_1'];
                continue;

            }else if(intval($val['category_id']) != 0){
                $arr[] = $val['category_id'];
                continue;

            }
        }

        return $arr;
    }


    /**
     * 获取商品的关联cateid
     * @param $goodsId
     * @return array
     */
    public function getGoodsCateLinkArr($goodsId)
    {
        $data = $this->where('goods_id', $goodsId)->get();
        $arr = [];
        foreach ($data as $val){
            if (intval($val['category_id_2']) != 0){
                $arr[] = [
                    $val['category_id'],
                    $val['category_id_1'],
                    $val['category_id_2'],
                ];
                continue;

            }else if(intval($val['category_id_1']) != 0){
                $arr[] = [
                    $val['category_id'],
                    $val['category_id_1'],
                ];
                continue;

            }else if(intval($val['category_id']) != 0){
                $arr[] = [
                    $val['category_id'],
                ];
                continue;

            }
        }

        return $arr;
    }
}
