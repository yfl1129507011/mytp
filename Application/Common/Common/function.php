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
    $user = session('user_auth_'.strtolower(MODULE_NAME));
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign_'.strtolower(MODULE_NAME)) == data_auth_sign($user) ? $user['uid'] : 0;
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
        //var_dump($error);die;
        return false;
    }
    return $output;
}


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


/**
 * 验证手机号是否正确
 * @param INT $mobile
 * @return bool
 */
function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}

/**
 * 验证邮箱是否正确
 * @param INT $email
 * @return bool
 */
function isEmail($email) {
    return preg_match('#^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$#', $email) ? true : false;
    //return preg_match('#^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$#', $email) ? true : false;
}

/**
 * xss过滤函数
 *
 * @param $string
 * @return string
 */
function remove_xss($string)
{
    $string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $string);

    $parm1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');

    $parm2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload', 'prompt');

    $parm = array_merge($parm1, $parm2);

    for ($i = 0; $i < sizeof($parm); $i++) {
        $pattern = '/';
        for ($j = 0; $j < strlen($parm[$i]); $j++) {
            if ($j > 0) {
                $pattern .= '(';
                $pattern .= '(&#[x|X]0([9][a][b]);?)?';
                $pattern .= '|(&#0([9][10][13]);?)?';
                $pattern .= ')?';
            }
            $pattern .= $parm[$i][$j];
        }
        $pattern .= '/i';
        $string = preg_replace($pattern, ' ', $string);
        $string = preg_replace('/\(/', ' ', $string);
        $string = preg_replace('/\)/', ' ', $string);
    }
    return $string;
}