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
    //获取职位列表
    public function getPosList($page=1,$size=5){

        $result = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来,并分页
            ->field('p.pos_id,p.pos_name,p.pos_salary,p.pos_exp,p.pos_edu,p.pos_age,c.comp_name')
            //首先按照文章的排序进行渲染 其次按照发布时间渲染，最后再根据文章id进行渲染
            ->order('p.pos_id desc')

            ->page($page,$size)

            ->paginate($size);

        return $result;
    }
}