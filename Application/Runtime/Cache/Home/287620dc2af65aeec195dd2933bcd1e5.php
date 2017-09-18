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
<link rel="stylesheet" href="/Public/toumei/css/home.css" media="all">
<div class="main-body">
  <div class="main-content">
      <ul class="main-content-nav" id="pageNav">
        <li pagename="ReportSection2" class="active">按目标受众筛选KOL</li>
        <li>按分类筛选KOL</li>
      </ul>
      <div class="mian-content-box" id="target">
        <div class="main-nav-box">
          <span class="active" val="label">按受众标签筛选</span>
          <span val="attr">按受众属性筛选</span>
        </div>
        <div id="target-label">
          <div class="main-report" id="reportContainer"></div>
        </div>
        <div id="target-attr"></div>
      </div>
      <div class="mian-content-box classify-main" id="classify" style="display: none;">
      <!--<div class="classify-search">
        <input class="text" type="text" placeholder="请输入您想查看的达人名称" />
        <input class="button" type="button" value="查看" />
      </div>-->
      <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
          <li2>
            <button class="layui-btn layui-btn-normal">KOL领域</button>
          </li2>
          <li><a target="_blank" href="javascript:;" title="" class="nothing">不限</a></li>
          <li><a target="_blank" href="javascript:;" title="">美妆</a></li>
          <li><a target="_blank" href="javascript:;" title="">母婴</a></li>
          <li><a target="_blank" href="javascript:;" title="">汽车</a></li>
          <li><a target="_blank" href="javascript:;" title="">美食</a></li>
          <li><a target="_blank" href="javascript:;" title="">星座</a></li>
          <li><a target="_blank" href="javascript:;" title="">情感</a></li>
          <li><a target="_blank" href="javascript:;" title="">资讯</a></li>
          <li><a target="_blank" href="javascript:;" title="">文艺</a></li>
          <li><a target="_blank" href="javascript:;" title="">时尚</a></li>
          <li><a target="_blank" href="javascript:;" title="">搞笑</a></li>
          <li><a target="_blank" href="javascript:;" title="">娱乐</a></li>
          <!--<li><a target="_blank" href="javascript:;" title="">PPTV</a></li>
          <li><a target="_blank" href="javascript:;" title="">风行网</a></li>
          <li><a target="_blank" href="javascript:;" title="">华数TV</a></li>
          <li><a target="_blank" href="javascript:;" title="">Vimeo</a></li>
          <li><a target="_blank" href="javascript:;" title="">图好快</a></li>
          <li><a target="_blank" href="javascript:;" title="">FLVCD硕鼠</a></li>
          <span class="layui-unselect show status_show" lay-stope="tabmore" title=""><i lay-stope="tabmore" class="layui-icon"></i></span>
          -->
        </ul>
      </div>
      <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
          <li2>
            <button class="layui-btn layui-btn-normal">KOL报价</button>
          </li2>
          <li><a target="_blank" href="javascript:;" title="" class="nothing">不限</a></li>
          <li><a target="_blank" href="javascript:;" title="">1000元以下</a></li>
          <li><a target="_blank" href="javascript:;" title="">1000-2000元</a></li>
          <li><a target="_blank" href="javascript:;" title="">2000-5000元</a></li>
          <li><a target="_blank" href="javascript:;" title="">5000-1万元</a></li>
          <li><a target="_blank" href="javascript:;" title="">1万元以上</a></li>
        </ul>
      </div>
      <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
          <li2>
            <button class="layui-btn layui-btn-normal">粉丝数量</button>
          </li2>
          <li><a target="_blank" href="javascript:;" title="" class="nothing">不限</a></li>
          <li><a target="_blank" href="javascript:;" title="">10万以下</a></li>
          <li><a target="_blank" href="javascript:;" title="">10-50万</a></li>
          <li><a target="_blank" href="javascript:;" title="">50-100万</a></li>
          <li><a target="_blank" href="javascript:;" title="">100-500万</a></li>
          <li><a target="_blank" href="javascript:;" title="">500-1000万</a></li>
          <li><a target="_blank" href="javascript:;" title="">1000万以上</a></li>
        </ul>
      </div>
      <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
          <li2>
            <button class="layui-btn layui-btn-normal">粉丝画像</button>
          </li2>
          <li><a target="_blank" href="javascript:;" title="" class="nothing">不限</a></li>
          <li><a target="_blank" href="javascript:;" title="">有</a></li>
          <li><a target="_blank" href="javascript:;" title="">无</a></li>
        </ul>
      </div>
      <div class="classify-datalist">
        <p>共计：<span style="color: red;font-weight: bold;">18298</span>位</p>
        <table>
          <tr val="大玉仔-">
            <td><input type="checkbox"></td>
            <td class="list-main"><img src="/Public/toumei/img/u47.png"><span>大玉仔-</span></td>
            <td>
              <strong>认证信息</strong>
              <p>知名搞笑幽默达人</p>
            </td>
            <td>
              <strong>粉丝数</strong>
              <p>123456</p>
            </td>
            <td>
              <strong>参考报价</strong>
              <p>直发：<span>3000</span>元</p>
            </td>
            <td>
              <strong>投美指数</strong>
              <p>97</p>
            </td>
            <td>
              <strong>匹配度</strong>
              <p>85%</p>
            </td>
            <td><img src="/Public/toumei/img/u72.png"></td>
          </tr>
          <tr val="剁手公主">
            <td><input type="checkbox"></td>
            <td class="list-main"><img src="/Public/toumei/img/u47.png"><span>剁手公主</span></td>
            <td>
              <strong>认证信息</strong>
              <p>知名搞笑幽默达人</p>
            </td>
            <td>
              <strong>粉丝数</strong>
              <p>123456</p>
            </td>
            <td>
              <strong>参考报价</strong>
              <p>只发：<span>3000</span>元</p>
            </td>
            <td>
              <strong>投美指数</strong>
              <p>97</p>
            </td>
            <td>
              <strong>匹配度</strong>
              <p>85%</p>
            </td>
            <td><img src="/Public/toumei/img/u72.png"></td>
          </tr>
          <tr val="赤道少女">
            <td><input type="checkbox"></td>
            <td  class="list-main"><img src="/Public/toumei/img/u47.png"><span>赤道少女</span></td>
            <td>
              <strong>认证信息</strong>
              <p>知名搞笑幽默达人</p>
            </td>
            <td>
              <strong>粉丝数</strong>
              <p>123456</p>
            </td>
            <td>
              <strong>参考报价</strong>
              <p>只发：<span>3000</span>元</p>
            </td>
            <td>
              <strong>投美指数</strong>
              <p>97</p>
            </td>
            <td>
              <strong>匹配度</strong>
              <p>85%</p>
            </td>
            <td><img src="/Public/toumei/img/u72.png"></td>
          </tr>
        </table>
      </div>
    </div>
    </div>
