<php>$forum_sid = 1;
$list = ff_mysql_forum('cid:'.$forum_cid.';status:1;sid:1;pid:0;limit:20;page_is:true;page_id:forum;page_p:'.$forum_page.';order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
if($forum_cid){
	$vod = $list[0];
	$page_info = ff_url_page('forum/vod', array('cid'=>$forum_cid,'p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/vod', array('cid'=>$forum_cid), true);
  $page_last = ff_url('forum/vod', array('cid'=>$forum_cid,'p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/vod', array('cid'=>$forum_cid,'p'=>($forum_page+1)), true);
}else{
	$page_info = ff_url_page('forum/vod', array('p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/vod', '', true);
  $page_last = ff_url('forum/vod', array('p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/vod', array('p'=>($forum_page+1)), true);
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:forum_category_vod" />
</head>
<body class="forum-vod ff-forum-reload">
<include file="Block:nav_pc" />
<div class="container ff-forum">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
  <li><a href="{:ff_url('forum/index', '', true)}">评论与留言</a></li>
  <gt name="forum_cid" value="0">
  	<li><a href="{:ff_url('forum/vod', '', true)}">影评</a></li>
  	<li class="active">{$vod['vod_name']}</li>
    <small class="pull-right">
    相关链接： 
      <a href="{:ff_url('scenario/detail',array('id'=>$vod['vod_id']),true)}">{$vod.vod_name|msubstr=0,12}剧情</a>
      <a href="{:ff_url_vod_read($vod['list_id'],$vod['list_dir'],$vod['vod_id'],$vod['vod_ename'],$vod['vod_jumpurl'])}">{$vod.vod_name|msubstr=0,12}观看</a>
    </small>
  <else/>
 		<li class="active">影评</li>
  	<small class="pull-right">共<span class="ff-text">{:ff_page_count('forum', 'records')}</span>篇影评、第<span class="ff-text">{$forum_page}</span>页</small>
  </gt>
</ol>
<!-- -->
<div class="row">
<include file="Block:forum_detail_vod" />
<div id="ff-forum-post" data-sid="1" style="display:none">
  <div class="col-xs-12" id="forum-reply-{$forum_id}">
    <include file="Block:forum_post" />
  </div>
  <div class="clearfix"></div>
</div>
<!--post end -->
<div class="col-xs-12" id="ff-forum-item">
  <include file="Block:forum_item" />
  <div class="clearfix"></div>
</div>
<!--item end --> 
<gt name="page_array.totalpages" value="1">
<div class="col-xs-12 text-center" id="ff-forum-page">
  <ul class="pagination pagination-lg hidden-xs">
    {$page_info}
  </ul>
  <ul class="pager visible-xs">
    <gt name="forum_page" value="1">
      <li><a id="ff-prev" href="{$page_last}">上一页</a></li>
    </gt>
    <lt name="forum_page" value="$page_array['totalpages']">
      <li><a id="ff-next" href="{$page_next}">下一页</a></li>
    </lt>
  </ul>
</div>
</gt>
<!--page end -->
<div class="clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!-- -->
</body>
</html>