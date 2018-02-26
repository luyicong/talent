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
//    protected $autoWriteTimestamp = true;
    //tp5的自动完成机制
//    protected $auto = ['user_id','create_time','update_time'];
    //用户注册
    public function userRegist($data) {

        $data['create_time'] = time();

        $data['user_phone'] = $data['user_name'];

        $data['password'] = md5($data['password']);

        //添加用户信息
        $user = db('user')->insert($data);

        $userInfo = db('user')->where('user_phone',$data['user_name'])->find();

        //简历一份空简历
        $userResume = db('resume')->insert(['user_id'=>$userInfo['user_id'],'update_time'=>time()]);

        return $userInfo;

    }

    //用户登录
    public function userLogin($data){

        $query = db('user')
            ->where([
                'user_phone|user_email' => $data['user_name'],
                'password' => $data['password']
            ])->find();

//        halt($query);

        if($query){

            $userInfo = db('resume')->where('user_id',$query['user_id'])->find();

            $userInfo['user_id'] = $query['user_id'];

            $userInfo['user_name'] = $query['user_name'];
        }else{
            return $query;
        }

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
//        halt($query);
        return $query;
    }

    //获取用户收藏列表
    public function getCollectList($user_id){

        $query = db('position_collect')

            ->alias('pc')
            //关联职位表查询
            ->join('__POSITION__ p','pc.pos_id = p.pos_id')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来
            ->field('pc.collect_id,p.pos_id,p.pos_name,pc.create_time,c.comp_name')
            //查询条件
            ->where('user_id',$user_id)

            ->select();

        //时间格式装还
        foreach ($query as &$item) {
            $item['create_time'] = transfTime($item['create_time']);
        }

        return $query;
    }

    //获取用户投递列表
    public function getDeliveryList($user_id) {

        $query = db('position_delivery')

            ->alias('pd')
            //关联职位表
            ->join('__POSITION__ p','pd.pos_id = p.pos_id')
            //关联企业表
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来
            ->field('pd.delivery_id,p.pos_id,p.pos_name,pd.create_time,c.comp_name')
            //查询条件
            ->where('user_id',$user_id)

            ->select();

        //时间格式装还
        foreach ($query as &$item) {
            $item['create_time'] = transfTime($item['create_time']);
        }
        return $query;

    }
}