<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>投美首页</title>
</head>
<body>

  <select id="filtertargetpage" class="page-list"></select>
  <div id="kol_select" style="display: none">
    <input type="button" value="赤道少女" onclick="setFilter(this.value);">
    <input type="button" value="Houson猴姆" onclick="setFilter(this.value);">
    <input type="button" value="陈潇睡不醒" onclick="setFilter(this.value);">
    <input type="button" value="大玉仔-" onclick="setFilter(this.value);">
  </div>

  <div id="authorize-step-wrapper"></div>
  <div id="embed-and-interact-steps-wrapper">
    <div class="topPanel">
      <div id="settings"></div>
      <div id="embedCodeDiv"></div>
      <div id="logWindow"></div>
    </div>

    <div class="bottomPanel">
      <div id="embedArea">
        <div class="editorTitle">
          <!--<div class="editorTitleText">Embedded report</div>-->
        </div>
        <div id="reportContainer"></div>
      </div>
    </div>
  </div>
</body>
</html>
<script src="/Public/js/powerbi.min.js"></script>
<script src="/Public/js/jquery.min.js"></script>
<script>

  /*//获取导航页
  function getNavPage(){
    var reportObj = document.getElementById('reportContainer');
    var PbRep = powerbi.get(reportObj);
    var pageInfo = [];
    PbRep.getPages().then(function (pages) {
      pages.forEach(function(page) {
        pageInfo[page.displayName] = page.name;
      });
    });
    console.log(pageInfo);
  }

  //设置当前页
  function setPage(){
    var reportObj = $('#reportContainer')[0];
    var obj = powerbi.get(reportObj);
    var res = obj.setPage('ReportSection2');
    console.log(res);
  }*/

  function setFilter(name){
    var filter;
    var models = window['powerbi-client'].models;
    var target = {
      table:"kol",
      column:"weibo_name"
    };
    var op = 'In';
    var val = [name];
    filter = new models.BasicFilter(target, op, val);
    var reportObj = $('#reportContainer')[0];
    var obj = powerbi.get(reportObj);
    obj.page('ReportSection').setFilters([filter]);
  }

  $(function(){
    $("#embed-and-interact-steps-wrapper,#reportContainer").height($(window).height());

    var customFilterPaneReport = null;
    //加载PowerBI报表
    var models = window['powerbi-client'].models;
    var staticReportUrl = '<?php echo U("getReportCfg");?>';  //获取token的url
    var reportContainer = $('#reportContainer');
    var permissions = models.Permissions.All;
    //var defaultPageName = 'ReportSection';    //默认显示页
    //var filter = new models.AdvancedFilter({
    /*var filter = new models.BasicFilter({
      table:'Kol',
      column:'location'
    }, "In", ['安徽'/!*,'赤道少女'*!/]);
    var defaultFilters = [filter];*/

    fetch(staticReportUrl).then(function(res){  //获取token配置
      if(res.ok){  //获取成功
        return res.json().then(function(embedCfg){
          var config = $.extend({},embedCfg,{
            //filter: defaultFilters,
            //pageName: defaultPageName,
            permissions:permissions,
            settings:{
              filterPaneEnabled:false,
              navContentPaneEnabled:false
            }
          });

          console.log(config);
          customFilterPaneReport = powerbi.embed(reportContainer.get(0), config);
          return customFilterPaneReport;
        });
      }else{  //获取失败
        return res.json().then(function (error) {
          throw new Error(error);
        });
      }
    }).then(function(report){
        report.on('loaded', function(event){
          report.getPages().then(function(pages){
            var $pagesSelect = $('#filtertargetpage');
            pages.forEach(function(page){
              var $pageOption = $('<option>').val(page.name).text(page.displayName).data(page);
              $pagesSelect.append($pageOption);
            });
          });
      });
    });

    $('#filtertargetpage').on('change', function (event) {
      var name = $(this).val();
      if(name == 'ReportSection'){
        $('#kol_select').show();
      }else {
        $('#kol_select').hide();
      }
      setPage(name);
    });

    //设置当前页
    function setPage(name){
      if(!name) return;
      var reportObj = $('#reportContainer')[0];
      var obj = powerbi.get(reportObj);
      var res = obj.setPage(name);
      console.log(res);
    }


  });
</script>