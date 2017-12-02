<php>$list = ff_mysql_forum('sid:5;pid:0;limit:10;status:1;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
$page_info = ff_url_page('forum/guestbook',array('p'=>'FFLINK'), true, 'forum', 4);
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:forum_category_guestbook" />
</head>
<body class="ff-forum-reload forum-gusetbook">
<include file="Block:nav_pc" />
<div class="container ff-forum">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
  <li><a href="{:ff_url('forum/index', '', true)}">评论与留言</a></li>
 	<li class="active">联系我们</li>
  <small class="pull-right">共<span class="ff-text">{:ff_page_count('forum', 'records')}</span>篇留言、第<span class="ff-text">{$forum_page}</span>页</small>
</ol>
<div class="row">
<!-- -->
<div id="ff-forum-post">
  <div class="col-xs-12">
    <include file="Block:forum_post" />
  </div>
  <div class="clear"></div>
</div>
<!-- -->
<div id="ff-forum-item">
	<div class="col-xs-12">
		<include file="Block:forum_item" />
  </div>
  <div class="clear"></div>
</div>
<!-- -->
<div id="ff-forum-page">
  <div class="col-xs-12 text-center">
    <gt name="page_array.totalpages" value="1">
    <ul class="pagination pagination-lg hidden-xs hidden-sm">
      {$page_info}
    </ul>
    <ul class="pager visible-xs visible-sm">
      <gt name="forum_page" value="1">
        <li><a id="ff-prev" href="{:ff_url('forum/guestbook', array('p'=>($forum_page-1)), true)}">上一页</a></li>
      </gt>
      <lt name="forum_page" value="$page_array['totalpages']">
        <li><a id="ff-next" href="{:ff_url('forum/guestbook', array('p'=>($forum_page+1)), true)}">下一页</a></li>
      </lt>
    </ul> 
    </gt>
  </div>
  <div class="clear"></div>
</div><!--pageid end -->
<!-- -->
<div class="clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!-- -->
</body>
</html>