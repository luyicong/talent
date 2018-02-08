<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get('api/:ver/cate', 'api/:ver.cate/read');
//首页数据路由
Route::get('api/:ver/index', 'api/:ver.index/getIndexData');
//招聘职位列表路由
Route::get('api/:ver/position', 'api/:ver.position/getPositionList');
//根据职位id获取职位详情
Route::get('api/:ver/positionDetail/:id', 'api/:ver.position/getPosDetail');
//企业列表路由
Route::get('api/:ver/company', 'api/:ver.company/getCompanyList');
//企业详情路由
Route::get('api/:ver/companyDetail/:id', 'api/:ver.company/getCompanyDetail');
//人才列表路由
Route::get('api/:ver/resume', 'api/:ver.resume/getResumeList');
