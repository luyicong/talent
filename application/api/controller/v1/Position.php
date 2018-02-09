<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 20:48
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Position extends Common
{
    //获取招聘列表
    public function getPositionList() {

        $params = input('get.');

        $cate_id = isset($params['cate_id'])?$params['cate_id']:'';

        $params['nowPage'] = isset($params['nowPage'])?$params['nowPage']:1;

        $result = model('Position')->getPosListForListPage($params);

        return show(config('code.success'), 'OK', $result, 200);
    }

    //根据职位id获取职位详情
    public function getPosDetail() {

        $pos_id = input('param.id');

        $result = model('Position')->getPosDetailById($pos_id);

        return show(config('code.success'), 'OK', $result, 200);
    }
}