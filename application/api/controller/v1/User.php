<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/9
 * Time: 10:58
 */

namespace app\api\controller\v1;

//use houdunwang\crypt\Crypt;

//header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
//header('Access-Control-Allow-Methods: GET,POST,OPTIONS');
//if(request()->isOptions()){
//    exit();
//}

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

//        halt($params);

        $result = model('user')-> userRegist($params);

        if($result){
            return  show(config('code.success'), '恭喜您，注册成功！', $result, 200);
        }
    }

    //用户登录
    public function login() {

        $data = input('get.');

        $result = model('user')->userLogin($data);

        if($result){
            return  show(config('code.success'), '恭喜您，登录成功！', $result, 200);
        }else{
            return  show(config('code.error'), '用户名或密码不正确', [], 200);
        }
    }

    //获取用户基本信息，包括简历
    public function getUserInfo() {

//        halt(input('param.id'));

        $result = model('user')->getUserInfo(input('param.id'));

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
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

        $result = model('user')->upDtaeresume($params);

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }

    //用户职位收藏列表
    public function CollectList() {

        $user_id = input('param.id');

//        halt(time());

        $result = model('user')->getCollectList($user_id);

        if($result){
            return  show(config('code.success'), '操作成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }

    //取消某一个职位的收藏
    public function cancelCollect() {

        $result = db('position_collect')->where('collect_id',input('param.c_id'))->delete();

//        halt($result);

        if($result){
            return  show(config('code.success'), '取消成功！', $result, 200);
        }else{
            return  show(config('code.success'), '服务器内部错误', $result, 200);
        }
    }
}