<php>$item_news = ff_mysql_news('cid:'.$list_id.';limit:20;page_is:true;page_id:list;page_p:'.$list_page.';cache_name:default;cache_time:default;order:news_addtime;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');$totalpages = ff_page_count('list', 'totalpages');</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:news_list" />
</head>
<body class="index news-list">
<include file="Block:header" />
<div class="container">
<div class="row">
  <div class="col-md-8">
    <div class="jumbotron">
      <h2 class="text-center">{$list_name}<sup>共{:ff_page_count('list', 'records')}篇</sup></h2>
      <p class="text-muted">{$list_description}</p>
    </div>
    <div class="clearfix"></div>
    <ul class="nav nav-tabs">
    	<li class="active"><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-cid-{$list_id}-order-addtime-p-"><i class="fa fa-navicon"></i> 最新</a></li>
      <li><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-cid-{$list_id}-order-hits-p-"><i class="fa fa-fire"></i> 热门</a></li>
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
    <h4><a class="btn btn-default btn-block btn-lg ff-page-more" data-target=".index-news-item" data-page="1" data-url="{$root}index.php?s=ajax-news-cid-{$list_id}-p-" href="javascript:;">阅读更多...</a></h4>
    </gt>
  </div>
  <div class="col-md-4">
  	<notempty name="list_extend.type">
  	<div class="page-header">
      <h4>栏目分类</h4>
    </div>
    <ul class="list-unstyled ff-row tags-type">
      <volist name=":explode(',',$list_extend['type'])" id="feifeitype" offset="0" length="18">
      <li class="col-sm-4 col-xs-6 ff-col"><a class="btn btn-default btn-block" href="{:ff_url('news/type',array('id'=>$list_id,'type'=>urlencode($feifeitype)),true)}">{$feifeitype|msubstr=0,6}</a></li>
      </volist>
    </ul>
    <div class="clearfix ff-clearfix"></div>
    </notempty>
    <!-- -->
    <div class="page-header">
      <h4>推荐阅读</h4>
    </div>
    <ul class="list-unstyled news-item-hot">
      <volist name=":ff_mysql_news('cid:'.$list_id.';limit:20;cache_name:default;cache_time:default;order:news_stars desc,news_id;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_up')" id="feifei">
      <include file="Block:news_item_hot" />
      </volist>
    </ul>
    <div class="ff-fixed visible-md visible-lg" id="fixed-index">
    	{:ff_url_ads('300_250')}
    </div>
  </div>
</div>
<include file="Block:footer" />
</div>
</body>
</html>