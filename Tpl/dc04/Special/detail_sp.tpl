<php>if($special_tag_name){
	$item_vod = ff_mysql_vod('limit:24;tag_name:'.$special_tag_name.';tag_list:vod_tag;cache_name:default;cache_time:default;order:vod_hits desc');
  $item_news = ff_mysql_news('limit:30;tag_name:'.$special_tag_name.';tag_list:news_tag;cache_name:default;cache_time:default;order:news_hits desc');
}else{
	$item_vod = ff_mysql_vod('limit:24;ids:'.$special_ids_vod.';cache_name:default;cache_time:default;order:vod_hits desc');
  $item_news = ff_mysql_news('limit:30;ids:'.$special_ids_news.';cache_name:default;cache_time:default;order:news_hits desc');
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:special_detail" />
</head>
<body class="special-detail">
<include file="Block:header" />
<div class="container">
<div class="page-header">
  <h2>专题：{$special_name}</h2>
  <div class="share"><include file="Base:vod_share" /></div>
</div>
<h4 class="content">
	{$special_content}
</h4>
<div class="page-header">
  <h2><span class="glyphicon glyphicon-film ff-text"></span> 相关影片</h2>
</div>
<ul class="list-unstyled vod-item-img ff-img-90">
  <volist name="item_vod" id="feifei">
  	<li class="col-xs-2 ff-col"><include file="Base:vod_item_img" /></li>
  </volist>
</ul>
<notempty name="item_news">
<div class="clearfix"></div>
<div class="page-header">
  <h2><span class="glyphicon glyphicon-list-alt ff-text"></span> 相关资讯</h2>
</div>
<ul class="news-item-ul ff-row">
  <volist name="item_news" id="feifei">
    <li class="col-xs-6 ff-col"><include file="Base:news_item_hot" /></li>
  </volist>
</ul>
</notempty>
<!-- -->
<include file="Base:special_forum" />
{$special_hits_insert}
<div class="row ff-row">
  <include file="Block:footer" />
</div>
</div><!--container end -->
</body>
</html>