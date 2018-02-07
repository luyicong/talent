<?php
/**
 * Created by PhpStorm.
 * User: zhujia100_L
 * Date: 2018/2/7
 * Time: 10:38
 */

namespace app\api\controller\v1;


use app\api\controller\Common;

class Index extends Common
{
    public function getIndexData(){
        //首页分类
        $cates = model('Cate')->getCate();

        //首页企业列表
        $companys = model('CompanyList')->getCompanyList();

        //获取求职列表
        $resumes = model('Resume')->getResumeList();

        //获取招聘列表
        $positions = model('Position')->getPosList();

        $result = [
            'cateList' => $cates,
            'companyList' => $companys,
            'resumeList' => $resumes,
            'positionList' => $positions
        ];

        return show(config('code.success'), 'OK', $result, 200);
    }
}