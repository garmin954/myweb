<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends BaseController
{
    //
    public function index()
    {
        return view('admin.admin.index');
    }


    public function home()
    {
        return view('admin.admin.home');
    }

    public function login(LoginRequest $request)
    {

        if (\request()->getMethod() === 'POST'){

            $username = $request->get('username');
            $password = generatePassword($request->get('password'));

            $adminModel = new \App\Model\Admin\AdminModel();

            $info = $adminModel->where('admin_name', $username)->first();

            if (empty($info)){
                return getAjaxData('账户不存在！', 0);
            }
            if ($info['password'] !== $password){
                return getAjaxData('密码错误！', 0);
            }

            Session(['admin_id' => $info['id']]);
            Session()->save();

            return getAjaxData('登录成功！', 1);
        }

        return view('admin.admin.login');
    }

}
