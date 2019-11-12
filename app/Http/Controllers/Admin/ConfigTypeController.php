<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\ConfigType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigTypeController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()){
            $configTypeModel = new ConfigType();
            $pageIndex = $request->post('page', 1);
            $pageSize = $request->post('limit', PAGE_SIZE);
            $condition = [];
            $list = $configTypeModel->getPageQuery($configTypeModel, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize]);
            } else {
                return getAjaxData('', 0);
            }
        }
        return view('admin.config_type.index');
    }

    /**
     * 添加创建
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->ajax()){
            $params = $request->all();
            $configTypeModel = new ConfigType();
            $res = $configTypeModel->saveConfigType($params);

            if ($res) {
                return getAjaxData('', 1);
            } else {
                return getAjaxData('', 0);
            }
        }
        return view('admin.config_type.create');
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
                $info = DB::table('config_type')->where('type_id', $id)->first();
                if ($info){
                    return getAjaxData('', 1, $info);
                }
            }
        }
        return getAjaxData('', 0);
    }

}
