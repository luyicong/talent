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

//        halt(time());

        $nowPage = isset(input('get.')['nowPage'])?input('get.')['nowPage']:1;

        $result = model('Resume')->getResumeListForListPage($nowPage);

        return show(config('code.success'), 'OK', $result, 200);
    }
}