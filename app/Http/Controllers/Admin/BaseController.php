<?php

namespace App\Http\Controllers\Admin;

use App\Base;
use App\Http\Controllers\Controller;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{

    public function __construct(Request $request)
    {
        $action = $request->route()->getActionMethod();
        $routeList = ['login'];

        if (!in_array($action, $routeList)){
            $this->middleware(function ($request, $next) {
                $adminId = $request->session()->get('admin_id');

                if (!$adminId){
                    Header('Location:'.route('admin.login'));
                    die;
//                    return  false;
                }
                // 也可使用 Session::get('user_id'); 需声明 use Session;
                return $next($request);
            });
        }
    }

}
