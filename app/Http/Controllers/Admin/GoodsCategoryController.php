<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsCateGoryRequest;
use App\Model\Admin\GoodsCategoryModel;
use Illuminate\Http\Request;

class GoodsCategoryController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Model\Admin\GoodsCategoryModel();
    }
    //
    public function index(Request $request)
    {
        if ($request->ajax()){
            $goodsCategoryModel = new GoodsCategoryModel();
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);
            $condition = [];
            $list = $goodsCategoryModel->getPageQuery($goodsCategoryModel, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize]);
            } else {
                return getAjaxData('', 0);
            }
        }
        return view('admin.goods_category.index');
    }

    /**
     * 添加创建
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(GoodsCateGoryRequest $request)
    {
        if ($request->ajax()){
            $params = $request->all();
            $goodsCategoryModel = new GoodsCategoryModel();
            $res = $goodsCategoryModel->saveGoodsCategory($params);

            if ($res) {
                return getAjaxData('', 1);
            } else {
                return getAjaxData('', 0);
            }
        }
        $goodsCateList  = $this->model->getCategoryList();
        return view('admin.goods_category.create', [
            'goodsCateList' => $goodsCateList
        ]);
    }

    /**
     * 获取信息
     * @param Request $request
     * @return false|string
     */
    public function info(Request $request)
    {
        if ($request->ajax()){
            $id = $request->post('id', 0);
            if ($id){
                $info = DB::table('goods_category')->where('category_id', $id)->first();
                if ($info){
                    return getAjaxData('', 1, $info);
                }
            }
        }
        return getAjaxData('', 0);
    }


}
