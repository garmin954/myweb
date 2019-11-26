<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdvertiseRequest;
use App\Model\Admin\AdvertiseModel;
use App\Model\Admin\AdvertiseTypeModel;
use Illuminate\Http\Request;

class AdvertiseController extends BaseController
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

            $typeId = $request->get('type_id', '');
            if ($typeId){
                $condition['type_id'] = ['nq', $typeId];
            }

            $status = $request->get('status', '');
            if ($status != ''){
                $condition['status'] = ['nq', $status];
            }
            $count = $this->model->getCount($this->model, $condition);

            $objView = $this->model->from('advertise', 'adv')->select('adv.*', 'type.type_name')->leftJoin('advertise_type as type', 'adv.type_id', '=', 'type.type_id');
            $list = $this->model->getPageQuery($objView, $pageIndex, $pageSize, $condition);

            if ($list) {
                return getAjaxData('', 1, $list, ['page'=>$pageIndex, 'limit'=>$pageSize, 'count'=>$count]);
            } else {
                return getAjaxData('没有数据', 0);
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
        if ($request->get('adv_name', '')) {
            $params = $request->all();
            $params = $this->model->saveAdvertise($params);
            if ($params){
                return getAjaxData();
            } else {
                return getAjaxData('', 0);
            }

        } else {

            return view('admin.advertise.create');
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


    public function getInitialData(Request $request)
    {
        // 获取广告类型
        $advId = $request->all('id', 0);
        $advertiseTypeModel = new AdvertiseTypeModel();
        $data['adv_type_list'] = $advertiseTypeModel->getAdvertiseTypeList();
        $data['info'] = $this->model->where('adv_id', $advId)->first();

        if ($data){
            return getAjaxData('', 1, $data);
        } else {
            return getAjaxData('', 0);
        }
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
            $res = $this->model->where('adv_id',$id)->delete();
            if ($res) {
                return getAjaxData('', 1);
            } else {
                return getAjaxData('', 0);
            }
        }
    }


}
