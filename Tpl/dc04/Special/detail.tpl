<php>if($special_tag_name){
	$item_list = ff_mysql_vod('limit:24;tag_name:'.$special_tag_name.';tag_list:vod_tag;cache_name:default;cache_time:default;order:vod_hits desc');
  $item_news = ff_mysql_news('limit:30;tag_name:'.$special_tag_name.';tag_list:news_tag;cache_name:default;cache_time:default;order:news_hits desc');
}else{
	$item_list = ff_mysql_vod('limit:24;ids:'.$special_ids_vod.';cache_name:default;cache_time:default;order:vod_hits desc');
  $item_news = ff_mysql_news('limit:30;ids:'.$special_ids_news.';cache_name:default;cache_time:default;order:news_hits desc');
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:special_detail" />
</head>
<body class="special-detail">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li><a href="{:ff_url('special/show','',true)}">影视专题</a></li>
  <li class="active">{$special_name|msubstr=0,22}</li>
</ol>
<div class="row">
<div class="col-xs-12">
	<notempty name="special_banner">
  <p><img class="img-thumbnail ff-img" data-original="{$special_banner|ff_url_img}"></p>
  </notempty>
	<p class="content">{$special_content|strip_tags}</p>
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 ff-col">
  <div class="page-header">
    <h4><span class="ff-text">相关影片</span></h4>
  </div>
  <include file="Block:vod_item_img_vertical" />
</div>
<div class="clearfix ff-clearfix"></div>
<notempty name="item_news">
<div class="col-xs-12 ff-col">
  <div class="page-header">
    <h4><span class="ff-text">相关资讯</span></h4>
  </div>
  <include file="Block:news_item_hot" />
</div>
<div class="clearfix ff-clearfix"></div>
</notempty>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
{$special_hits_insert}
</body>
</html>