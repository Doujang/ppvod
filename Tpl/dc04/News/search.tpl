<php>if($search_wd){
	$item_news = ff_mysql_news('wd:'.$search_wd.';limit:20;page_is:true;page_id:search;page_p:'.$search_page.';cache_name:default;cache_time:default;order:news_'.$search_order.';sort:desc');
  $params = array('wd'=>urlencode($search_wd),'p'=>'FFLINK');
  $page = ff_url_page('news/search', $params, true, 'search', 4);
}else if($search_remark){
	$item_news = ff_mysql_vod('remark:'.$search_remark.';limit:10;page_is:true;page_id:search;page_p:'.$search_page.';cache_name:default;cache_time:default;order:news_'.$search_order.';sort:desc');
  $params = array('remark'=>urlencode($search_remark),'p'=>'FFLINK');
  $page = ff_url_page('news/search', $params, true, 'search', 4);
}else if($search_name){
	$item_news = ff_mysql_news('name:'.$search_name.';limit:10;page_is:true;page_id:search;page_p:'.$search_page.';cache_name:default;cache_time:default;order:news_'.$search_order.';sort:desc');
  $params = array('name'=>urlencode($search_name),'p'=>'FFLINK');
  $page = ff_url_page('news/search', $params, true, 'search', 4);
}else if($search_title){
	$item_news = ff_mysql_news('title:'.$search_title.';limit:10;page_is:true;page_id:search;page_p:'.$search_page.';cache_name:default;cache_time:default;order:news_'.$search_order.';sort:desc');
  $params = array('title'=>urlencode($search_title),'p'=>'FFLINK');
  $page = ff_url_page('news/search', $params, true, 'search', 4);
}
$totalpages = ff_page_count('search', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:news_search" />
</head>
<body class="news-search" ff-b>
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">搜索（<span class="ff-text">{$search_name|htmlspecialchars}{$search_wd|htmlspecialchars}</span>）</li>
  <small class="pull-right">共有<span class="ff-text">{:ff_page_count('search', 'records')}</span>篇内容 第<span class="ff-text">{$search_page}</span>页</small>
</ol>
<div class="row">
<div class="col-xs-12">
	<notempty name="item_news">
  	<include file="Block:news_item_medial" />
  <else/>
    <div class="jumbotron">
    <p class="text-center">Sorry，没有搜索到相关结果</p>
    </div>
  </notempty>
</div>
<div class="clearfix"></div>
<gt name="totalpages" value="1">
<div class="col-xs-12 ff-col text-center">
  <ul class="pagination pagination-lg hidden-xs">
    {$page}
  </ul>
  <ul class="pager visible-xs">
    <gt name="search_page" value="1">
    	<php>$params['p'] = $search_page-1</php>
      <li><a id="ff-prev" href="{:ff_url('news/search', $params, true)}">上一页</a></li>
    </gt>
    <lt name="search_page" value="$totalpages">
    	<php>$params['p'] = $search_page+1</php>
      <li><a id="ff-next" href="{:ff_url('news/search', $params, true)}">下一页</a></li>
    </lt>
   </ul>
</div>
</gt>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
</body>
</html>