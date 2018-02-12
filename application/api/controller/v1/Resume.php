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
    //获取求职列表
    public function getResumeList() {

//        halt(time());

        $nowPage = isset(input('get.')['nowPage'])?input('get.')['nowPage']:1;

        $result = model('Resume')->getResumeListForListPage($nowPage);

        return show(config('code.success'), 'OK', $result, 200);
    }
    //获取求职详情
    public function getResumeDetail() {
        $id = input('param.id');
//        halt($user_id);

        $result = model('Resume')->getResumeDateil($id);

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }
}