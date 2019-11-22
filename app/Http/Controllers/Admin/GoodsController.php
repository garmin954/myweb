<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use App\Model\Admin\GoodsCategoryLinkModel;
use App\Model\Admin\GoodsCategoryModel;
use App\Model\Admin\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //
    protected $model;

    public function __construct()
    {
        $this->model = new GoodsModel();
    }
    /**
     * 商品列表
     * @param GoodsRequest $request
     * @return false|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index(GoodsRequest $request)
    {
        if ($request->ajax()){
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);

            $condition = [];

            // 搜索名称
            $goodsName = $request->post('goods_name', '');
            if ($goodsName){
                $condition['goods_name'] = ['like', $goodsName];
            }
            // 搜索状态
            $status = $request->get('status', '');
            if ($status != ''){
                $condition['status'] = ['nq', $status];
            }

            // 搜索分类
            $categoryArr = $request->get('category_id', '');
            if ($categoryArr){
                $categoryId = $level= 0;
                switch (count($categoryArr)){
                    case 1:
                        $categoryId = $categoryArr[0];
                        $level = 'category_id';
                        break;
                    case 2:
                        $categoryId = $categoryArr[1];
                        $level = 'category_id_1';
                        break;
                    case 3:
                        $categoryId = $categoryArr[2];
                        $level = 'category_id_2';
                        break;
                }

                if ($categoryId){
                    $condition[$level] = ['nq', $categoryId];
                }
            }

            $objView = $this->model->from('goods', 'good')->distinct()->select('good.*')->leftJoin('goods_category_link as link', 'link.goods_id', '=', 'good.goods_id');
            $objViews = clone $objView;
            $count = $this->model->getCount($objViews, $condition, 'good.goods_id');
            $list = [];
            if ($count){
                $list = $this->model->getPageQuery($objView, $pageIndex, $pageSize, $condition, 'good.goods_id');
            }

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize, 'count'=>$count]);
            } else {
                return getAjaxData('', 0);
            }
        }
        return view('admin.goods.index');
    }

    public function create(GoodsRequest $request)
    {
        if ($request->get('goods_name')){
            $params = $request->all();
            $res = $this->model->saveGoods($params);
            if ($res) {
                return getAjaxData('', 1);
            } else {
                return getAjaxData('', 0);
            }
        }

        return view('admin.goods.create');
    }

    /**
     * 切换状态
     */
    public function changeField(Request $request)
    {
        if ($request->ajax()){
            if (isset($request['id']) && isset($request['id']) && isset($request['id'])){
                $res= $this->model->changeField($request);
                if ($res){
                    return getAjaxData('', 1);
                }
            }
        }
        return getAjaxData('', 0);
    }


    /**
     * 获取商品相关信息
     * @param Request $request
     * @return false|string|\think\response\Json
     */
    public function getGoodsRelated(Request $request)
    {
        $goodsId = $request->get('goods_id', 0);

        $goodsCategoryModel = new GoodsCategoryModel();
        $data['cate_list'] = $goodsCategoryModel->getGoodsCateTree($goodsId);
        $data['type_list'] = config('template.goods_type_list');
        if ($goodsId){
            $goodsCateLinkModel = new GoodsCategoryLinkModel();
            $data['info'] = $this->model->where('goods_id', $goodsId)->first();
            $data['info']['category_list'] =$goodsCateLinkModel->getGoodsCateLinkArr($goodsId);
        }

        return getAjaxData('', 1, $data);
    }

    /**
     * 获取搜索相关数据
     */
    public function getSearchData()
    {
        $goodsCategoryModel = new GoodsCategoryModel();
        $data['cate_list'] = $goodsCategoryModel->getGoodsCateTree();

        return getAjaxData('', 1, $data);
    }
}
