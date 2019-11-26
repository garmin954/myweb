<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Admin\GoodsCategoryLinkModel;
use App\Model\Admin\GoodsCategoryModel;
use App\Model\Admin\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
            'active' => 'group'
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


    /*
     * 搜索
     */
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

            foreach ($list as &$goods){
                $goods['cate'] = $this->getGoodsCate($goods['goods_id']);
            }

            return getAjaxData('', 1, $list, ['count'=>$count, 'page'=>$pageIndex,'limit'=>$pageSize]);
        }
    }


    /**
     * 获取商品数据
     * @param $goodsId
     * @return array|mixed
     */
    public function getGoodsCate($goodsId)
    {
        $goodsData = Cache::pull('goods_info_'.$goodsId);
        if (empty($goodsData)){
            $goodsModel = new GoodsModel();
            $goodsCategoryLinkModel = new GoodsCategoryLinkModel();
            $goodsCategoryModel = new GoodsCategoryModel();
            $info = $goodsModel->where('goods_id', $goodsId)->first()->toArray();

            $data1 = $goodsCategoryModel->whereIn('category_id', explode(',', $info['category_id_1']))->get()->toArray();
            $data2 = $goodsCategoryModel->whereIn('category_id', explode(',', $info['category_id_2']))->get()->toArray();

            $attrList = [];
            foreach ($data1 as $val1){
                $itemArr = $val1;
                foreach ($data2 as $val2){
                    if ($val2['pid'] == $val1['category_id']){
                        $itemArr['child'][] = $val2;
                    }
                }

                if (isset($itemArr['child'])){
                    $attrList[$val1['pid']] = empty($attrList[$val1['pid']]) ?  [] : $attrList[$val1['pid']];
                    $attrList[$val1['pid']] = array_merge($attrList[$val1['pid']], $itemArr['child']);
                }else{
                    $attrList[$val1['pid']][] = $itemArr;
                }

            }

            Cache::put('goods_info_'.$goodsId, $attrList, 3600*24);
            $goodsData = $attrList;
        }

        return $goodsData;
    }

    /**
     * 查询条件
     * @param $first
     * @param $second
     * @param $obgView
     */
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


    /**
     * 商品详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function goodsInfo(Request $request)
    {

        return view('home.goods.goodsInfo', [
            'active' => 'group'
        ]);
    }
}
