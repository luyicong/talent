<?php

namespace app\api\behavior;


use think\Exception;
use think\Response;

class CORS
{
//    public function appInit(&$params)
//    {
//        header('Access-Control-Allow-Origin: *');
//        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
//        header('Access-Control-Allow-Methods: GET,POST,OPTIONS');
//        header("Content-Type: application/json; charset=utf-8");
////        Response.setHeader("Access-Control-Allow-Origin","*");
////        Response.setHeader("Access-Control-Allow-Methods","GET,POST");
////        header('Access-Control-Allow-Origin: *');
////        header("Access-Control-Allow-Headers: Content-Type");
////        header('Access-Control-Allow-Methods: GET,POST,OPTIONS');
//        if (request()->isOptions()) {
////            halt('111111');
//            HttpResponseException();
//        }
//    }
    public function run(&$dispatch){
        $host_name = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "*";
        $headers = [
            "Access-Control-Allow-Origin" => $host_name,
            "Access-Control-Allow-Credentials" => 'true',
            "Access-Control-Allow-Headers" => "x-token,x-uid,x-token-check,x-requested-with,content-type,Host"
        ];
        if($dispatch instanceof Response) {
            $dispatch->header($headers);
        } else if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            $dispatch['type'] = 'response';
            $response = new Response('', 200, $headers);
            $dispatch['response'] = $response;
        }
    }
}