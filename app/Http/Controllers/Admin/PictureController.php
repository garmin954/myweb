<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PictureController extends BaseController
{
    //

    public function index()
    {
        $result1 = $this->eu_scandir(public_path('upload'));
        $result2 = $this->eu_scandir(public_path('uploads'));
        $result = array_merge($result1, $result2);
        $result = ($this -> for_array($result2));

        $_result = array();
        foreach ($result as $key=>$file){
            if(is_array($file)){
                foreach ($file as $val){
                    $_result[] = str_replace(config('u_editor'),config('ueditor'),$val);
                }
            }else{
                $_result[] = str_replace(config('u_editor'),config('ueditor'),$file);
            }
        }

        foreach ($_result as &$val){

            $val = str_replace(public_path(),'/',$val);
            $val = str_replace('//','/',$val);
        }

        return view('admin.picture.index',[
            'list'  => $_result,
        ]);

    }

    public function for_array($arr = array (), &$result = []) {


        if(empty($arr)) {
            return false;
        }

        foreach ($arr as  &$v) {
            if (is_array($v)) {
                $v = $this->for_array($v, $result);
            } else {
//            $v = $v;
                $result[] = $v;
            }
        }

        return $result;
    }

    /*
     * 获取ueditor的图片
     */

    public function eu_scandir($dir)
    {
        $dir_list = scandir($dir);
        $result =array();
        foreach ($dir_list as $key => $file){
            //文件
            if($file != '.' && $file != '..' ){

                if (is_dir($dir.'/'.$file)){

                    $result[] = $this->eu_scandir($dir.'/'.$file);

                }else{
                    $result[] = $dir.'/'.$file;
                }
            }
            //文件夹
        }
        return $result;
    }


    //ueditor图片删除
    public function delImage(Request $request)
    {
        $path = $request->post('path');
        $show = $request->post('show') ? $request->post('show') : 0;
        if(@unlink(public_path().$path)){
            return getAjaxData('删除成功', 1, [],['show'=>$show]);
        }else{
            return getAjaxData('删除失败', 0, [],['show'=>$show]);
        }
    }
}
