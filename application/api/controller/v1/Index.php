<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 10:38
 */

namespace app\api\controller\v1;


use app\api\controller\Common;
use think\Cache;

class Index extends Common
{
    public function getIndexData(){

        $cache_model = new Cache();
        $cache_key = 'cate_list';
        $cache_expire_time = 1200;
        $cate_info = $cache_model->get($cache_key);
        if($cate_info){

            $cates = $cate_info;

        }else{

            $cates = model('Cate')->getCate();

            $cache_model->set($cache_key,$cates,$cache_expire_time);
        }
        //首页分类
//        $cates = model('Cate')->getCate();

        //首页企业列表
        $companys = model('CompanyList')->getCompanyListForIndex();

        //获取求职列表
        $resumes = model('Resume')->getResumeListForIndex();

        //获取招聘列表
        $positions = model('Position')->getPosListForIndex();

        $result = [
            'cateList' => $cates,
            'companyList' => $companys,
            'resumeList' => $resumes,
            'positionList' => $positions
        ];
        return show(config('code.success'), 'OK', $result, 200);
    }
}