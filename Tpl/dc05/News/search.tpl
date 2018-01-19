<php>
if($search_name){
	$item_news = ff_mysql_news('name:'.$search_name.';limit:20;page_is:true;page_id:search;page_p:'.$search_page.';cache_name:default;cache_time:default;order:news_addtime;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');$totalpages = ff_page_count('search', 'totalpages');
  $tagtype = 'search';
}else{
	$item_news = ff_mysql_news('limit:20;cache_name:default;cache_time:default;order:news_addtime;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');$totalpages = 1;
  $tagtype = 'index';
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:news_search" />
</head>
<body class="index news-search">
<include file="Block:header" />
<div class="container dc05">
  <form class="form-horizontal ff-search" data-sid="{$site_sid|default=2}" data-limit="{:C('ui_search_limit')}" role="search" method="post" action="{$root}index.php?s=news-search-name">
    <div class="input-group">
      <input type="text" class="form-control ff-wd" name="wd" placeholder="{$search_name|default='请输入关键字'}">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-default" data-action="{:ff_url('news/search',array('name'=>'FFWD'), true)}">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </div>
    </div>
  </form>
  <!-- -->
  <notempty name="search_name">
  <div class="jumbotron">
    <h2 class="text-center">{$search_name}</h2>
    <h5 class="text-center text-primary">共找到<span class="ff-text">{:ff_page_count('search', 'records')}</span>篇结果</h5>
  </div>
  </notempty>
  <!-- -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-order-addtime-tagtype-{$tagtype}-wd-{$search_name|urlencode}-p-"><i class="fa fa-navicon"></i> 最新</a></li>
    <li><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-order-hits-tagtype-{$tagtype}-wd-{$search_name|urlencode}-p-"><i class="fa fa-fire"></i> 热门</a></li>
  </ul>
  <div class="clearfix"></div>
  <!-- -->
  <div class="index-news-item">
    <volist name="item_news" id="feifei">
    <include file="Block:news_item" />
    </volist>
  </div>
  <div class="clearfix"></div>
  <!-- -->
  <gt name="totalpages" value="1">
  <h4>
    <a class="btn btn-default btn-block btn-lg ff-page-more" data-target=".index-news-item" data-page="1" data-url="{$root}index.php?s=ajax-news-tagtype-search-wd-{$search_name|urlencode}-p-" href="javascript:;">阅读更多...</a>
  </h4>
  </gt>
</div><!--container end -->
<div class="clearfix ff-clearfix"></div>
<div class="container">
  <include file="Block:footer" />
</div>
</body>
</html>