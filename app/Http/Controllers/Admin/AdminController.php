<?php

namespace App\Http\Controllers\Admin;

use App\Admin\AdminModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Cache;

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

            Session::put('admin_id' , $info['id']);
            Session::save();

            return getAjaxData('登录成功！', 1);
        }

        return view('admin.admin.login');
    }

    public function outLogin(Request $request)
    {
//        Session::flush();

        Session::put('admin_id', null);
        return redirect('admin/login')->withErrors(['注销成功，正在跳转到登陆页面！']);
    }

    public function editPass(Request $request)
    {

        if ($request->getMethod() == 'POST'){
            $adminModel = new \App\Model\Admin\AdminModel();
            $oldPass = generatePassword($request->post('oldpassword', ''));
            $newPass = generatePassword($request->post('newpassword', ''));
            $rePass = generatePassword($request->post('repassword', ''));

            if ($newPass !== $rePass){
                return getAjaxData('确认密码不相同', 0);
            }

            $info = $adminModel->where('id', Session('admin_id'))->where('password', $oldPass)->first();
            if (empty($info)){
                return getAjaxData('密码不正确', 0);
            }

            $res = $adminModel->where('id', Session('admin_id'))->update(['password'=> $newPass]);

            if ($res){
                return getAjaxData('重置密码成功', 1);

            }

            return getAjaxData('', 0);

        }
        return view('admin.admin.editPass');
    }

    public function clearCache()
    {
        Cache::flush();

        return getAjaxData('更新缓存成功！', 1);

        return getAjaxData('更新缓存失败！', 0);

    }
}
