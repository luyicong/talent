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

return [
    '__pattern__' => [
        'name' => '\w+',
    ]
];

Route::get('admin/index', 'admin/Index/index');


Route::get('api/:ver/cate', 'api/:ver.cate/read');
//首页数据路由
Route::get('api/:ver/index', 'api/:ver.index/getIndexData');
//招聘职位列表路由
Route::get('api/:ver/position', 'api/:ver.position/getPositionList');
//根据职位id获取职位详情
Route::get('api/:ver/positionDetail/:id', 'api/:ver.position/getPosDetail');
//申请/投递职位
Route::post('api/:ver/deliveryPosition', 'api/:ver.position/deliveryPosition');
//检查职位已投递
Route::get('api/:ver/checkDelivery', 'api/:ver.position/checkDeliveryPos');
//收藏职位
Route::post('api/:ver/collectPos', 'api/:ver.position/collectPosition');
//检查职位已被收藏
Route::get('api/:ver/checkCollect', 'api/:ver.position/checkCollect');

//企业列表路由
Route::get('api/:ver/company', 'api/:ver.company/getCompanyList');
//企业详情路由
Route::get('api/:ver/companyDetail/:id', 'api/:ver.company/getCompanyDetail');
//人才求职列表路由
Route::get('api/:ver/resume', 'api/:ver.resume/getResumeList');
//求职详情路由
Route::get('api/:ver/resumeDetail/:id', 'api/:ver.resume/getResumeDetail');

//搜索
Route::get('api/:ver/search','api/:ver.search/search');

//用户相关
//注册
Route::post('api/:ver/register', 'api/:ver.user/register');
//登录
Route::get('api/:ver/login', 'api/:ver.user/login');
//获取用户信息
Route::get('api/:ver/getUserInfo/:id', 'api/:ver.user/getUserInfo');
//用户更新简历
Route::post('api/:ver/upDateResume', 'api/:ver.user/upDateResume');
//用户收藏列表
Route::get('api/:ver/collectList/:id', 'api/:ver.user/CollectList');
//用户取消收藏
Route::get('api/:ver/cancelCollect', 'api/:ver.user/cancelCollect');
//获取投递职位列表
Route::get('api/:ver/deliveryList/:user_id', 'api/:ver.user/deliveryList');
//用户取消职位投递
Route::get('api/:ver/cancelDelivery', 'api/:ver.user/cancelDelivery');

