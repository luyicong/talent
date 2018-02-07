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
    public function getCompanyList($data=[]) {

        $order = ['comp_id' => 'desc'];

        $result = db('company')
            ->where($data)
            ->order($order)

            ->paginate(5);

        return $result;
    }
}