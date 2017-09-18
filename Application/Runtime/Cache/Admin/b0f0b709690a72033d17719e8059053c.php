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
<div class="sys_info">
	<div class="head"><strong>系统信息</strong></div>
	<table>
		<tr class="title">
			<th align="left" colspan="2" width="50%">服务器信息</th>
			<th align="left" colspan="2" width="50%">系统基本信息</th>
		<tr>
		<tr>
			<td>服务器操作系统：</td>
			<td><?php echo (PHP_OS); ?></td>
			<td>总策划：</td>
			<td>杨飞龙</td>
		</tr>
		<tr>
			<td>运行环境：</td>
			<td><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></td>
			<td>官方网址：</td>
			<td><a style="color: green" href="http://<?php echo ($_SERVER['HTTP_HOST']); ?>"><?php echo ($_SERVER['HTTP_HOST']); ?></a></td>
		</tr>
		<tr>
			<td>MYSQL版本：</td>
			<?php $system_info_mysql = M()->query("select version() as v;"); ?>
			<td><?php echo ($system_info_mysql["0"]["v"]); ?></td>
			<td>系统名称：</td>
			<td>后台管理系统</td>
		</tr>
		<tr>
			<td>上传限制：</td>
			<td><?php echo ini_get('upload_max_filesize');?></td>
			<td>产品团队：</td>
			<td>FenLon</td>
		</tr>
	</table>
</div>
<div style="height: 30px"></div>
<div class="site">
	<div class="head"><strong>站点统计</strong></div>
	<ul class="list">
		<li><b>会员总数</b><a class="model-g" href="javascript:void();">88</a></li>
		<li><b>用户行为数</b><a class="model-g" href="javascript:void();">288</a></li>
	</ul>
</div>
<!--<div class="schedule">
	<div class="head"><strong>网站后台待办事项</strong></div>
	<ul class="list">
		<li><b>认证待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>vip待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>借款额度申请:</b><a class="model-r" href="#">88</a></li>
		<li><b>逾期待处理:</b><a class="model-r" href="#">88</a></li>
		<li><b>发标待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>满标待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>充值待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>提现待审核:</b><a class="model-r" href="#">88</a></li>
	</ul>
</div>-->
    </div><div style="height:41px;"></div>
    <div class="footer">
	   <span>保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</span>
	</div>