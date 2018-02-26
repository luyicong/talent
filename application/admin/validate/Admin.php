<?php
/**
 * Created by PhpStorm.
 * User: LYC
 * Date: 2017/5/20
 * Time: 15:26
 */
namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    //声明验证规则
    protected $rule = [
        'admin_name'=>'require',
        'admin_password'=>'require'
    ];
    //声明验证提示信息
    protected $message = [
        'admin_name.require'=>'请输入用户名!',
        'admin_password.require'=>'请输入密码!',
    ];
}
