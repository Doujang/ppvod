<php>$item_news = ff_mysql_news('limit:20;tag_name:'.$tag_name.';tag_cid:3,4;page_is:true;page_id:newstag;page_p:'.$tag_page.';cache_name:default;cache_time:default;order:news_addtime;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');$totalpages = ff_page_count('newstag', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:news_tags" />
</head>
<body class="index news-tags">
<include file="Block:header" />
<div class="container dc05">
  <div class="jumbotron">
    <h2 class="text-center">{$tag_type}{$tag_tag}{$tag_name}</h2>
    <h5 class="text-center text-primary">共收录<span class="ff-text">{:ff_page_count('newstag', 'records')}</span>篇内容</h5>
  </div>
  <!-- -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-order-addtime-tagtype-tags-wd-{$tag_name|urlencode}-p-"><i class="fa fa-navicon"></i> 最新</a></li>
    <li><a href="javascript:;" data-target=".index-news-item" data-toggle="tab" data-url="{$root}index.php?s=ajax-news-order-hits-tagtype-tags-wd-{$tag_name|urlencode}-p-"><i class="fa fa-fire"></i> 热门</a></li>
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
    <a class="btn btn-default btn-block btn-lg ff-page-more" data-target=".index-news-item" data-page="1" data-url="{$root}index.php?s=ajax-news-tagtype-tags-wd-{$tag_name|urlencode}-p-" href="javascript:;">阅读更多...</a>
  </h4>
  </gt>
</div><!--container end -->
<div class="clearfix ff-clearfix"></div>
<div class="container">
  <include file="Block:footer" />
</div>
</body>
</html>