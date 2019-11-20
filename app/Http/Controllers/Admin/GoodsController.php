<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
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

            return getAjaxData('', 1);
        }
        return view('admin.goods.index');
    }

    public function create(GoodsRequest $request)
    {
        if ($request->ajax()){

            return getAjaxData('', 1);
        }

        return view('admin.goods.create');
    }

    /**
     * 切换状态
     */
    public function changeField()
    {

    }


    /**
     * 获取商品相关信息
     * @param Request $request
     * @return false|string|\think\response\Json
     */
    public function getGoodsRelated(Request $request)
    {

        $goodsCategoryModel = new GoodsCategoryModel();
        $data['cate_list'] = $goodsCategoryModel->getGoodsCateTree();

        return getAjaxData('', 1, $data);

    }
}
