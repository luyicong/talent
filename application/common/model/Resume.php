<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 10:45
 */

namespace app\common\model;


use think\Model;

class Resume extends Model
{
    //获取首页求职列表
    public function getResumeListForIndex() {

        $result = db('resume')->limit(4)->select();

        //时间格式转换
        foreach ($result as &$item) {
            $item['update_time'] = transfTime($item['update_time']);
        }

        return $result;
    }
    //获取人才求职列表
    public function getResumeListForListPage($nowPage=1) {
        $result = db('resume')
                ->page($nowPage,1)
                ->select();

        //时间格式转换
        foreach ($result as &$item) {
            $item['update_time'] = transfTime($item['update_time']);
        }
        return $result;
    }
}