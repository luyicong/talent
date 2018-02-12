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
    protected $auto = ['user_id','create_time','update_time'];

    public function userRegist($data) {

        $data['create_time'] = time();

        $data['user_phone'] = $data['user_name'];

        return db('user')->insert($data);

    }

    public function userLogin($data){


        $query = db('user')
            ->where([
                'user_phone|user_email' => $data['user_name'],
                'password' => $data['password']
            ])->find();
        $userInfo = db('resume')->where('user_id',$query['user_id'])->find();

        $userInfo['user_name'] = $query['user_name'];

        return $userInfo;
    }

    //用户基本信息，用户简历信息
    public function getUserInfo($user_id){

        $query = db('resume')->where('user_id',$user_id)->find();

        return $query;
    }

    //更新简历信息
    public function upDtaeresume($data) {
//        halt($data);
        $query = db('resume')

            ->where('user_id',$data['user_id'])

            ->update($data);

        return $query;
    }
}