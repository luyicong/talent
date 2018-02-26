<?php
namespace app\admin\controller;

use think\Controller;

use app\admin\controller\Common;

class Index extends Common
{
    public function index()
    {
        return $this->fetch();
    }
}
