<?php

namespace App\Http\Controllers;

use App\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    /**
     * 上传图片
     * @param  Request  $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $path = $request->file('file')->store('image');

        if ($path){
            return getAjaxData('', 1, '/uploads/'.$path);
        } else {
            return getAjaxData('', 0);
        }
    }


}
