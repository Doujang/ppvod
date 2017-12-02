<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:vod_play" />
</head>
<body class="vod-play ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4>
  <a href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}" class="ff-text">{$vod_name|msubstr=0,10}</a>
  <gt name="play_count" value="1"><if condition="strlen($play_title) gt 6">{$play_title}<else/>第{$play_pid}集</if></gt>
  <small class="ff-link"><a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a><include file="Block:vod_type" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8">
	<div class="ff-player">
    <div class="embed-responsive embed-responsive-4by3" id="cms_player">{$vod_player}</div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
		<h5 class="col-xs-4">
      <include file="Block:vod_updown" />
    </h5>
    <h5 class="col-xs-3 text-left share">
      <include file="Block:vod_share" />
     </h5>
    <h5 class="col-xs-5 text-right">
      <include file="Block:vod_playurl_dropdown" />
      <include file="Block:vod_player_keydown" />
     </h5> 
  </div>
</div>
<div class="col-xs-4 col">
	<div class="media">
    <a class="media-left" href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}">
      <img class="media-object img-thumbnail ff-img" data-original="{$vod_pic|ff_url_img=$vod_content}" alt="{$vod_name}免费观看">
    </a>
    <div class="media-body">
      <dl class="dl-horizontal">
        <dt>主演：</dt>
        <dd class="ff-link ff-text-hidden">{$vod_actor|ff_url_search}</dd>
        <dt>导演：</dt>
        <dd class="ff-link ff-text-hidden">{$vod_director|ff_url_search='director'}</dd>
        <dt>类型：</dt>
        <dd class="ff-link ff-text-hidden"><a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a></dd>
        <dt>地区：</dt>
        <dd class="ff-link ff-text-hidden"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>urlencode($vod_area),'year'=>'','star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_area|default='未录入'}</a></dd>
        <dt>年份：</dt>
        <dd class="ff-link"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_year|default='2017'}</a></dd>
        <dt>状态：</dt>
        <dd class="ff-link"><include file="Block:vod_continu" /></dd>
      </dl>
    </div>
  </div>
  <div class="clearfix ff-clearfix"></div>
  <ul class="list-unstyled text-center ff-ads">
    {:ff_url_ads('300_300')}
  </ul>
</div>
<php>
$item_yugao = ff_play_one($vod_play_list,'yugao');
$item_down = ff_play_one($vod_play_list,'down');
$item_play = $vod_play_list[$play_sid];
$item_list=ff_mysql_vod('cid:'.$vod_cid.';actor:'.ff_array(explode(',',$vod_actor),0).';limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
if(!$item_list){
	$item_list=$item_list = ff_mysql_vod('cid:'.$vod_cid.';tag_name:'.$Tag[1]['tag_name'].';tag_list:vod_type;limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
}</php>
<div class="clearfix"></div>
<div class="col-xs-12 vod-detail">
  <include file="Block:vod_detail_tab" />
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!--container end -->
</body>
</html>