<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/9
 * Time: 10:58
 */

namespace app\api\controller\v1;

use app\api\controller\Common;

use houdunwang\crypt\Crypt;
use think\Response;
class User extends Common
{
    //用户注册
    public function register() {

        $params = input('post.');
        //校验用户名
//        halt($params);
        if(empty($params['user_name'])) {
            return  show(config('code.error'), '用户名不合法', '', 200);
        }
        //检验密码
        if(empty($params['password'])) {
            return  show(config('code.error'), '密码不合法', '', 200);
        }

        //查询用户名是否已存在
        $user = db('user')->where('user_phone',$params['user_name'])->find();

        if($user){
            return  show(config('code.error'), '该手机号已注册', '', 200);
        }

        $result = model('User')->userRegist($params);

        if($result){
            return  show(config('code.success'), '恭喜您，注册成功！', $result, 200);
        }
    }

    //用户登录
    public function login() {

        $data = input('get.');

//        halt($data);

        $result = model('User')->userLogin($data);


        if($result){
            return  show(config('code.success'), '恭喜您，登录成功！', $result, 200);
        }else{
            return  show(config('code.error'), '用户名或密码不正确', [], 200);
        }
    }

    //获取用户基本信息，包括简历
    public function getUserInfo() {

        $result = model('User')->getUserInfo(input('param.id'));

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }

    //用户修改密码
    public function upDatePwd() {

        $param = input('post.');

        //判断旧密码是否正确
        $oldPwd = db('user')->where('user_name',$param['user_name'])->value('password');
        if($oldPwd != $param['oldpwd']){
            return  show(0, '旧密码不正确！', [], 200);
        }

        $query = db('user')->where('user_name',$param['user_name'])->setField('password',$param['password']);

        if($query) {
            return show(config('code.success'), '修改成功！', [], 200);
        }else{
            return show(config('code.error'), '服务器内部错误！', [], 200);
        }
    }
    //用户更新简历
    public function upDateResume() {

        $params = input('post.');

        foreach ($params as $k=>$v){

            if($k == 'id') unset($params[$k]);

            if($k == 'user_name') unset($params[$k]);
        }

        $params['update_time'] = time();

        $result = model('User')->upDtaeresume($params);

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', $result, 200);
        }
    }

    //用户职位收藏列表
    public function CollectList() {

        $user_id = input('param.id');

        $result = model('User')->getCollectList($user_id);

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }

    //取消某一个职位的收藏
    public function cancelCollect() {

        $result = db('position_collect')->where('collect_id',input('param.c_id'))->delete();

        if($result){
            return  show(config('code.success'), '取消成功！', [], 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', [], 200);
        }
    }
    //用户投递列表
    public function deliveryList() {

        $result = model('User')->getDeliveryList(input('param.user_id'));

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', $result, 200);
        }
    }

    //取消职位投递
    public function cancelDelivery() {

        $result = db('position_delivery')->where('delivery_id',input('param.d_id'))->delete();

        if($result){
            return  show(config('code.success'), '取消成功！', [], 200);
        }else{
            return  show(config('code.error'), '服务器内部错误', [], 200);
        }
    }
}