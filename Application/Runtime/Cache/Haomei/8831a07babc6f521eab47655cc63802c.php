<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>号美首页</title>
  <link rel="stylesheet" href="/Public/static/layui/css/layui.css" media="all">
  <style>
    *{
      margin: 0;
      padding: 0;
    }
      .main{
        margin: 20px  auto 0;
        width: 1300px;
        height: 80px;
      }
      .main-nav{
        border-bottom: 1px solid #333;
        overflow: hidden;
      }
    .navLeft,.navRight{
        height: 70px;
        line-height: 70px;
        margin-right: 10px;
        float: left;
    }
    .navLeft{
      float: left;
      width: 340px;
    }
    .navLeft img{
      margin-top: -20px;
    }
    .logoText{
      font-size: 25px;
      line-height: 30px;
    }
    .navRight{
      float: right;
      padding: 0;
      margin-right: 0;
      width: 400px;
    }
    .navRight ul .login{
      height: 30px;
      margin-top: 20px;
      line-height: 30px;
      border-radius: 4px;
      background-color: #169BD5;
      color: white;
    }
    .navRight ul li{
      float: left;
      list-style: none;
      margin: 0;
      padding: 0 10px;
      margin-right: 10px;
    }
    .main-content{
      margin-top: 25px;
    }
    .main-content-nav{
      /*width: 400px;*/
      height: 40px;
    }
    .main-content-nav li{
      width: 195px;
      float: left;
      list-style: none;
      border:1px solid #333;
      height: 40px;
      line-height: 40px;
      text-align: center;
    }
    .main-content-nav li:last-child{
      border-left: none;
    }
    .mian-content-box{
      border:1px solid #333;
      margin-bottom: 35px;
    }
    .mian-content-box .main-nav-box{
      height: 40px;
      margin: 10px 40px;
      background-color: #01AAED ;
    }
    .mian-content-box .nav-selcet{
      margin: 20px 40px;
    }
    .mian-content-box .main-report{
     /* height: 1375px;*/
      margin: 40px 60px;
      /*background-color: #9B410E;*/
    }

    .main-content li.active{
      background-color: #3AA6D5;
    }
    .layui-form-checkbox{
      margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <div class="main">
    <div class="main-nav">
      <div class="navLeft">
        <img src="/Public/haomei/img/u45.png">
        <span class="logoText">号美</span>
        <span>基于深度学习的达人价值提升平台</span>
      </div>
      <div class="navRight">
        <ul>
          <li class="login">登陆</li>
          <li style="color: #0000FF;">个人中心</li>
          <li>消息(1)</li>
          <li>帮助</li>
          <li>退出</li>
        </ul>
      </div>
    </div>
    <div class="main-content">
      <ul class="main-content-nav" id="pageNav">
        <li pagename="ReportSection1" class="active _inx">粉丝画像</li>
        <li pagename="ReportSection" class="">竞品分析</li>
      </ul>
      <div class="mian-content-box">
        <!--<div class="main-nav-box"></div>-->
        <div class="nav-selcet">
          <form class="layui-form" action="">
            <label class="layui-form-label" style="color: red;font-weight: bold;">请选择您要查看的达人</label>
            <div class="layui-input-block" style="display: none" id="input-checkbox">
              <input type="checkbox" lay-filter="filter" name="like[]" title="Houson猴姆">
              <input type="checkbox" lay-filter="filter" name="like[]" title="陈潇睡不醒">
              <input type="checkbox" lay-filter="filter" name="like[]" title="赤道少女">
              <input type="checkbox" lay-filter="filter" name="like[]" title="大玉仔-">
              <input type="checkbox" lay-filter="filter" name="like[]" title="朵朵_酱">
              <input type="checkbox" lay-filter="filter" name="like[]" title="剁手公主">
              <input type="checkbox" lay-filter="filter" name="like[]" title="风吹丁丁响当当">
              <input type="checkbox" lay-filter="filter" name="like[]" title="顾运Green"><br/>
              <input type="checkbox" lay-filter="filter" name="like[]" title="黎洛KIKI">
              <input type="checkbox" lay-filter="filter" name="like[]" title="妈咪育儿说">
              <input type="checkbox" lay-filter="filter" name="like[]" title="美妆第一线">
              <input type="checkbox" lay-filter="filter" name="like[]" title="实用小百科">
              <input type="checkbox" lay-filter="filter" name="like[]" title="思想聚焦">
              <input type="checkbox" lay-filter="filter" name="like[]" title="美妆第一线">
              <input type="checkbox" lay-filter="filter" name="like[]" title="霧霭少女">
              <input type="checkbox" lay-filter="filter" name="like[]" title="鲜衣美食君">
              <input type="checkbox" lay-filter="filter" name="like[]" title="星座秘语">
              <input type="checkbox" lay-filter="filter" name="like[]" title="樱萘">
              <input type="checkbox" lay-filter="filter" name="like[]" title="娱八婆">
              <input type="checkbox" lay-filter="filter" name="like[]" title="钟恩淇">
              <input type="checkbox" lay-filter="filter" name="like[]" title="种草囤货少女">
            </div>
            <div class="layui-input-block" id="input-radio">
              <input type="radio" lay-filter="radio-filter" name="like" title="Houson猴姆">
              <input type="radio" lay-filter="radio-filter" name="like" title="陈潇睡不醒">
              <input type="radio" lay-filter="radio-filter" name="like" title="赤道少女">
              <input type="radio" lay-filter="radio-filter" name="like" title="大玉仔-">
              <input type="radio" lay-filter="radio-filter" name="like" title="朵朵_酱">
              <input type="radio" lay-filter="radio-filter" name="like" title="剁手公主">
              <input type="radio" lay-filter="radio-filter" name="like" title="风吹丁丁响当当">
              <input type="radio" lay-filter="radio-filter" name="like" title="顾运Green"><br/>
              <input type="radio" lay-filter="radio-filter" name="like" title="黎洛KIKI">
              <input type="radio" lay-filter="radio-filter" name="like" title="妈咪育儿说">
              <input type="radio" lay-filter="radio-filter" name="like" title="美妆第一线">
              <input type="radio" lay-filter="radio-filter" name="like" title="实用小百科">
              <input type="radio" lay-filter="radio-filter" name="like" title="思想聚焦">
              <input type="radio" lay-filter="radio-filter" name="like" title="美妆第一线">
              <input type="radio" lay-filter="radio-filter" name="like" title="霧霭少女">
              <input type="radio" lay-filter="radio-filter" name="like" title="鲜衣美食君">
              <input type="radio" lay-filter="radio-filter" name="like" title="星座秘语">
              <input type="radio" lay-filter="radio-filter" name="like" title="樱萘">
              <input type="radio" lay-filter="radio-filter" name="like" title="娱八婆">
              <input type="radio" lay-filter="radio-filter" name="like" title="钟恩淇">
              <input type="radio" lay-filter="radio-filter" name="like" title="种草囤货少女">
            </div>
          </form>
        </div>
        <div class="main-report" id="reportContainer"></div>
      </div>

    </div>
  </div>
</body>
</html>
<script src="/Public/static/js/powerbi.min.js"></script>
<script src="/Public/static/js/jquery.min.js"></script>
<script src="/Public/static/layui/layui.js"></script>
<script>
  function setFilter(name,page){
    var filter = {};
    var reportObj = $('#reportContainer')[0];
    var obj = powerbi.get(reportObj);
    //obj.removeFilters();
    if(name.length != 0) {
      var models = window['powerbi-client'].models;
      var target = {
        table: "wanghong0426 kol",
        column: "weibo_name"
      };
      var op = 'In';
      var val = name;
      filter = new models.BasicFilter(target, op, val);
      obj.page(page).setFilters([filter]);
    }else{
      obj.page(page).removeFilters();
    }
  }

  //设置当前页
  function setPage(name){
    if(!name) return;
    var reportObj = $('#reportContainer')[0];
    var obj = powerbi.get(reportObj);
    var res = obj.setPage(name);
    console.log(res);
  }

  $(function() {

    var customFilterPaneReport = null;
    //加载PowerBI报表
    var models = window['powerbi-client'].models;
    //var staticReportUrl = '/Haomei/Index/getReportCfg/name/haomei';  //获取token的url
    var staticReportUrl = '<?php echo U("getReportCfg",array("name"=>"haomei"));?>';  //获取token的url
    var reportContainer = $('#reportContainer');
    var permissions = models.Permissions.All;
    reportContainer.css('height', 1493+'px');
    var defaultPageName = 'ReportSection1';    //默认显示页
    //var filter = new models.AdvancedFilter({
    /*var filter = new models.BasicFilter({
     table:'wanghong0426 kol',
     column:'weibo_name'
     }, "In", ['妈咪育儿说']);
     var defaultFilters = [filter];*/

    fetch(staticReportUrl).then(function (res) {  //获取token配置
      if (res.ok) {  //获取成功
        return res.json().then(function (embedCfg) {
          var config = $.extend({}, embedCfg, {
            //filter: defaultFilters,
            pageName: defaultPageName,
            permissions: permissions,
            settings: {
              filterPaneEnabled: false,
              navContentPaneEnabled: false
            }
          });

          console.log(config);
          customFilterPaneReport = powerbi.embed(reportContainer.get(0), config);
          reportContainer.find('iframe').attr('frameborder', 0);
          return customFilterPaneReport;
        });
      } else {  //获取失败
        return res.json().then(function (error) {
          throw new Error(error);
        });
      }
    }).then(function(report){
      report.on('loaded', function(event){
        var filter = new models.BasicFilter({
          table:'wanghong0426 kol',
          column:'weibo_name'
        }, "In", ["(Blank)"]);
        var reportObj = $('#reportContainer')[0];
        var obj = powerbi.get(reportObj);
        obj.page('ReportSection1').setFilters([filter]);
      });
    });

    $('.main-content').on('click', 'li', function(){
      if($(this).hasClass('active')){
        return;
      }else{
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
      }

      var pagename = $(this).attr('pagename');

      if(!pagename) return;
      if ('ReportSection' == pagename) {
        $('#input-radio').hide();
        $('#input-checkbox').show();
        reportContainer.css('height', 1861+'px');
      } else {
        $('#input-checkbox').hide();
        $('#input-radio').show();
        reportContainer.css('height', 1493+'px');
      }
      setPage(pagename);
      if($(this).hasClass('_inx')) return;
      $(this).addClass('_inx');
      setFilter(["(Blank)"],pagename);
    });
  });


  layui.use(['form'], function(){
    var form = layui.form();
    var _box = [];
    form.on('checkbox(filter)', function(data){
      if(data.elem.checked){
        _box.push(data.elem.title);
      }else{
        _box.pop(data.elem.title);
      }
      /*console.log(data.elem); //得到checkbox原始DOM对象
      console.log(data.elem.checked); //是否被选中，true或者false
      console.log(data.value); //复选框value值，也可以通过data.elem.value得到
      console.log(data.elem.title); //得到美化后的DOM对象*/
      console.log(_box);
      if(_box.length<6) {
        if(_box.length == 0){
          setFilter(["(Blank)"],'ReportSection');
        }else {
          setFilter(_box, 'ReportSection');
        }
      }
    });
    form.on('radio(radio-filter)', function(data){
      setFilter([data.elem.title],'ReportSection1');
    });

  });
</script>