<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/12
 * Time: 14:58
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Search extends Common
{
    //职位搜索
    public function search() {
        $params = input('get.');

//        halt($params);
        if($params['type'] == 'pos'){
            $res = model('Search')->searchByPosition($params['key']);
//            halt($res);
        }

        if($params['type'] == 'talent'){
            $res = model('Search')->searchByTalent($params['key']);
//            halt($res);
        }

        if($params['type'] == 'comp'){
            $res = model('Search')->searchByCompany($params['key']);
//            halt($res);
        }

//        if($res){
            return  show(config('code.success'), '操作成功！', $res, 200);
//        }else{
//            return  show(config('code.success'), '服务器内部错误', $res, 200);
//        }
    }
}