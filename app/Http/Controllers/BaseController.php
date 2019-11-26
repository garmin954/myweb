<?php

namespace App\Http\Controllers;

use App\Base;
use Carbon\Traits\Date;
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
        $dirName = date('Y_m_d');

        $path = $request->file('file')->store('image/'.$dirName);

        if ($path){
            return getAjaxData('', 1, '/uploads/'.$path);
        } else {
            return getAjaxData('', 0);
        }
    }


}
