<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    //
    public function index()
    {
        return view('home.index.index', [
            'active' => 'index'
        ]);
    }
}
