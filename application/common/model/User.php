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

    //获取用户收藏列表
    public function getCollectList($user_id){

        $query = db('position_collect')

            ->alias('pc')
            //关联职位表查询
            ->join('__POSITION__ p','pc.pos_id = p.pos_id')
            //关联企业表查询
            ->join('__COMPANY__ c','p.comp_id = c.comp_id')
            //需要什么字段就从相应的表中提取出来,并分页
            ->field('pc.collect_id,p.pos_id,p.pos_name,pc.collect_time,c.comp_name')
            //查询条件
            ->where('user_id',$user_id)

            ->select();

        //时间格式装还
        foreach ($query as &$item) {
            $item['collect_time'] = transfTime($item['collect_time']);
        }

        return $query;
    }
}