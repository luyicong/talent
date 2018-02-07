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
    //获取求职列表
    public function getResumeList() {

        $result = db('resume')->select();

        return $result;
    }
}