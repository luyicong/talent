<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 11:31
 */

namespace app\common\model;


use think\Model;

class Position extends Model
{
    //获取首页职位列表
    public function getPosListForIndex(){

        $result = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来,并分页
            ->field('p.pos_id,p.pos_name,p.pos_salary,p.pos_exp,p.pos_edu,p.pos_age,p.sendtime,c.comp_name')
            //首先按照文章的排序进行渲染 其次按照发布时间渲染，最后再根据文章id进行渲染
            ->order('p.sendtime desc')
            //前8条
            ->limit(8)
            ->select();
        //时间格式装还
        foreach ($result as &$item) {
            $item['sendtime'] = transfTime($item['sendtime']);
        }

        return $result;
    }
    //职位列表页数据
    public function getPosListForListPage($param) {

        $query = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')

            //需要什么字段就从相应的表中提取出来,并分页
            ->field('p.pos_id,p.pos_name,p.pos_salary,p.pos_exp,p.pos_edu,p.pos_age,p.sendtime,c.comp_name')
            //首先按照发布时间渲染，最后再根据文章id进行渲染
            ->order('p.sendtime desc');
        //是否传分类id
        if(isset($param['cate_id'])){
            $result = $query -> where('cate_id',$param['cate_id'])->page($param['nowPage'],5)->select();
        }else{
            $result = $query ->page($param['nowPage'],5)->select();
        }
        //时间格式装还
        foreach ($result as &$item) {
            $item['sendtime'] = transfTime($item['sendtime']);
        }
        return $result;
    }
    //根据id获取职位详情
    public function  getPosDetailById($pos_id) {
        $result = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            ->where('pos_id',$pos_id)
            ->find();
        $result['sendtime'] = transfTime($result['sendtime']);
        return $result;
    }

    //投递职位
    public function deliveryPos($user_id,$pos_id) {

        $data = [
            'user_id' => $user_id,
            'pos_id' => $pos_id,
            'create_time' => time()
        ];

        $result = db('position_delivery')->insert($data);

        return $result;
    }

    //收藏职位
    public function collectPos($user_id,$pos_id) {

        $data = [
            'user_id' => $user_id,
            'pos_id' => $pos_id,
            'create_time' => time()
        ];

        $result = db('position_collect')->insert($data);

        return $result;
    }

    //管理后台获取职位列表
    public function getPosListForAdmin() {

        $query = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来,并分页
            ->field('p.pos_id,p.pos_name,p.pos_salary,p.pos_exp,p.pos_edu,p.pos_age,p.pos_type,p.sendtime,p.work_address,c.comp_name')
            //首先按照发布时间渲染，最后再根据文章id进行渲染
            ->order('p.pos_id asc')

            ->paginate(10);

        foreach ($query as &$item) {
            $item['sendtime'] = transfTime($item['sendtime']);
        }

        return $query;
    }

    //管理后台添加职位
    public function addPosition($data) {

        $data['sendtime'] = time();

        $query = db('position')->insert($data);

        //企业列表职位数量+1
        $insetNum = db('company')->where('comp_id',$data['comp_id'])->setInc('comp_pos_count');

        if($query && $insetNum){
            return ['valid'=>'1','msg'=>'添加成功！'];
        }else{
            return ['valid'=>'0','msg'=>'添加失败！'];
        }
    }
}