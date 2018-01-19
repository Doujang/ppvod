<php>$item_yugao = ff_play_one($vod_play_list,'yugao');</php>
<php>$item_down = ff_play_one($vod_play_list,'down');</php>
<php>$item_play = ff_play_one($vod_play_list,'max');</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:scenario_detail" />
</head>
<body class="scenario-detail ff-bg">
<include file="Block:nav_pc" />
<div class="container vod-detail">
<div class="page-header">
	<h4 class="ff-link">
    <a class="ff-text" href="{:ff_url('scenario/detail',array('id'=>$vod_id),true)}">{$vod_name|msubstr=0,20} 剧情介绍</a> 
    <small><include file="Block:vod_continu" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8 ff-info">
  <include file="Block:vod_detail_info" />
</div>
<div class="col-xs-4 ff-ads">
  {:ff_url_ads('300_250')}
</div>
<div class="clearfix ff-clearfix"></div>
<notempty name="vod_scenario.info">
<div class="col-xs-12 ff-col">
  <div class="page-header">
    <h4><a class="ff-text" href="{:ff_url('scenario/detail',array('id'=>$vod_id),true)}" title="{$vod_name}分集剧情">{$vod_name} 分集剧情</a></h4>
  </div>
  <!--强制展示所有剧集 -->
  <ul class="row list-unstyled vod-scenario-item" id="vod-scenario-item" data-max="0"></ul>
  <dl id="vod-scenario" class="vod-scenario">
    <volist name="vod_scenario.info" id="feifei">
    <dt id="vod-scenario-title-{$i}" class="vod-scenario-title">
      <a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$i)}" class="ff-text">{$vod_name} 第{$i}集 在线观看</a>
    </dt>
    <dd id="vod-scenario-info-{$i}" class="vod-scenario-info">
      {$feifei}<a href="{:ff_url('scenario/detail', array('id'=>$vod_id, pid=>$i), true)}" class="ff-text">详情...</a>
     </dd>
    </volist>
  </dl>
</div>
<div class="clearfix"></div>
</notempty>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>    
</div><!--row end -->
</div>
</body>
</html>