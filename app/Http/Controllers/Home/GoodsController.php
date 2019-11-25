<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Admin\GoodsCategoryLinkModel;
use App\Model\Admin\GoodsCategoryModel;
use App\Model\Admin\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //
    public function group()
    {

        $goodsCategoryModel = new GoodsCategoryModel();
        $cateList = $goodsCategoryModel->getGoodsCateTree();

        return view('home.goods.group', [
            'cate_list' => $cateList,
        ]);
    }

    /**
     * 获取分类
     */
    public function getCategoryList()
    {
        $goodsCategoryModel = new GoodsCategoryModel();
        $data['cate_list'] = $goodsCategoryModel->getGoodsCateTree();

        if ($data){
            return getAjaxData('', 1, $data);
        }else{
            return getAjaxData('', 0);
        }
    }


    public function searchGoods(Request $request)
    {
        if ($request->isMethod('post')){

            $first = $request->post('first', '');
            $second = $request->post('seconds', '');
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);

            $condition = [];


            $goodsModel = new GoodsModel();
            $obgView = $goodsModel->from('goods', 'goods')->select('goods.*')
                        ->distinct()
                        ->leftJoin('goods_category_link as link','link.goods_id', '=', 'goods.goods_id');
            $this->getCateCondition($first, $second, $obgView);
            $obgViews = clone  $obgView;
            $count = $goodsModel->getCount($obgView, $condition, 'goods.goods_id');
            $list = [];
            if ($count){
                $list = $goodsModel->getPageQuery($obgView, $pageIndex, $pageSize, $condition);
            }

            return getAjaxData('', 1, $list, ['count'=>$count, 'page'=>$pageIndex,'limit'=>$pageSize]);
        }
    }


    public function getGoodsInfo($goodsId)
    {

    }

    public function getCateCondition($first, $second, &$obgView)
    {
        $goodsCateModel = new GoodsCategoryModel();
        $data = $goodsCateModel->where('status', 1)->get();
        $second = explode(',', $second);
        if (!empty($first)) {
            foreach (explode(',', $first) as $topCate) {
                $itemData = $goodsCateModel->where('pid', $topCate)->get()->pluck('category_id')->toArray();
                $as = array_intersect($second, $itemData);
                if (!empty($as)){
                    $obgView->whereRaw('FIND_IN_SET('.end($as).',yl_goods.category_id_2)',true);
                }else{
                    $obgView->whereRaw('FIND_IN_SET('.$topCate.',yl_goods.category_id_1)',true);
                }
            }
        }

    }
}
