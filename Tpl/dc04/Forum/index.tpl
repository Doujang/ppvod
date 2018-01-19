<php>$list = ff_mysql_forum('pid:0;limit:20;status:1;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
$page_info = ff_url_page('forum/index', array('p'=>'FFLINK'), true, 'forum', 4);
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:forum_index" />
</head>
<body class="forum-index">
<include file="Block:nav_pc" />
<div class="container ff-forum">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">评论与留言</li>
  <small class="pull-right">共有<span class="ff-text">{:ff_page_count('forum', 'records')}</span>篇评论与留言 第<span class="ff-text">{$forum_page}</span>页</small>
</ol>
<div class="row">
<div id="ff-forum-item">
<volist name="list" id="feifei">
<ul class="list-unstyled">
  <li class="col-xs-1">
    <a href="{:ff_url('user/index',array('id'=>$feifei['user_id']),true)}" target="_blank">
    <img src="{$feifei.user_face|ff_url_img|default=$root.'Public/images/face/default.png'}" class="img-rounded forum-face">
    </a>
  </li>
  <li class="col-xs-11">
    <p class="forum-title">
      <a href="{:ff_url('user/index',array('id'=>$feifei['user_id']),true)}" target="_blank">{$feifei.user_name|htmlspecialchars}</a>
      <small>
      <if condition="$feifei['forum_sid'] eq 1">
      <a href="{:ff_url('forum/'.ff_sid2module($feifei['forum_sid']), array('cid'=>$feifei['forum_cid']), true)}">影评</a>
      <elseif condition="$feifei['forum_sid'] eq 2"/>
      <a href="{:ff_url('forum/'.ff_sid2module($feifei['forum_sid']), array('cid'=>$feifei['forum_cid']), true)}">评论</a>
      <elseif condition="$feifei['forum_sid'] eq 5"/>留言<else/>评论</if>
      {$feifei.forum_addtime|date='Y/m/d',###}
     </small>
    </p>
    <p class="forum-content text-muted">
      {$feifei.forum_content|htmlspecialchars|msubstr=0,300,true}
    </p>
    <p class="forum-btn">
      <a class="btn btn-default btn-xs ff-updown" id="ff-up-{$feifei.forum_id}" href="javascript:;" data-id="{$feifei.forum_id}" data-module="forum" data-type="up" data-toggle="tooltip" data-placement="top" title="支持"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="ff-updown-tips">{$feifei.forum_up}</span></a>
      <a class="btn btn-default btn-xs ff-updown" id="ff-down-{$feifei.forum_id}" href="javascript:;" data-id="{$feifei.forum_id}" data-module="forum" data-type="down" data-toggle="tooltip" data-placement="top" title="反对"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="ff-updown-tips">{$feifei.forum_down}</span></a>
      <a class="btn btn-default btn-xs ff-reply" href="{:ff_url('forum/detail', array('id'=>$feifei['forum_id']), true)}"><span class="glyphicon glyphicon-align-right"></span> 详情</a>
    </p>
    <p class="collapse forum-reply" id="forum-reply-{$feifei.forum_id}">
    </p>
    <div class="col-xs-12 clear forum-clear"></div>
  </li>
</ul>
</volist>
</div>
<div class="clearfix"></div>
<!-- -->
<div id="ff-forum-page">
<div class="col-xs-12 text-center">
  <gt name="page_array.totalpages" value="1">
    <ul class="pagination pagination-lg hidden-xs hidden-sm">
      {$page_info}
    </ul>
    <ul class="pager visible-xs visible-sm">
      <gt name="forum_page" value="1">
        <li><a id="ff-prev" href="{:ff_url('forum/index', array('p'=>($forum_page-1)), true)}">上一页</a></li>
      </gt>
      <lt name="forum_page" value="$page_array['totalpages']">
        <li><a id="ff-next" href="{:ff_url('forum/index', array('p'=>($forum_page+1)), true)}">下一页</a></li>
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