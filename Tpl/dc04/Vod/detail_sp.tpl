<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:vod_detail" />
</head>
<body class="vod-play ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4>
  <span class="ff-link ff-text">{$vod_actor|ff_url_search}</span>
  {$vod_name|msubstr=0,30}
  <small class="ff-link"><a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a><include file="Block:vod_type" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8">
	<div class="ff-player">
    <div class="embed-responsive embed-responsive-4by3" id="cms_player">
      <div id="cms-player-vip"><div class="cms-player-box"></div><iframe class="embed-responsive-item cms-player-iframe" src="{:ff_url('vod/vip',array('action'=>'play','id'=>$vod_id,'sid'=>1,'pid'=>1))}" width="100%" height="100%" frameborder="0"></iframe></div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <h5 class="col-xs-6">
    	<include file="Block:vod_updown" />
    </h5>
    <h5 class="col-xs-6 text-right">
   		<include file="Block:vod_share" />
    </h5>
  </div>
</div>
<div class="col-xs-4 col">
  <ul class="list-unstyled text-center ff-ads">
    {:ff_url_ads('300_250')}
  </ul>
  <ul class="list-unstyled text-center ff-ads">
    {:ff_url_ads('300_250')}
  </ul>
</div>
<php>
$item_list=ff_mysql_vod('cid:'.$vod_cid.';actor:'.ff_array(explode(',',$vod_actor),0).';limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
if(!$item_list){
	$item_list=$item_list = ff_mysql_vod('cid:'.$vod_cid.';tag_name:'.$Tag[1]['tag_name'].';tag_list:vod_type;limit:18;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
}</php>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12">
  <div class="page-header ff-border-none">
    <h4 class="ff-text">你可能喜欢</h4>
  </div>
</div>
<div class="clearfix"></div>
<div class="col-xs-12">
  <include file="Block:vod_item_img_horizontal" />
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