<?php
/**
 * Created by PhpStorm.
 * User: hylanda69874
 * Date: 2017/6/12
 * Time: 14:49
 */
namespace Home\Controller;

/**
 * 前台首页控制器
 */
class PublicController extends \Think\Controller {

    public function login(){
        $this->display('login');
    }

    public function register(){
        $this->display();
    }

    public function getCode($phone=''){
        echo json_encode(['status'=>1]);exit;
    }

}