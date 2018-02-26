<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/26
 * Time: 14:19
 */

namespace app\admin\controller;


class Resume extends Common
{
    public function index() {

        $userList = db('resume')->select();

        foreach ($userList as &$item) {
            $item['update_time'] = transfTime($item['update_time']);
        }

//        halt($userList);

        $this->assign('userList',$userList);

        return $this->fetch();

//        halt($userList);
    }
}