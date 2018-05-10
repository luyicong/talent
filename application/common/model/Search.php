<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/12
 * Time: 15:04
 */

namespace app\common\model;


use think\Model;

class Search extends Model
{
    //职位搜索
    public function searchByPosition($key) {

        $result = db('position')
            ->alias('p')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')

            ->where('pos_name','like','%'.$key.'%')
            //需要什么字段就从相应的表中提取出来,并分页
            ->field('p.pos_id,p.pos_name,p.pos_salary,p.pos_exp,p.pos_edu,p.pos_age,p.sendtime,c.comp_name')

            ->select();

        //时间格式装还
        foreach ($result as &$item) {
            $item['sendtime'] = transfTime($item['sendtime']);
        }

        return $result;
    }

    public function searchByTalent($key) {

        $result = db('resume')

            ->where('position','like','%'.$key.'%')

            ->select();

        //时间格式化
        foreach ($result as &$item) {
            $item['update_time'] = transfTime($item['update_time']);
        }

        return $result;
    }

    public function searchByCompany($key) {

        $result = db('company')

            ->where('comp_name','like','%'.$key.'%')

            ->select();

        return $result;
    }
}