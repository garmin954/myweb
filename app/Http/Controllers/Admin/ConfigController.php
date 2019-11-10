<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Config;
use App\Http\Controllers\Controller;
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
    public function create(Request $request)
    {
        if ($request->ajax()) {

            $params = $request->all();

            $configModel = new \App\Model\Admin\Config();
            $params = $configModel->insert($params);
            if ($params){
                return getAjaxData();

            } else {
                return getAjaxData('', 0);

            }

        } else {

            return view('admin.config.create');
        }
    }


    public function info()
    {
        return '';

    }
}
