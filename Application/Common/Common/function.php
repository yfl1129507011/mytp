<?php
/**
 * Created by PhpStorm.
 * User: yangfeilong
 * Date: 2017/5/8
 * Time: 11:32
 */

/**
 * 检测用户是否登录
 */
function is_login(){
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}

/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data) {
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}

/**
 * 获取PowerBI的Embed Token和配置
 * @param $appName
 * @return mixed|string
 */
function getPbCfg($appName){
    if(empty($appName)) return false;
    $appName = strtoupper($appName);
    vendor('JWT');
    $jwt = new JWT();
    $cfg = C($appName);
    if(empty($cfg)) return false;
    $param = array(
        'ver'  => '0.2.0',
        'aud'  => 'https://analysis.windows.net/powerbi/api',
        'iss'  => 'Power BI Node SDK',
        'type' => 'embed',
        'wcn'  => $cfg['WORKSPACE_NAME'],
        'wid'  => $cfg['WORKSPACE_ID'],
        'rid'  => $cfg['REPORT_ID'],
        'nbf'  => time(),
        'exp'  => time()+$cfg['TOKEN_EXPIRE']
    );
    $key = $cfg['PB_KEY'];
    $algo = $cfg['PB_ALGO'];

    $_token = S($appName.'_PB_TOKEN');
    if(empty($_token)){
        $_token = $jwt->encode($param,$key,$algo);
        S($appName.'_PB_TOKEN', $_token, ['expire'=>$cfg['TOKEN_EXPIRE']]);
    }

    return array(
        'type' => 'report',
        'accessToken' => $_token,
        'id' => $cfg['REPORT_ID'],
        //'name' => $cfg['WORKSPACE_NAME'],
        'embedUrl' => 'https://embedded.powerbi.cn/appTokenReportEmbed?reportId='.$cfg['REPORT_ID']
    );
}


//获取sign
function get_sign($paramAry){
    if(isset($paramAry['sign']))
        unset($paramAry['sign']);
    ksort($paramAry);
    $paramsTmp = array();
    foreach ($paramAry as $k => $v) {
        $paramsTmp[] = "$k=$v";
    }
    return md5(implode("&", $paramsTmp).'hylanda');
}


function curlHttp($url, $data=null, $timeout=0){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if(!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    if ($timeout > 0) { //超时时间秒
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    }
    $output = curl_exec($curl);
    $error = curl_errno($curl);
    curl_close($curl);

    if($error){
        var_dump($error);die;
        return false;
    }
    return $output;
}