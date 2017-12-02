<php>$item_vod = ff_mysql_vod('cid:1,2,3;scenario:true;limit:10;page_is:true;page_id:list;page_p:'.$scenario_page.';cache_name:default;cache_time:default;order:vod_addtime;sort:desc');
$page = ff_url_page('scenario/index',array('p'=>'FFLINK'),true,'list',4);
$totalpages = ff_page_count('list', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:scenario_index" />
</head>
<body class="scenario-index ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4>
  <a class="ff-text" href="{:ff_url('scenario/index',array('p'=>1),true)}">剧情介绍</a>
  <small>共有<span class="ff-text">{:ff_page_count('list', 'records')}</span>篇剧情 第<span class="ff-text">{$scenario_page}</span>页</small>
  </h4>
</div>
<div class="row">
<volist name="item_vod" id="feifei">
<php>$vod_scenario = json_decode($feifei['vod_scenario'],true);</php>
<div class="col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">《{$feifei.vod_name}》第{$vod_scenario.info|count}集剧情介绍</h3>
    </div>
    <div class="panel-body">
      <a class="vod-pic" href="{:ff_url('scenario/detail', array('id'=>$feifei['vod_id']), true)}">
        <img class="img-thumbnail ff-img" data-original="{$feifei['vod_pic']|ff_url_img=$vod_content}" alt="{$feifei.vod_name}剧情介绍">
      </a>
      <p class="vod-info text-muted">{$vod_scenario['info']|end}</p>
      <div class="clearfix ff-clearfix"></div>
      <div class="vod-fenji">
        <volist name="vod_scenario.info" id="scenario">
        <a class="btn btn-default btn-sm" href="{:ff_url('scenario/detail', array('id'=>$feifei['vod_id'],'pid'=>$i), true)}">{$i}</a>
        </volist>
      </div>
    </div>
    <div class="panel-footer text-right">
    	<a class="ff-text" href="{:ff_url('scenario/detail', array('id'=>$feifei['vod_id']), true)}">全部剧情</a>
      <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">在线观看</a>
      <a class="ff-text" href="{:ff_url('forum/vod',array('cid'=>$feifei['vod_id'],'p'=>1),true)}">相关影评</a>
    </div>
  </div>
</div>
<div class="clearfix"></div>
</volist>
<!-- -->
<gt name="totalpages" value="1">
<div class="clearfix"></div>
<div class="col-xs-12 text-center">
  <ul class="pagination pagination-lg hidden-xs">
    {$page}
  </ul>
  <ul class="pager visible-xs">
    <gt name="scenario_page" value="1">
      <li><a id="ff-prev" href="{:ff_url('scenario/index', array('p'=>$scenario_page-1), true)}">上一页</a></li>
    </gt>
    <lt name="scenario_page" value="$totalpages">
      <li><a id="ff-next" href="{:ff_url('scenario/index', array('p'=>$scenario_page+1), true)}">下一页</a></li>
    </lt>
   </ul> 
</div>
</gt>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row -->
</div>
</body>
</html>