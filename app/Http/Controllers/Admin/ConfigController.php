<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConfigRequest;
use App\Http\Requests\Base;
use App\Model\admin\ConfigType;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Model\Admin\Config();
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
            $configModel = new \App\Model\Admin\Config();
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);
            $condition = [];
            $list = $configModel->getPageQuery($configModel, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize]);
            } else {
                return getAjaxData('没有数据', 0);
            }
        }
        return view('admin.config.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ConfigRequest $request)
    {
        if ($request->ajax()) {

            $params = $request->all();

            $configModel = new \App\Model\Admin\Config();
            $params = $configModel->saveData($params);
            if ($params){
                return getAjaxData();

            } else {
                return getAjaxData('', 0);

            }

        } else {

            $configTypeModel = new ConfigType();
            $configTypeList = $configTypeModel->getConfigTypeList();

            return view('admin.config.create',['config_type_list'=>$configTypeList]);
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
                $configModel = new \App\Model\Admin\Config();

                $info = $configModel->where('config_id', $id)->first();
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

        return view('admin.config.config', ['config_type_list'=>$configTypeList]);
    }
}
