<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsRequest;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //

    /**
     * 商品列表
     * @param GoodsRequest $request
     * @return false|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index(GoodsRequest $request)
    {
        if ($request->ajax()){

            return getAjaxData('', 1);
        }
        return view('admin.goods.index');
    }

    public function create(GoodsRequest $request)
    {
        if ($request->ajax()){

            return getAjaxData('', 1);
        }

        return view('admin.goods.create');
    }

    /**
     * 切换状态
     */
    public function changeField()
    {

    }
}
