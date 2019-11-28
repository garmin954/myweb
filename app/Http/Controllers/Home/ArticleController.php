<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Admin\AdvertiseModel;
use App\Model\Admin\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    //
    public function raiders()
    {

        $articleModel = new ArticleModel();

        $list = $articleModel->where('status', 1)->orderBy('sort')->where('category_id', 1)->paginate(12);
        return view('home.article.raiders',[
            'active' => 'raiders',
            'list' => $list,

        ]);
    }


    public function artInfo(Request $request)
    {
        $articleModel = new ArticleModel();
        $goodsContro = new GoodsController();

        $id = $request->get('id', 0);
        return view('home.article.artInfo',[
            'active' => 'raiders',
            'info' => $articleModel->where('art_id', $id)->first(),
            'recommend' => $goodsContro->recommendGoods(1),
        ]);
    }

    public function Cooperation()
    {
        $articleModel = new ArticleModel();

        $list = $articleModel->where('status', 1)->orderBy('sort')->where('category_id', 2)->get()->toArray();
        return view('home.article.cooperation',[
            'active' => 'cooperation',
            'list' => $list,
        ]);
    }


    public function future()
    {
        $articleModel = new ArticleModel();

        $list = $articleModel->where('status', 1)->orderBy('sort')->where('category_id', 2)->paginate(12);
        return view('home.article.future',[
            'active' => 'future',
            'list' => $list,
        ]);
    }


    public function aboutus()
    {

        $advertiseModel = new AdvertiseModel();
        return view('home.article.aboutus',[
            'active' => 'aboutus',
            'adv_list' => $advertiseModel->where('type_id', 3)->where('status', 1)->get()->toArray()
        ]);
    }

}
