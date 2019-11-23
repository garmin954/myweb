<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
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
            $cateId = $request->all('cate_id', 1);
            $condition = [];
            $list = [];
            $count = $this->model->getCount($this->model, $condition);
            if ($count){
                $list = $this->model->getPageQuery($this->model, $pageIndex, $pageSize, $condition);
            }

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize, 'count'=>$count]);
            } else {
                return getAjaxData('', 0);
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
        if ($request->ajax()) {

            $params = $request->all();

            $params = $this->model->saveData($params);
            if ($params){
                return getAjaxData();

            } else {
                return getAjaxData('', 0);

            }

        } else {

            $type = $request->get('cate_id', 1);
            $view = '';
            if ($type == 1){
                $view = 'admin.article.create1';
            } else {
                $view = 'admin.article.create2';
            }
            return view($view);
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
}
