<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="/Public/Admin/css/main.css" />
<script type="text/javascript" src="/Public/Static/js/jquery.min.js"></script>
</head>
<body>
    <div class="main">
<div class="table-class">
	<div class="head"><strong>修改个人信息</strong></div>
	<form action="/index.php/Admin/Index/info.html?mid=21" method="post">
	<table id="box">
		<tr>
			<th>管理员名称</th>
			<td><input class="input" type="text" name="admin_name" value="<?php echo ($_info["username"]); ?>"></td>
		</tr>
		<tr>
			<th>登录密码</th>
			<td><input class="input" type="password" name="password"><span class="check-tips">（用户密码不能少于6位）</span></td>
		</tr>
		<tr>
			<th>确认密码</th>
			<td><input class="input" type="password" name="repassword"></td>
		</tr>
		<tr>
			<th>email地址</th>
			<td><input class="input" type="text" name="email" value="<?php echo ($_info["email"]); ?>"></td>
		</tr>
		<tr>
			<th>手机号</th>
			<td><input class="input" type="text" name="mobile" value="<?php echo ($_info["mobile"]); ?>"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="mid" value="<?php echo ($_info["mid"]); ?>"></td>
			<td><input class="submit" type="submit" value="确认提交"></td>
		</tr>
	</table>
    </form>
</div>
    </div><div style="height:41px;"></div>
    <div class="footer">
	   <span>保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</span>
	</div>