<?php
/**
 * Created by PhpStorm.
 * User: yangfeilong
 * Date: 2017/5/26
 * Time: 15:06
 */

/**
 * 检测验证码
 * @param $code
 * @param  integer $id 验证码ID
 * @return bool 检测结果
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/**
 * 密码加密
 * @param $word
 * @param string $key
 * @return string
 */
function md5_sha1($word, $key = 'fenlon'){
    return empty($word)?'':md5(sha1($word).$key);
}