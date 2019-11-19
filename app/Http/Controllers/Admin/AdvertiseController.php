<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertiseRequest;
use App\Model\Admin\AdvertiseModel;
use App\Model\Admin\AdvertiseTypeModel;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    //
    protected $model;

    public function __construct()
    {
        $this->model = new AdvertiseModel();
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
            $condition = [];
            $list = $this->model->getPageQuery($this->model, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize]);
            } else {
                return getAjaxData('', 0);
            }
        }
        return view('admin.advertise.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdvertiseRequest $request)
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

            $type = $request->get('type', 1); // 1为团队 2 为合作
            // 获取广告类型
            $advertiseTypeModel = new AdvertiseTypeModel();
            $advertiseTypeList = $advertiseTypeModel->getAdvertiseTypeList();
            return view('admin.advertise.create',['advertise_type_list'=>$advertiseTypeList]);
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

}
