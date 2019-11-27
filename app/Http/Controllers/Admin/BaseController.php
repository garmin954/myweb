<?php

namespace App\Http\Controllers\Admin;

use App\Base;
use App\Http\Controllers\Controller;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{

    public function __construct()
    {
        $action = \request()->route()->getActionMethod();
        $routeList = ['login'];

//        session(['chairs' => 7, 'instruments' => 3]);
        var_dump(session()->all());

//        if (Session::get('admin_id') || in_array($action, $routeList)){
//            dump(\session()->all());
//
//
//
//        } else {
//
//
//            Header('Location:'.route('admin.login'));
//            return  false;
//        }
    }

}
