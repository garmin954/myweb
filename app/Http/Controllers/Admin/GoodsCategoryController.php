<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsCateGoryRequest;
use App\Model\Admin\GoodsCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $pid = $request->get('pid', 0);
            $condition['cate.pid'] = ['nq', $pid];

            $count = $goodsCategoryModel->getCount($goodsCategoryModel->from('goods_category','cate'),$condition);
            $list = [];
            if ($count){
                $objView = $goodsCategoryModel->from('goods_category','cate')
                    ->leftJoin('goods_category as scate', 'cate.pid', '=', 'scate.category_id')
//                    ->select(DB::raw('yl_cate.*,yl_scate.category_name as pname'));
                    ->select('cate.*','scate.category_name  as pname');
                $list = $goodsCategoryModel->getPageQuery($objView, $pageIndex, $pageSize, $condition, 'cate.category_id');
            }

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize, 'count'=>$count]);
            } else {
                return getAjaxData('没有数据', 0);
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
                return getAjaxData('没有数据', 0);
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
                $info->status =$info->status ==1 ? true : false;
                if ($info){
                    return getAjaxData('', 1, $info);
                }
            }
        }
        return getAjaxData('', 0);
    }


    /**
     * 改变值
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
     * 删除
     * @param Request $request
     * @return false|string
     */
    public function delData(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $res = $this->model->delData($id);

            if ($res) {
                return getAjaxData('', 1);
            } else {
                return getAjaxData('', 0);
            }
        }
    }

    /**
     * 获取tree
     */
    public function getGoodsCategoryTree()
    {
        $data = $this->model->getGoodsCateTrees();

        if ($data){
            return getAjaxData('', 1, $data);
        } else {
            return getAjaxData('');
        }
    }
}
