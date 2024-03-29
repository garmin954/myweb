<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Base extends Model
{

    /**
     * @$treeParams = [
     *      key(保存的键名) => val（字段名）
     *      最后一个是子级 值是固定的(child)
     *      children => child
     * ]
     */
    protected $treeParams;
    protected $switchField;

    public function getTable()
    {
        return parent::getTable(); // TODO: Change the autogenerated stub
    }


    /**
     * 根据主键更新数据
     * @param $data
     * @return mixed
     */
    public function saveData($data)
    {
        foreach ($data as $field=>$val) { // 过滤空值的
            if (empty($data[$field]) && intval($data[$field]) !== 0) {
                unset($data[$field]);
            }
        }

        if ($this->switchField){
            foreach ($this->switchField as $field) {
                $data[$field] = 0;
            }
        }


        $id = $this->primaryKey;
        if (!isset($data[$id]) || !$data[$id]) {   // 新增
//            $data['created_at'] = date();
            $columns = Schema::getColumnListing($this->table); // 获取表的字段
            if (in_array('created_at', $columns)){
                $data['created_at'] = date('Y-m-d H:i:s');
            }
            $res = $this->insertGetId($data);
        } else { // 更新
            $res = $this->where($id, $data[$id])->update($data);
        }

        return $res;
    }

    /**
     * 查询数据分页
     * @param $pageIndex
     * @param $pageSize
     * @param $conditon
     * @param $order
     * @param $field
     */
    public function getPageQuery($viewObj,$pageIndex=1, $pageSize=PAGE_SIZE, $condition=[], $order=[], $field='*')
    {
        if (empty($order)){
            $order = $this->primaryKey;
        }
        $currSize = ($pageIndex-1)*$pageSize;

        DB::connection()->enableQueryLog();#开启执行日志
        return  $viewObj->where(function ($query) use($condition){
            if (!empty($condition)){
                foreach($condition as $key => $search){
                    switch ($search[0]) {
                        case 'like':
                            if (is_array($search)){
                                foreach (explode('|', $key) as $field){
                                    $query->where($field, 'like',  '%'.$search[1].'%');
                                }
                            }
                            break;
                        case 'nq':
                            $query->where($key, $search[1]);
                            break;
                        case 'in':
                            if (is_array($search[1])){
                                $query->whereIn($key, $search[1]);
                            }else{
                                $query->whereIn($key, explode(',', $search[1]));
                            }
                            break;
                    }
                }
            }
        })->offset($currSize)->limit($pageSize)->orderBy($order)->get();

        dd(DB::getQueryLog());   //获取查询语句、参数和执行时间

    }


    /**
     * 获取数量
     * @param $viewObj
     * @param array $condition
     */
    public function getCount($viewObj, $condition=[], $distinct = '')
    {
//        $count = $viewObj->where($condition)->count();
        DB::connection()->enableQueryLog();#开启执行日志
        if ($distinct){
            $viewObj = $viewObj->distinct($distinct);
        }
        return  $count = $viewObj->where(function ($query) use($condition){
            if (!empty($condition)){
                foreach($condition as $key => $search){
                    switch ($search[0]) {
                        case 'like':
                            if (is_array($search)){
                                foreach (explode('|', $key) as $field){
                                    $query->where($field, 'like',  '%'.$search[1].'%');
                                }
                            }
                            break;
                        case 'nq':
                            $query->where($key, $search[1]);
                            break;
                        case 'in':
                            if (is_array($search[1])){
                                $query->whereIn($key, $search[1]);
                            }else{
                                $query->whereIn($key, explode(',', $search[1]));
                            }
                            break;
                    }
                }
            }
        })->count();
        dd(DB::getQueryLog());   //获取查询语句、参数和执行时间


        return $count;
    }


    /**
     * 改变值
     */
    public function changeField($param)
    {
         $res = $this->where($this->primaryKey, $param['id'])->update([
             $param['field'] => $param['value']
         ]);

         return $res;
    }


    /**
     * 获取下级
     * @param $pid
     * @param $data
     * @param int $level
     * @return array
     */
    public function getSonList($pid, $data, $level=1)
    {
        if (!is_array($data)){
            $data = $data->toArray();
        }
        static $arr = [];
        foreach ($data as $val){
            if ($val['pid'] == $pid){
                $val['level'] = $level;
                $arr[] = $val;
                $this->getSonList($val[$this->primaryKey], $data, $level + 1);
            }
        }

        return $arr;
    }


    /**
     * 获取下级
     * @param $pid
     * @param $data
     * @return array
     */
    public function getSonTree($pid, $data)
    {
        if (!is_array($data)){
            $data = $data->toArray();
        }

        $arr = [];
        foreach ($data as $key => $val) {
            if ($val['pid'] == $pid){
                $param = [];
                foreach ($this->treeParams as $tpkey => $tpval){
                    if ($tpval == 'child'){
                        unset($data[$key]);
                        $res = $this->getSonTree($val[$this->primaryKey], $data);
                        if ($res){
                            $param[$tpkey] =$res;
                        }
                    } else {
                        $param[$tpkey] = $val[$tpval];
                    }
                }

                $arr[] = $param;
            }
        }

        return $arr;
    }
}
