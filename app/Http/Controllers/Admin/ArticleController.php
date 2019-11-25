<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Model\Admin\ArticleCategoryModel;
use App\Model\Admin\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()){
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);
            $cateId = $request->post('cate_id', 1);
            $condition = [];

            if ($cateId){
                $condition['art.category_id'] = ['nq', $cateId];
            }

            $title = $request->post('title', '');
            if ($title){
                $condition['art.title'] = ['like', $title];
            }

            $status = $request->post('status', '');
            if ($status != ''){
                $condition['art.status'] = ['nq', $status];
            }

            $list = [];
            $count = $this->model->getCount($this->model->from('article','art'), $condition);
            if ($count){
                $objView = $this->model->from('article','art')->select('art.*', 'cate.category_name')
                    ->leftJoin('article_category as cate', 'cate.category_id', '=', 'art.category_id');
                $list = $this->model->getPageQuery($objView, $pageIndex, $pageSize, $condition);
            }

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize, 'count'=>$count]);
            } else {
                return getAjaxData('没有数据', 0);
            }
        }
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ArticleRequest $request)
    {
        if ($request->get('title', '')) {
            $params = $request->all();
            $params = $this->model->saveArticle($params);
            if ($params){
                return getAjaxData();
            } else {
                return getAjaxData('', 0);
            }

        } else {

            $type = $request->get('cate_id', 1);
            return view('admin.article.create');
        }
    }


    /**
     * 获取数据
     * @param Request $request
     * @return false|string
     */
    public function info(Request $request)
    {
        if ($request->ajax()){
            $id = $request->post('id', 0);
            if ($id){

                $info = $this->model->where('config_id', $id)->first();
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
     * 配置页面
     */
    public function config()
    {
        $configTypeModel = new ConfigType();
        $configTypeList = $configTypeModel->where('status', 1)->get ();
        $configList = $this->model->where('status', 1)->get();
        $list = [];
        if (!empty($configTypeList)){

            foreach ($configTypeList as &$type){
                $arr= [];
                foreach ($configList as $config){
                    if ($config['config_type'] == $type['type_id']){
                        $arr[] = $config;
                    }
                }
                $type['child'] = $arr;
            }
        }

        return view('admin.article.config', ['config_type_list'=>$configTypeList]);
    }

    public function getInitialData(Request $request)
    {
        $articleCateModel = new ArticleCategoryModel();
        $cateList = $articleCateModel->where('status', 1)->get();
        $data['cate_list'] = $articleCateModel->getSonList(0, $cateList);

        $artId = $request->get('id', 0);
        $data['info'] = $this->model->where('art_id', $artId)->first();
        if ($data){
            return getAjaxData('', 1, $data);
        } else {
            return getAjaxData('', 1);
        }
    }
}
