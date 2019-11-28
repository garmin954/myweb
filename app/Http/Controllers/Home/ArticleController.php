<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    //
    public function raiders()
    {

        return view('home.article.raiders',[
            'active' => 'raiders'
        ]);
    }
}
