<?php

/**
 * ajax返回数据
 * @param string $msg 信息
 * @param int $code 代码
 * @param array $data 数据
 * @param array $other 其他数据
 * @return false|string
 */
function getAjaxData(string $msg='', int $code=1, $data=[], $other=[]){

    if ($code == 0){
        $msg = $msg ? $msg : '操作失败！';
    } else if ($code == 1){
        $msg = $msg ? $msg : '操作成功！';
    }

    $params = [
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ];

    if (!empty($other)){
        $params = array_merge($params, $other);
    }

    return json_encode($params);
}
