<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/26
 * Time: 14:41
 */

namespace app\admin\controller;


class Company extends Common
{
    //企业列表
    public function index(){

        $companyList = db('company')->select();

        $this->assign('company',$companyList);

        return $this->fetch();

        halt($companyList);
    }
}