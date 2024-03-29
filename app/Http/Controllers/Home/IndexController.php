<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Admin\AdvertiseModel;
use App\Model\Admin\GoodsCategoryModel;
use App\Model\Admin\GoodsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class IndexController extends BaseController
{
    //
    public function index()
    {
        $this->getBanner();
        $this->getCateGoodsList(CATE_1);
        $this->getCateGoodsList(CATE_5);
        $this->getCateGoodsList(CATE_2);

        return view('home.index.index', [
            'active' => 'index'
        ]);
    }


    public function getBanner()
    {
        $advertiseModel = new AdvertiseModel();
        View::share('banner_list', $advertiseModel->where('status', 1)->where('type_id', 1)->get());
    }

    //define('CATE_1', 1); // 团建目的地
    //define('CATE_2', 2); // 团建玩法
    //define('CATE_3', 3); // 团建收益
    //define('CATE_4', 4); // 团建天数
    //define('CATE_5', 5); // 团建价格
    public function getCateGoodsList($cateId)
    {
        $goodsCategoryModel = new GoodsCategoryModel();
        $goodsModel = new GoodsModel();

        $data = $this->getCategoryData();
        $cateList =[];
        foreach ($data as $val){
            if ($val['pid'] == $cateId){
                $cateList[] = $val;
            }
        }

        $condition = [];
        DB::connection()->enableQueryLog();#开启执行日志
        $goodsList = $goodsModel->whereRaw('FIND_IN_SET('.$cateId.', category_id)',true)
               ->where('status', 1)->where('is_top', 1)
               ->orderBy('sort')->offset(0)->limit(7)->get()->toArray();
//        dd(DB::getQueryLog());   //获取查询语句、参数和执行时间


        View::share('cate_'.$cateId.'_list', $cateList);
        View::share('goods_'.$cateId.'_list',  $goodsList);

    }

    public function getCategoryData()
    {
        $goodsCategoryModel = new GoodsCategoryModel();
        $data = Cache::get('category_list');
        if (empty($data)){
            $data = $goodsCategoryModel->where('status', 1)->get()->toArray();
            Cache::put('category_list', $data, 3600*10);
        }

        return $data;
    }
}
