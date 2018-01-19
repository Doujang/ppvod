<php>
$item_yugao = ff_play_one($vod_play_list,'yugao');
$item_down = ff_play_one($vod_play_list,'down');
$item_play = ff_play_one($vod_play_list,'max');
$play_pid = intval($_GET['pid']);
$play_sid = $item_yugao['player_sid'];
$play_count = $item_yugao['player_count'];
if($play_count>1){
	$play_title = '第'.$play_pid .'集预告';
}else{
	$play_title = '预告片';
}
$item_list=ff_mysql_vod('cid:'.$vod_cid.';actor:'.ff_array(explode(',',$vod_actor),0).';limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
if(!$item_list){
	$item_list=$item_list = ff_mysql_vod('cid:'.$vod_cid.';tag_name:'.$Tag[1]['tag_name'].';tag_list:vod_type;limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
}</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:vod_yugao" />
</head>
<body class="vod-play ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4>
  <a href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}" class="ff-text">{$vod_name|msubstr=0,10}</a>
  <a href="{:ff_url('vod/yugao',array('id'=>$vod_id,'pid'=>$play_pid),true)}" class="ff-text">{$play_title}</a>
  <small class="ff-link"><a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a><include file="Block:vod_type" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8">
	<div class="ff-player">
    <div class="embed-responsive embed-responsive-4by3" id="cms_player">
      <div id="cms-player-vip"><div class="cms-player-box"></div><iframe class="embed-responsive-item cms-player-iframe" src="{:ff_url('vod/vip',array('action'=>'play','id'=>$vod_id,'sid'=>$play_sid,'pid'=>$play_pid))}" width="100%" height="100%" frameborder="0"></iframe></div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
		<h5 class="col-xs-4">
      <include file="Block:vod_updown" />
    </h5>
    <h5 class="col-xs-4 text-center">
      <include file="Block:vod_share" />
     </h5>
    <h5 class="col-xs-4 text-right">
      <a id="ff-prev" href="{:ff_url('vod/yugao',array('id'=>$vod_id,'pid'=>$play_pid-1),true)}" class="btn btn-default btn-sm <eq name="play_pid" value="1">disabled</eq>">上一集</a>
      <a id="ff-next" href="{:ff_url('vod/yugao',array('id'=>$vod_id,'pid'=>$play_pid+1),true)}" class="btn btn-default btn-sm <eq name="play_pid" value="$play_count">disabled</eq>">下一集</a>
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
<div class="clearfix"></div>
<div class="col-xs-12 vod-detail">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab-yugao">片花&预告</a></li>
    <notempty name="item_play"> 
    <li><a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$item_play['player_count'])}">在线观看</a></li>
    </notempty>
    <notempty name="item_down"> 
    <li><a href="{:ff_url('vod/down',array('id'=>$vod_id,'pid'=>$item_down['player_count']),true)}">下载观看</a></li>
    </notempty>
    <li><a href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}">影片详情</a></li>
    <notempty name="vod_scenario.info">
    <li><a href="{:ff_url('scenario/detail',array('id'=>$vod_id),true)}">分集剧情</a></li>
    </notempty>
    <li><a href="{:ff_url('forum/vod',array('cid'=>$vod_id),true)}">影片评论</a></li>
  </ul>
  <div class="clearfix ff-clearfix"></div>
  <include file="Block:vod_playurl_yugao" />
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header ff-border-none">
    <h4 class="ff-text">剧情简介</h4>
  </div>
  <p class="content">{:ff_url_tags_content(strip_tags($vod_content,'<a>'),$Tag)}</p>
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header ff-border-none">
    <h4 class="ff-text">你可能喜欢</h4>
  </div>
  <include file="Block:vod_detail_like" />
  <div class="clearfix ff-clearfix"></div>
  <div class="page-header">
    <h4 class="ff-text">影片评论</h4>
  </div>
  <include file="Block:vod_ajax_forum" />
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!--container end -->
</body>
</html>