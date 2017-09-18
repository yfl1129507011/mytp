<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="/Public/Admin/css/main.css" />
<script type="text/javascript" src="/Public/Static/js/jquery-2.0.3.min.js"></script>
</head>
<body>
    <div class="main">
<div class="table-class">
	<div class="head"><strong>用户列表</strong></div>
	<div class="operate">
		<input type="button" class="button check-all" value="全选" all="false" />
		<input type="button" class="button border-green" value="添加用户" onclick="location.href='<?php echo U('add');?>'" />
		<input type="button" class="button border-blue " value="批量禁用" />
		<input type="button" class="button border-red ajax-get bulk confirm" value="批量刪除" query="<?php echo U('del');?>" />
		<div class="search">
			<input type="text" name="nickname" class="search-input" value="<?php echo ($_username); ?>" placeholder="请输入用户昵称或者ID">
			<a class="sch-btn" href="javascript:;" id="search" url="<?php echo U('index');?>"><i class="btn-search"></i></a>
		</div>
	</div>
	<table id="box" class="center">
		<tr class="title">
			<th>选择</th>
			<th>ID编号</th>
			<th>用户名称</th>
			<th>邮箱</th>
			<th>手机号</th>
			<th>最后登陆IP</th>
			<th>最后登陆时间</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
		<?php if(!empty($_list)): if(is_array($_list)): foreach($_list as $k=>$value): ?><tr>
			<td><input class="ids" type="checkbox" name="ids[]" value="<?php echo ($value["uid"]); ?>" /></td>
			<td><?php echo ($k+1); ?></td>
			<td><?php echo ($value["username"]); ?></td>
			<td><?php echo ((isset($value["email"]) && ($value["email"] !== ""))?($value["email"]):'***'); ?></td>
			<td><?php echo ((isset($value["mobile"]) && ($value["mobile"] !== ""))?($value["mobile"]):'***'); ?></td>
			<td><?php echo long2ip($vo['last_login_ip']);?></td>
			<td><?php echo (date('Y-m-d H:i:s',$value["last_login_time"])); ?></td>
			<td><?php echo (date('Y-m-d H:i:s',$value["reg_time"])); ?></td>
			<td align="center">
				<input type="button" class="button border-blue ajax-get" value="修改" query="<?php echo U('edit?uid='.$value['uid']);?>" />
				<input type="button" class="button border-red confirm ajax-get" value="删除" query="<?php echo U('del?uid='.$value['uid']);?>" />
			</td>
		</tr><?php endforeach; endif; endif; ?>
	</table>
	<div class="page"></div>
</div>
<script>
	$(function(){
		//回车搜索
		$(".search-input").keyup(function(e){
			if(e.keyCode === 13){
				$("#search").click();
				return false;
			}
		});
		$('#search').on('click', function () {
			var username = $('.search-input').val();
			if(!username) username = '';
			var url = $(this).attr('url');
			location.href = url+'?username='+username;
		});
		//全选的实现
		$('.check-all').on('click', function(){
			var all = $(this).attr('all');
			var check = (all=='false')?true:false;
			$('.ids').prop('checked', check);
			$(this).attr('all',check);
		});
		$(".ids").click(function(){
			var option = $(".ids");
			option.each(function(i){
				if(!this.checked){
					$(".check-all").attr("all", false);
					return false;
				}else{
					$(".check-all").attr("all", true);
				}
			});
		});

		$('.ajax-get').click(function(){
			if($(this).hasClass('confirm')){
				var _name = $(this).val();
				var _params = {};
				if(confirm('确定要'+_name+'?')){
					var query = $(this).attr('query');
					if(!query) return;
					if($(this).hasClass('bulk')){
						var uids = []
						$('.ids:checked').each(function(i){
							uids[i] = this.value;
						});
						console.log(uids);
						if(uids.length == 0){
							alert('请选择要'+_name+'的用户！');return;
						}
						_params.uid = uids;
					}
					$.get(query,_params).success(function(data){
						if(data.status == 1){
							if(data.url){
								location.href = data.url;
							}else{
								location.reload();
							}
						}else{
							alert(data.info);
						}
					});
				}
			}else{
				var query = $(this).attr('query');
				if(!query) return;
				location.href = query;
			}
		});
	});
</script>
    </div><div style="height:41px;"></div>
    <div class="footer">
	   <span>保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</span>
	</div>