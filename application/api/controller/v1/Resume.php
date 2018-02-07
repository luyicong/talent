<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 21:21
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Resume extends Common
{
    public function getResumeList() {
        $result = model('Resume')->getResumeList();

        return show(config('code.success'), 'OK', $result, 200);
    }
}