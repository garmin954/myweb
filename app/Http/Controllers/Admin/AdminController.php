<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;

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

            return 2;
        }
        return view('admin.admin.login');
    }

    protected function validateLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => trans('validation.required'),
            'captcha.captcha' => trans('validation.captcha'),
        ]);
    }

}
