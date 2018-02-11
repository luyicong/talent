<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/9
 * Time: 10:58
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

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
//        halt($data);
        $result = model('user')->userLogin($data);

        if($result){
            return  show(config('code.success'), '恭喜您，登录成功！', $result, 200);
        }else{
            return  show(config('code.error'), '用户名或密码不正确', $result, 200);
        }
    }
}