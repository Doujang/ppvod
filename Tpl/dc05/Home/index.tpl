<php>$item_news = ff_mysql_news('limit:20;cache_name:default;cache_time:default;order:news_addtime;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:index" />
</head>
<body class="index">
<include file="Block:header" />
<div class="container">
<div class="row">
  <div class="col-md-8">
    <include file="Base:slide_index" />
    <div class="clearfix"></div>
    <ul class="nav nav-tabs">
    	<li class="active"><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-p-"><i class="fa fa-navicon"></i> 发现</a></li>
      <li><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-order-hits-p-"><i class="fa fa-fire"></i> 热门</a></li>
    </ul>
    <div class="clearfix"></div>
    <!-- -->
    <div class="index-news-item">
      <volist name="item_news" id="feifei">
      <include file="Block:news_item" />
      </volist>
    </div>
    <!-- -->
    <present name="item_news">
    <div class="clearfix"></div>
    <h4><a class="btn btn-default btn-block btn-lg ff-page-more" data-target=".index-news-item" data-page="1" data-url="{$root}index.php?s=ajax-news-p-" href="javascript:;">阅读更多...</a></h4>
    </present>
  </div>
  <div class="col-md-4">
  	<div class="page-header">
      <h4>栏目、标签 <a class="pull-right" href="{:ff_url('ajax/tags', '', true)}" title="全部分类"><i class="fa fa-angle-double-right"></i></a></h4>
    </div>
    <ul class="list-unstyled ff-row tags-type">
      <volist name=":ff_mysql_tags('cid:3,4;limit:18;group:tag_name,tag_list;cache_name:default;cache_time:default;order:tag_cid asc,tag_count;sort:desc')" id="feifei">
      <li class="col-sm-4 col-xs-6 ff-col"><a class="btn btn-default btn-block" href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}" target="_blank">{$feifei.tag_name|msubstr=0,6}</a></li>
      </volist>
    </ul>
    <div class="clearfix ff-clearfix"></div>
    <!-- -->
    <div class="page-header">
      <h4>推荐阅读</h4>
    </div>
    <ul class="list-unstyled news-item-hot">
      <volist name=":ff_mysql_news('limit:20;cache_name:default;cache_time:default;order:news_stars desc,news_id;sort:desc')" id="feifei">
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