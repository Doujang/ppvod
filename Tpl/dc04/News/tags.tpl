<php>$item_news = ff_mysql_news('limit:20;tag_name:'.$tag_name.';tag_list:news_tag;page_is:true;page_id:newstag;page_p:'.$tag_page.';cache_name:default;cache_time:default;order:news_addtime;sort:desc');
$page = ff_url_page('news/tags',array('name'=>urlencode($tag_name),'p'=>'FFLINK'), true, 'newstag', 4);
$totalpages = ff_page_count('newstag', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:news_tags" />
</head>
<body class="news-tags">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">标签话题（<span class="ff-text">{$tag_type}{$tag_tag}{$tag_name}</span>）</li>
  <small class="pull-right">共有{:ff_page_count('newstag', 'records')}</span>篇内容 第<span class="ff-text">{$tag_page}</span>页</small>
</ol>
<div class="row">
<div class="col-xs-12">
  <include file="Block:news_item_medial" />
</div>
<div class="clearfix ff-clearfix"></div>
<gt name="totalpages" value="1">
<div class="col-xs-12 text-center">
  <ul class="pagination pagination-lg hidden-xs">
    {$page}
  </ul>
  <ul class="pager visible-xs">
    <gt name="tag_page" value="1">
      <li><a id="ff-prev" href="{:ff_url('news/tags', array('name'=>urlencode($tag_name),'p'=>$tag_page-1), true)}">上一页</a></li>
    </gt>
    <lt name="tag_page" value="$totalpages">
      <li><a id="ff-next" href="{:ff_url('news/tags', array('name'=>urlencode($tag_name),'p'=>$tag_page+1), true)}">下一页</a></li>
    </lt>
   </ul>
</div>
<div class="clearfix ff-clearfix"></div>
</gt>
<div class="col-xs-12 ff-col">
  <div class="page-header">
    <h4 class="ff-text">热门话题</h4>
  </div>
  <ul class="nav nav-pills">
  <volist name=":ff_mysql_tags('limit:20;cid:4;group:tag_name,tag_list;cache_name:default;cache_time:default;order:tag_count;sort:desc')" id="feifei" mod="7">
  <eq name="feifei.tag_name" value="$tag_name">
    <li class="active"><a href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}">{$feifei.tag_name}({$feifei.tag_count})</a></li>
  <else/>
    <li><a href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}">{$feifei.tag_name}({$feifei.tag_count})</a></li>
  </eq>
  </volist>
  </ul>
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
</body>
</html>