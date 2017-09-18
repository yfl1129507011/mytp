<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>投美首页</title>
  <link rel="stylesheet" href="/Public/static/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/Public/toumei/css/head.css" media="all">
  <script src="/Public/static/js/powerbi.min.js"></script>
  <script src="/Public/static/js/jquery.min.js"></script>
</head>
<body>
<div class="main-head">
  <div class="main-nav">
    <div class="logoBox"><a href="<?php echo U('index');?>"><img src="/Public/toumei/img/logo.png"></a></div>
    <div class="navLeft">
      <p class="logoText"><a href="<?php echo U('index');?>">投美</a></p>
      <p>基于深度学习的品牌社交广告精益投放平台</p>
    </div>
    <div class="navCenter">
      <ul>
        <li style="color: #2e8ded;cursor: pointer;" onclick="location.href='<?php echo U('index');?>'">新浪微博</li>
        <li>微信公众号</li>
        <li>短视频</li>
        <li>直播</li>
      </ul>
    </div>
    <div class="navRight">
      <a class="btn" href="javascript:;"> 投放管理</a>
      <!--<div class="personPic"></div>-->
    </div>
  </div>
</div>
<style>
  .main-report{
    margin: 40px 60px;
  }
</style>
<div class="main-report" id="reportContainer"></div>
<div class="foot">保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</div>
<script>
  $(function() {
    var customFilterPaneReport = null;
    //加载PowerBI报表
    var models = window['powerbi-client'].models;
    var staticReportUrl = '<?php echo U("getReportCfg",array("name"=>"toumei"));?>';  //获取token的url
    //var staticReportUrl = 'Home/Index/getReportCfg/name/toumei';  //获取token的url
    var reportContainer = $('#reportContainer');
    var permissions = models.Permissions.All;
    reportContainer.css('height', 1054 + 'px');
    var defaultPageName = 'ReportSection';    //默认显示页
    //var filter = new models.AdvancedFilter({
    /*var filter = new models.BasicFilter({
     table:'kol',
     column:'weibo_name'
     }, "In", ["<?php echo ($name); ?>"]);
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
          table:'kol',
          //column:'weibo_name'
          column:'微博名称'
        }, "In", ["<?php echo ($name); ?>"]);
        var reportObj = $('#reportContainer')[0];
        var obj = powerbi.get(reportObj);
        obj.page('ReportSection').setFilters([filter]);
      });
    });
  });
</script>