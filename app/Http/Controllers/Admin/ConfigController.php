<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConfigRequest;
use App\Http\Requests\Base;
use App\Model\admin\ConfigType;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
            $validated = $request->validated();
            $configModel = new \App\Model\Admin\Config();
            $params = $configModel->insert($params);
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


    public function info()
    {
        return '';

    }
}
