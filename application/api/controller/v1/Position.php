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

    //申请或投递职位
    public function deliveryPosition() {

        $result = model('Position')->deliveryPos(input('param.user_id'),input('param.pos_id'));

        if($result){
            return  show(config('code.success'), '投递成功！', [], 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', [], 200);
        }
    }

    //检验职位是否已投递
    public function checkDeliveryPos() {

        $map['user_id'] = input('param.user_id');

        $map['pos_id'] = input('param.pos_id');

        $query = db('position_delivery')->where($map)->find();

        if($query){
            return  show(config('code.success'), '该职位已投递！', [], 200);
        }else{
            return  show(config('code.error'), '该职位未投递', [], 200);
        }
    }

    //收藏职位
    public function collectPosition() {

        $user_id = input('param.user_id');

        $pos_id  = input('param.pos_id');

        $result = model('Position')->collectPos($user_id,$pos_id);

        if($result){
            return  show(config('code.success'), '收藏成功！', [], 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', [], 200);
        }
    }

    //检查当前职位是否已经被收藏
    public function checkCollect(){

        $user_id = input('param.user_id');

        $pos_id  = input('param.pos_id');

        $map['user_id'] = input('param.user_id');

        $map['pos_id'] = input('param.pos_id');

        $query = db('position_collect')->where($map)->find();

        if($query){
            return  show(config('code.success'), '该职位已收藏！', [], 200);
        }else{
            return  show(config('code.error'), '该职位未收藏', [], 200);
        }
    }
}