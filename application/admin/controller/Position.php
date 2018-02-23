<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/23
 * Time: 16:27
 */

namespace app\admin\controller;


use think\Controller;

class position extends Controller
{
    //职位首页/职位列表
    public function index() {

        $result = model('Position')->getPosListForAdmin();

        $this->assign('posList',$result);

        return $this->fetch();
    }

    //新增职位
    public function add(){

        return $this->fetch();
    }
}