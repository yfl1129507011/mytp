<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>号美平台-登录</title>
  <link rel="stylesheet" type="text/css" href="/Public/static/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/Public/haomei/css/login.css">
</head>
<body>
<div id="login_warp" class="clearfix">
  <div id="logo_content">
    <div class="logo_title clearfix">
      <h1>号美</h1>
      <div class="logo_words">号美</div>
    </div>
  </div>
  <div id="login_content">
    <h3>用户登录</h3>
    <form action="<?php echo U();?>" class="login_form" id="login_form">
      <div class="input_warp">
        <span>账号</span>
        <input type="text" class="account" name="username" value="" id="userName"/>
      </div>
      <div class="input_warp">
        <span>密码</span>
        <input type="password" class="password" name="password" value="" id="passWord"/>
      </div>
      <div class="form_button">
        <input type="button" id="userlogin" value="登录" />
        <input type="button" id="userregister" value="注册" />
      </div>
      <div class="forgetpwd">忘记密码</div>
      <div class="form-checkbox">
        <div class="checkbox"></div>
        <span>记住密码</span>
        <div class="error"></div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
<script src="/Public/static/js/jquery.min.js"></script>
<script src="/Public/static/js/cookie.js"></script>
<script>
  function login_init(){
    var username = getcookie('username');
    var password = getcookie('password');
    if(username && password){
      $('#userName').val(username);
      $('#passWord').val(password);
      $(".checkbox").addClass('rememberPwd');
    }else{
      $('#userName').focus();
    }
  }

  function checkLoginInput(){
    var loginName = $('#userName').val();
    var loginPWD = $('#passWord').val();
    if(loginName == ''){
      $('.error').show().html('请输入您的登录账号！');
      $('#userName').focus();
      return false;
    }
    /*var patt = new RegExp("^([0-9a-zA-Z]([-_.\w]*[0-9a-zA-Z])*@(([0-9a-zA-Z])+([-_\w]*[0-9a-zA-Z])*\.)+[a-zA-Z]{2,9})$");
    if(!patt.test(loginName)){
        $('.error').show().html('请输入正确的邮箱！');
        $('#userName').focus();
        return false;
    }*/
    if(loginPWD == ''){
      $('.error').show().html('请输入您的密码！');
      $('#passWord').focus();
      return false;
    }
    $('.error').hide();
    return true;
  }

  function save_username() {
    if($(".checkbox").hasClass('rememberPwd')){
      setcookie('username', $('#userName').val(), 365);
      setcookie('password', $('#passWord').val(), 365);
    }else{
      delcookie('username');
      delcookie('password');
    }
  }

  $(function(){
    login_init();

    $('.checkbox').click(function(){
      if($(this).hasClass('rememberPwd')){
        $(this).removeClass('rememberPwd');
      }else{
        $(this).addClass('rememberPwd');
      }
    });

    $("#login_form").submit(function(){
      var self = $(this);
      $.post(self.attr("action"), self.serialize(), success, "json");
      return false;

      function success(data){
        if(data.status == 1){
          save_username();
          window.location.href = data.url;
        } else {
          $('#userlogin').val('登录');
          $('.error').show().html(data.msg);
        }
      }
    });

    $('#userlogin').on('click',function(){
      if(checkLoginInput()){
        $(this).val('登录中...');
        $("#login_form").submit();
      }
    });

    $(document).keydown(function(event){
      if(event.keyCode == 13){
        $('#userlogin').click();return false;
      }
    });

    //注册
    $('#userregister').click(function () {
      location.href = '<?php echo U("register");?>';
    });

  });
</script>