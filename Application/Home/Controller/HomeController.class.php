<?php
/**
 * Created by PhpStorm.
 * User: hylanda69874
 * Date: 2017/6/13
 * Time: 11:32
 */
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller{

    /* 用于输出404页面 */
    public function _empty(){
        $this->error('页面不存在！', U('Index/index'));
    }

    protected function _initialize(){
        $uid = is_login();
        if(!$uid){
            header('Location: ' . U('User/login'));exit;
        }
        define('UID', $uid);
    }

}