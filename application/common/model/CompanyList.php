<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 10:28
 */

namespace app\common\model;


use think\model\Merge;

class CompanyList extends Merge
{
    //获取企业列表
    public function getCompanyListForIndex($data=[]) {

        $order = ['comp_id' => 'desc'];

        $result = db('company')
            ->where($data)
            ->order($order)
            ->paginate(5);

        return $result;
    }

    //获取企业详情
    public function getCompanyDetailById($com_id) {

        $result = db('company')

            ->where('comp_id',$com_id)

            ->find();

        $positionList = db('position')

            ->where('comp_id',$com_id)

            ->select();
        //时间格式装还
        foreach ($positionList as &$item) {
            $item['sendtime'] = transfTime($item['sendtime']);
        }
        $result['posList'] = $positionList;

        return $result;
    }
}