</div>
<div class="foot">保护条款 版权所有(C) 海量信息技术股份有限公司 京ICP备11019009号-2 京公网安备11010802016383</div>
</body>
</html>
<script>
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

  $(function() {
    var customFilterPaneReport = null;
    //加载PowerBI报表
    var models = window['powerbi-client'].models;
    var staticReportUrl = '<?php echo U("getReportCfg",array("name"=>"toumei"));?>';  //获取token的url
    //var staticReportUrl = 'Home/Index/getReportCfg/name/toumei';  //获取token的url
    var reportContainer = $('#reportContainer');
    var permissions = models.Permissions.All;
    reportContainer.css('height', 1375+'px');
    var defaultPageName = 'ReportSection1';    //默认显示页
    //var filter = new models.AdvancedFilter({
    /*var filter = new models.BasicFilter({
     table:'Kol',
     column:'location'
     }, "In", ['安徽'/!*,'赤道少女'*!/]);
     var defaultFilters = [filter];*/

    /*fetch(staticReportUrl).then(function (res) {  //获取token配置
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
    });*/
    $.get(staticReportUrl).then(function(res){   //获取token配置
      var config = $.extend({}, $.parseJSON(res), {
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

    //设置当前页
    function setPage(name){
      if(!name) return;
      var reportObj = $('#reportContainer')[0];
      var obj = powerbi.get(reportObj);
      var res = obj.setPage(name);
      console.log(res);
    }

    $('.main-content').on('click', 'li', function(){
      if($(this).hasClass('active')){
        return;
      }else{
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
      }
      var pagename = $(this).attr('pagename');
      if(pagename){
        $('#target').show();
        $('#classify').hide();
        /*reportContainer.css('height', 615+'px');
        setPage(pagename);*/
      }else{
        $('#classify').show();
        $('#target').hide();
      }
    });

    $('.main-nav-box').on('click','span',function(){
      if($(this).hasClass('active')) return;

      $(this).parent().find('span').removeClass('active');
      $(this).addClass('active');
      var val = $(this).attr('val');
      if(val == 'label'){
        $('#target-label').show();
        $('#target-attr').hide();
      }else{
        $('#target-attr').show();
        $('#target-label').hide();
      }
    });

    $('.classify-datalist').on('click', 'tr', function () {
      var val = $(this).attr('val');
      if(!val) return;
      var url = "<?php echo U('expertInfo');?>?name="+val;
      window.location = url;
    })
  });

</script>