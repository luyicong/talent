<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 9:45
 */

namespace app\api\controller\v1;
use think\Controller;
use app\api\controller\Common;

class Cate extends Common
{
    //获取首页分类
    public function read() {

        $cates = db('cate')->select();

        halt($cates);

        return show(config('code.success'), 'OK', $cates, 200);
    }
}