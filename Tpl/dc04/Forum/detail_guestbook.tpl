<php>$list = ff_mysql_forum('pid:'.$forum_id.';limit:10;status:1;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
$page_info = ff_url_page('forum/detail',array('id'=>$forum_id,'p'=>'FFLINK'), true, 'forum', 4);
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:forum_detail_guestbook" />
</head>
<body class="ff-forum-reload forum-gusetbook">
<include file="Block:nav_pc" />
<div class="container ff-forum">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
  <li><a href="{:ff_url('forum/index', '', true)}">评论与留言</a></li>
  <li><a href="{:ff_url('forum/guestbook', '', true)}">联系我们</a></li>
 	<li class="active">留言主题</li>
</ol>
<div class="row">
<div id="ff-forum-detail">
  <div class="col-xs-12">
    <h5 class="text-muted">
      {$forum_addtime|date='Y-m-d',###}
      {$user_name|htmlspecialchars}
    </h5> 
    <p class="forum_detail">
      {$forum_content|htmlspecialchars}
    </p>
    <p class="text-center">
      <a class="btn btn-default ff-updown" href="javascript:;" data-id="{$forum_id}" data-module="forum" data-type="up" data-toggle="tooltip" data-placement="top" title="有用">
        <span class="glyphicon glyphicon-thumbs-up"></span> 有用（<span class="ff-updown-tips">{$forum_up}</span>）
      </a>
      <a class="btn btn-default ff-updown" href="javascript:;" data-id="{$forum_id}" data-module="forum" data-type="down" data-toggle="tooltip" data-placement="top" title="反对">
        <span class="glyphicon glyphicon-thumbs-up"></span> 反对（<span class="ff-updown-tips">{$forum_down}</span>）
      </a>
      <a class="btn btn-default ff-reply" id="ff-reply-{$forum_id}" href="javascript:;" data-id="{$forum_id}">
        <span class="glyphicon glyphicon-comment"></span> 回复（<span class="ff-reply-tips">{$forum_reply}</span>）
      </a>
    </p>
  </div>
</div>
<div class="clearfix"></div>
<div id="ff-forum-post">
  <div class="col-xs-12" id="forum-reply-{$forum_id}">
    <include file="Block:forum_post" />
  </div>
</div>
<div class="clearfix"></div>
<!-- -->
<div class="col-xs-12">
  <div class="page-header">
    <h4 class="ff-text">留言回复</h4>
  </div>
</div>
<div class="clearfix"></div>
<div id="ff-forum-item">
	<div class="col-xs-12">
		<include file="Block:forum_item" />
  </div>
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
        <li><a id="ff-prev" href="{:ff_url('forum/detail', array('id'=>$forum_id,'p'=>($forum_page-1)), true)}">上一页</a></li>
      </gt>
      <lt name="forum_page" value="$page_array['totalpages']">
        <li><a id="ff-next" href="{:ff_url('forum/detail', array('id'=>$forum_id,'p'=>($forum_page+1)), true)}">下一页</a></li>
      </lt>
    </ul> 
    </gt>
  </div>
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