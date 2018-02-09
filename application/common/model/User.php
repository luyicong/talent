<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/9
 * Time: 11:00
 */

namespace app\common\model;


use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;
    //tp5的自动完成机制
    protected $auto = ['user_id','create_time'];

    public function userRegist($data) {

        $data['create_time'] = time();

        $data['user_phone'] = $data['user_name'];

        return db('user')->insert($data);

    }
}