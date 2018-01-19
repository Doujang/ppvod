<php>
$item_yugao = ff_play_one($vod_play_list,'yugao');
$item_down = ff_play_one($vod_play_list,'down');
$item_play = ff_play_one($vod_play_list,'max');
$play_pid = intval($_GET['pid']);
$play_sid = $item_down['player_sid'];
$play_count = $item_down['player_count'];
if($play_pid > 1){
	$play_title = '第'.$play_pid .'集免费下载';
}else{
	$play_title = '免费下载';
}
$item_list=ff_mysql_vod('cid:'.$vod_cid.';actor:'.ff_array(explode(',',$vod_actor),0).';limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
if(!$item_list){
	$item_list=$item_list = ff_mysql_vod('cid:'.$vod_cid.';tag_name:'.$Tag[1]['tag_name'].';tag_list:vod_type;limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
}</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:vod_down" />
</head>
<body class="vod-detail ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4>
  <a href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}" class="ff-text">{$vod_name|msubstr=0,10}</a>
  <a href="{:ff_url('vod/down',array('id'=>$vod_id,'pid'=>$play_pid),true)}" class="ff-text">{$play_title}</a>
  <small class="ff-link"><a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a><include file="Block:vod_type" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8 ff-info">
  <div class="pic">
    <img class="ff-img" data-original="{$vod_pic|ff_url_img=$vod_content}" alt="{$vod_name}全集观看">
  </div>
  <dl class="dl-horizontal infos">
    <dt>主演：</dt>
    <dd class="ff-text-hidden ff-link">{$vod_actor|ff_url_search}</dd>
    <dt>导演：</dt>
    <dd class="ff-text-hidden ff-link">{$vod_director|ff_url_search='director'}</dd>
    <dt>类型：</dt>
    <dd class="ff-text-hidden ff-link">
      <a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a>
      <include file="Block:vod_type" />
    </dd>      
    <dt>地区：</dt>
    <dd class="ff-link"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>urlencode($vod_area),'year'=>'','star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_area|default='未录入'}</a></dd>
    <dt>年份：</dt>
    <dd class="ff-link">
      <a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_year|default='2017'}</a>
    </dd>
    <dt>评分：</dt>
    <dd class="ff-raty">
      <include file="Block:vod_score" />
    </dd>
    <dt>人气：</dt>
    <dd>{$vod_hits|number_format}</dd> 
    <dt>分享：</dt>
    <dd class="share">
      <include file="Block:vod_share" />
    </dd>
    <dd class="play-btn">  
      <notempty name="item_yugao">
      <a href="{:ff_url('vod/yugao',array('id'=>$vod_id,'pid'=>$item_play['player_count']),true)}" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-expand"></span> 预告片</a>
      </notempty> 
      <notempty name="item_play">
      <a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$item_play['player_count'])}" class="btn ff-btn-play btn-lg"><span class="glyphicon glyphicon-expand"></span> 播放正片</a>
      </notempty>
      <notempty name="vod_scenario.info">
      <a href="{:ff_url('scenario/detail',array('id'=>$vod_id),true)}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-comment"></span> 分集剧情</a>
      </notempty>
    </dd>
  </dl>
</div>
<div class="col-xs-4 ff-ads">
  {:ff_url_ads('300_250')}
</div>
<!-- -->
<div class="clearfix"></div>
<div class="col-xs-12">
	<div class="clearfix ff-clearfix"></div>
  <div class="page-header">
    <h4 class="ff-text">下载观看</h4>
  </div>
  <include file="Block:vod_playurl_xunlei" />
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header">
    <h4 class="ff-text">剧情简介</h4>
  </div>
  <p class="content">{:ff_url_tags_content(strip_tags($vod_content,'<a>'),$Tag)}</p>
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header">
    <h4 class="ff-text">你可能喜欢</h4>
  </div>
  <include file="Block:vod_detail_like" />
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header">
    <h4 class="ff-text">影片评论</h4>
  </div>
  <include file="Block:vod_ajax_forum" />
</div>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!--container end -->
</body>
</html>