<!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<title>栏目、话题、标签_{$site_name}</title>
<meta name="keywords" content="栏目、话题、标签">
<meta name="description" content="{$site_name}网站地图、标签话题、热门话题、栏目分类、频道分类。">
</head>
<body class="ajax-tags">
<include file="Block:header" />
<div class="container">
	<div class="page-header">
    <h4>栏目分类</h4>
  </div>
  <ul class="list-unstyled ff-row tags-type">
    <volist name=":ff_mysql_tags('cid:3;limit:150;group:tag_name,tag_list;cache_name:default;cache_time:default;order:tag_count;sort:desc')" id="feifei">
    <li class="col-sm-2 col-xs-4 ff-col"><a class="btn btn-default btn-block" href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}" target="_blank">{$feifei.tag_name|msubstr=0,6} ({$feifei.tag_count})</a></li>
    </volist>
  </ul>
  <div class="clearfix"></div>
  <div class="page-header">
    <h4>热门话题</h4>
  </div>
  <ul class="list-unstyled ff-row tags-type">
    <volist name=":ff_mysql_tags('cid:4;limit:150;group:tag_name,tag_list;cache_name:default;cache_time:default;order:tag_count;sort:desc')" id="feifei">
    <li class="col-sm-2 col-xs-4 ff-col"><a class="btn btn-default btn-block" href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}" target="_blank">{$feifei.tag_name|msubstr=0,6} ({$feifei.tag_count})</a></li>
    </volist>
  </ul>
  <div class="clearfix ff-clearfix"></div>
  <include file="Block:footer" />
</div>
</body>
</html>