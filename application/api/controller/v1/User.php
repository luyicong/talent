<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/9
 * Time: 10:58
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class User extends Common
{
    //用户注册
    public function register() {

        $params = input('post.');
        //校验用户名
        if(empty($params['user_name'])) {
            return  show(config('code.error'), '用户名不合法', '', 404);
        }
        //检验密码
        if(empty($params['password'])) {
            return  show(config('code.error'), '密码不合法', '', 404);
        }

        //查询用户名是否已存在
        $user = db('user')->where('user_phone',$params['user_name'])->find();

        if($user){
            return  show(config('code.error'), '该手机号已注册', '', 404);
        }

//        halt($params);

        $result = model('user')-> userRegist($params);

        if($result){
            return  show(config('code.error'), '恭喜您，注册成功！', $result, 404);
        }
    }

    //用户登录
    public function login() {

    }
}