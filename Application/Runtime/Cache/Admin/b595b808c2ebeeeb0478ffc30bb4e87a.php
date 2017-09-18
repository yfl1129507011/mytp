<?php if (!defined('THINK_PATH')) exit(); if (C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>后台管理首页</title>
<link rel="stylesheet" href="/Public/Admin/css/admin.css" />
<script type="text/javascript">
    <!--
    if(self != top){
        top.location = self.location;
    }
    //-->
</script>
</head>
<body>
	<div class="head_left">
		<div class="logo">
			<a target="_top" href="<?php echo U('index');?>"><img src="/Public/Admin/img/logo.png" title="后台管理首页" /></a>
		</div>
	</div>
	<div class="head_right">
		<div class="main">
			<span class="operate">
				<a class="home" href="http://<?php echo ($_SERVER['HTTP_HOST']); ?>" target="_blank" title="网站前台">前台首页</a>
				<a class="back" href="<?php echo U('Public/logout');?>" target="_top" onclick="return confirm('确认退出');" title="退出登录">注销登录</a>
			</span>
			<ul class="menu">
                <li>
                    <a target="main" href="<?php echo U('Index/main');?>" class="menu-name active"> 首页</a>
                    <ul class="menu_list" >
                        <li><a target="main" href="<?php echo U('Index/main');?>" class="active">系统信息</a></li>
                        <li><a target="main" href="<?php echo U('Index/info');?>?mid=<?php echo session('user_auth.uid');?>">修改个人信息</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" href="<?php echo U('Member/index');?>" class="menu-name"> 管理员管理</a>
                    <ul class="menu_list" style="display:none">
                        <li><a target="main" href="<?php echo U('Member/index');?>">管理员列表</a></li>
                    </ul>
                </li>
                <!--<li>
                    <a target="main" href="javascript:;" class="menu-name"> 会员管理</a>
                    <ul class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:;">会员列表</a></li>
                    </ul>
                </li>-->
            </ul>
		</div>
		<div class="admin_path">
			<span class="info">您好！<strong title="<?php echo session('user_auth.username');?>" style="color:green;font-size:14px;"><?php echo session('user_auth.username');?></strong>，欢迎您的光临。</span>
			<span class="path">
				<!--<a target="main" href="javascript:;"> 开始</a>&nbsp;&nbsp;/&nbsp;&nbsp;后台首页-->
			</span>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="admin_main">
		<iframe name="main" src="<?php echo U('main');?>" scrolling="auto" width="100%" height="100%" style="border:none;"></iframe>
    </div>
</body>
</html>
<script type="text/javascript" src="/Public/Static/js/jquery.min.js"></script>
<script>
    $(function(){
        $('.menu').on('click', '.menu-name', function(){
            var self = $(this);
            if(self.hasClass('active')) return;
            $('.menu-name').removeClass('active');
            self.addClass('active');
            $('.menu_list').hide();
            var selfList = self.parent().find('.menu_list');
            selfList.show();
            selfList.find('a').removeClass('active');
            selfList.find('a').eq(0).addClass('active');
        });

        $('.menu_list').on('click', 'a', function(){
            if($(this).hasClass('active')) return;
            $(this).parents('.menu_list').find('a').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>