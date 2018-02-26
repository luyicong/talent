<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/23
 * Time: 16:27
 */

namespace app\admin\controller;

use think\Controller;

class Position extends Common
{
    //职位首页/职位列表
    public function index() {

        $result = model('Position')->getPosListForAdmin();

        $this->assign('posList',$result);

        return $this->fetch();
    }

    //新增职位
    public function add(){

        if(request()->isPost()){
//            halt(input('post.'));
//            $data = input('post.');

            $result = model('Position')->addPosition(input('post.'));

            if($result['valid']){
                //添加成功
                $this->success($result['msg'],'admin/position/index');exit;
            }else{
                //添加失败
                $this->error($result['msg']);exit;
            }

        }

        $cates = db('cate')->select();

        $companyList = db('company')->field('comp_id,comp_name')->select();

//        halt($companyList);
        $this->assign('cates',$cates);
        $this->assign('company',$companyList);

        return $this->fetch();
    }
}