<?php

namespace app\api\behavior;


use think\Exception;
use think\Response;

class CORS
{
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET,POST,OPTIONS');
        header("Content-Type: application/json; charset=utf-8");
        if (request()->isOptions()) {
            exit();
        }
    }
}