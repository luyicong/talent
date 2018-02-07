<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 10:38
 */

namespace app\common\model;


use think\Model;

class Cate extends Model
{
    //获取首页分类
    public function getCate() {

        $result = db('cate')->select();

        return $result;
    }
}