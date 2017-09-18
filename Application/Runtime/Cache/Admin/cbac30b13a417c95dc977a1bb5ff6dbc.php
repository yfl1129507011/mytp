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
	<div class="head"><strong><?php if($_action == 'add'): ?>添加<?php else: ?>编辑<?php endif; ?>管理员</strong></div>
	<div class="operate align-r">
		<input type="button" class="button border-green" value="返回列表" onclick="location.href='<?php echo U('index');?>'" />
	</div>
	<form action="<?php echo U($_action);?>" method="post" class="form">
	<table>
		<tr>
			<th>用户名称</th>
			<td><input class="input" type="text" name="username" value="<?php echo ($_info["username"]); ?>"><span class="check-tips">（用户名会作为默认的昵称）</span></td>
		</tr>
		<tr>
			<th>登录密码</th>
			<td><input <?php if($_action == 'add'): ?>value="123456"<?php endif; ?> class="input" type="password" name="password" /><span class="check-tips">（用户密码不能少于6位,默认密码123456）</span></td>
		</tr>
		<tr>
			<th>确认密码</th>
			<td><input <?php if($_action == 'add'): ?>value="123456"<?php endif; ?> class="input" type="password" name="repassword" /></td>
		</tr>
		<!--<tr>
			<th>管理员类型</th>
			<td>
				<select name="role_id">
				    <option value="0">-请选择类型-</option>
				<?php if(is_array($role_list)): foreach($role_list as $key=>$value): ?><option value="<?php echo ($value["role_id"]); ?>"><?php echo ($value["role_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>-->
		<tr>
			<th>邮箱地址</th>
			<td><input class="input" type="text" name="email" value="<?php echo ($_info["email"]); ?>"><span class="check-tips">（用户邮箱地址）</span></td>
		</tr>
		<tr>
			<th>手机号码</th>
			<td><input class="input" type="text" name="mobile" value="<?php echo ($_info["mobile"]); ?>"><span class="check-tips">（用户手机号码）</span></td>
		</tr>
		<tr>
			<td><input type="hidden" name="mid" value="<?php echo ($_info["mid"]); ?>"></td>
			<td><input class="submit" type="submit" value="确认提交" id="form-submit"><span class="form-check"></span></td>
		</tr>
	</table>
    </form>
</div>
<script>
	$(function(){
		$('#form-submit').click(function(){
			var query = $('.form').serialize();
			var target = $('.form').get(0).action;

			$.post(target, query, function(data){
				if(data.status == 1){
					location.href = data.url;
				}else{
					$('.form-check').text(data.info);
				}
			}, 'json');

			return false;
		});
	});
</script>
    </div><div style="height:41px;"></div>
    <div class="footer">
	   <span>保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</span>
	</div>