<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/Public/Static/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/register.css">
  <title>FenLon平台-注册</title>
</head>
<body>
<div id="login_warp" class="clearfix">
  <div id="logo_content">
    <div class="logo_title clearfix">
      <h1>FenLon</h1>
      <div class="logo_words">FenLon</div>
    </div>
  </div>
  <div id="login_content">
    <h3>用户注册</h3>
    <form action="<?php echo U();?>" class="login_form" id="login_form">
      <div class="input_warp">
        <span>手机</span>
        <input type="text" class="account" value="" id="userName" name="username"/>
      </div>
      <div class="alertbox"><span class="usererrorspan"></span></div>
      <div class="input_warp">
        <span>密码</span>
        <input type="password" class="password" value="" id="passWord" name="password"/>
      </div>
      <div class="alertbox"><span class="pwderrorspan"></span></div>
      <div class="idencode">
        <input type="text" class="c_code_msg" placeholder="请输入验证码" name="code" style="margin-right: 10px;">
        <span class="msgs" id="getCode" >获取短信验证码</span>
      </div>
      <div class="alertbox"><span class="codeerrorspan"></span></div>
      <div class="form_button">
        <input type="button" id="userlogin" value="免费注册" />
      </div>
      <div class="form-checkbox">
        <span class="backLogin" onclick="location.href='<?php echo U("login");?>'">返回登录</span>
        <div class="error"></div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
<script src="/Public/Static/js/jquery.min.js"></script>
<script>
  function checkPhone(){
    var phone = $.trim($('#userName').val());
    if(!/^1[34578]\d{9}$/.test(phone)){
      $('.usererrorspan').text('请输入正确的手机号');
      return false;
    }else{
      $('.usererrorspan').text('');
      return phone;
    }
  }

  $(function () {
    $('#getCode').click(function(){
      var phone = checkPhone();
      if(phone){
        var time = 60;
        var self = $(this);
        var target = '<?php echo U("getCode");?>';
        $.post(target,{phone:phone},function(data){
          if(data.status){
            self.addClass('msgs1');
            var t = setInterval(function(){
              time--;
              self.text(time+'秒');
              if(time == 0){
                clearInterval(t);
                self.text('重新获取');
                self.removeClass('msgs1');
              }
            }, 1000);
          }else{
            $('.codeerrorspan').text('获取验证码错误');
          }
        },'json');
      }
    });

    $("#login_form").submit(function(){
      var self = $(this);
      $.post(self.attr("action"), self.serialize(), success, "json");
      return false;

      function success(data){
        $('.error').html(data.msg);
        if(data.status){
          $('.error').css('color','green');
          setTimeout(function () {
            window.location.href = data.url;
          }, 3000);
        }
      }
    });

    $('#userlogin').click(function(){
      if(checkPhone()){
        if($('#passWord').val().length < 6){
          $('.pwderrorspan').text('密码长度不得小于6位');return;
        }
        $("#login_form").submit();
      }
    });

  });
</script>