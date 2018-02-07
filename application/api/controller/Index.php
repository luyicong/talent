<?php
namespace app\api\controller;

class Index
{
    public function index()
    {
        $user = db('user')->select();
        $cates = db('cate')->select();
        $companys = db('company')->select();
        $poss = db('position')->select();
        $userResume = db('resume')->select();
        halt($poss);
    }
}
