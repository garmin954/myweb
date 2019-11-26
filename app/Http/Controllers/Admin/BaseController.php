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
        if (Session::has('admin') || in_array($action, $routeList)){

        } else {


            Header('Location:'.route('admin.login'));
            return  false;
        }
    }

}
