<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use App\Model\Admin\GoodsCategoryLinkModel;
use App\Model\Admin\GoodsCategoryModel;
use App\Model\Admin\GoodsModel;
use Illuminate\Http\Request;

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
            $list = $this->model->getPageQuery($this->model, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize]);
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
}
