<!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:news_channel" />
</head>
<body class="news-list">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">最新{$list_name}</li>
  <small class="pull-right ff-link"><volist name=":explode(',',$list_extend['type'])" id="feifei" offset="0" length="12"><a href="{:ff_url('news/type',array('type'=>urlencode($feifei),'id'=>$list_id,'p'=>1),true)}">{$feifei|msubstr=0,4}</a></volist></small>
</ol>
<div class="row">
<div class="col-xs-12">
  <div class="page-header">
    <h4 class="ff-text">大家都在看</h4>
  </div>
  <php>$item_news = ff_mysql_news('cid:'.$list_id.';limit:20;cache_name:default;cache_time:default;order:news_hits_lasttime;sort:desc');</php>
  <include file="Block:news_item_hot" />
</div>
<div class="clearfix ff-clearfix"></div>
<volist name=":explode(',',$list_extend['type'])" id="feifei" offset="0" length="12">
<php>$item_news = ff_mysql_news('cid:'.$list_id.';tag_name:'.$feifei.';tag_list:news_type;limit:20;cache_name:default;cache_time:default;order:news_addtime;sort:desc');</php>
<notempty name="item_news">
<div class="col-xs-12">
  <div class="page-header">
    <h4>
      <a class="ff-text" href="{:ff_url('news/type',array('type'=>urlencode($feifei),'id'=>$list_id,'p'=>1),true)}">最新{$feifei}</a>
    </h4>
  </div>
  <include file="Block:news_item_hot" />
</div>
<div class="clearfix ff-clearfix"></div>
</notempty>
</volist>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
</body>
</html>