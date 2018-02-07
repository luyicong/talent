<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 20:48
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Position extends Common
{
    //获取招聘列表
    public function getPositionList() {

        $result = model('Position')->getPosList();

        return show(config('code.success'), 'OK', $result, 200);
    }
}