<php>$item_yugao = ff_play_one($vod_play_list,'yugao');</php>
<php>$item_down = ff_play_one($vod_play_list,'down');</php>
<php>$item_play = ff_play_one($vod_play_list,'max');</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:scenario_detail_pid" />
</head>
<body class="scenario-detail ff-bg">
<include file="Block:nav_pc" />
<div class="container vod-detail">
<div class="page-header">
	<h4 class="ff-link">
    <a class="ff-text" href="{:ff_url('scenario/detail',array('id'=>$vod_id),true)}">{$vod_name}</a>
    <a class="ff-text" href="{:ff_url('scenario/detail',array('id'=>$vod_id,'pid'=>$scenario_pid),true)}">第{$scenario_pid}集 剧情介绍</a>
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
<div class="col-xs-12">
  <p class="lead vod-content">
    {:ff_url_tags_content(strip_tags($vod_scenario['info'][$scenario_pid-1],'<a>'),$Tag)}
  </p>
</div>
<div class="clearfix"></div>
<div class="col-xs-12">
  <div class="page-header">
    <h4>{$vod_name} 分集列表</h4>
  </div>
</div>
<div class="clearfix"></div>
<!-- -->
<div class="col-xs-6">
  <volist name="vod_scenario.info" id="feifei">
  <li class="vod_scenario_item">
    <a href="{:ff_url('scenario/detail', array('id'=>$vod_id,pid=>$i), true)}" class="ff-text">{$vod_name} 第{$i}集 剧情介绍</a>
  </li>
  </volist>
</div>
<div class="col-xs-6">
  <volist name="vod_scenario.info" id="feifei">
  <li class="vod_scenario_item">
    <a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$i)}" class="ff-text">{$vod_name} 第{$i}集 在线观看</a>
  </li>
  </volist>
</div>
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