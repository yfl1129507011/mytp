<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="/Public/Admin/css/main.css" />
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
</head>
<body>
    <div class="main">
<div class="table-class">
	<div class="head"><strong>修改管理员</strong></div>
	<div class="operate align-r">
		<input type="button" class="button border-green" value="返回列表" onclick="location.href='<?php echo U('index');?>'" />
	</div>
	<form action="" method="post">
	<table id="box">
		<tr>
			<th>管理员名称</th>
			<td><input class="input" type="text" name="admin_name" value="<?php echo ($info["admin_name"]); ?>" /></td>
		</tr>
		<tr>
			<th>登录密码</th>
			<td><input class="input" type="password" name="admin_pwd" /></td>
		</tr>
		<tr>
			<th>确认密码</th>
			<td><input class="input" type="password" name="check_pwd" /></td>
		</tr>
		<tr>
			<th>管理员类型</th>
			<td>
				<select name="admin_type">
				    <option value="0">-请选择类型-</option>
    				<?php if(is_array($role_list)): foreach($role_list as $key=>$value): if($value["role_id"] == $info['role_id']): ?><option value="<?php echo ($value["role_id"]); ?>" selected="selected">
    				<?php else: ?>
    				    <option value="<?php echo ($value["role_id"]); ?>"><?php endif; ?>
    					<?php echo ($value["role_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>email地址</th>
			<td><input class="input" type="text" name="email" value="<?php echo ($info["email"]); ?>" /></td>
		</tr>
		<tr>
			<th>手机号</th>
			<td><input class="input" type="text" name="phone" value="<?php echo ($info["phone"]); ?>" /></td>
		</tr>
		<tr>
			<td></td>
            <td>
                <input class="submit" type="submit" value="确认提交" />
                <input type="hidden" name="admin_id" value="<?php echo ($info["admin_id"]); ?>" >
            </td>
		</tr>
	</table>
    </form>
</div>
    </div><div style="height:41px;"></div>
    <div class="footer">
	   <span>保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</span>
	</div>