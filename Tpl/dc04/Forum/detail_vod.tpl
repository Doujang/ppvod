<php>$list = ff_mysql_forum('pid:'.$forum_id.';limit:10;status:1;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
$page_info = ff_url_page('forum/detail',array('id'=>$forum_id,'p'=>'FFLINK'), true, 'forum', 4);
if($forum_cid){
	$vod = D('Vod')->ff_find('*', array('vod_id'=>array('eq',$forum_cid)), 'cache_page_vod_'.$forum_cid, true);
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:forum_detail_vod" />
</head>
<body class="forum-detail-vod ff-forum-reload">
<include file="Block:nav_pc" />
<div class="container ff-forum">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
  <li><a href="{:ff_url('forum/index', '', true)}">评论与留言</a></li>
  <li><a href="{:ff_url('forum/vod', '', true)}">影评</a></li>
  <li><a href="{:ff_url('forum/vod', array('cid'=>$forum_cid), true)}">{$vod['vod_name']}</a></li>
  <li class="active">影评主题</li>
  <small class="pull-right">
    相关链接： 
    <a href="{:ff_url('scenario/detail',array('id'=>$vod['vod_id']),true)}">{$vod.vod_name|msubstr=0,12}剧情</a>
    <a href="{:ff_url_vod_read($vod['list_id'],$vod['list_dir'],$vod['vod_id'],$vod['vod_ename'],$vod['vod_jumpurl'])}">{$vod.vod_name|msubstr=0,12}观看</a>
  </small>
</ol>
<!-- -->
<div class="row">
<include file="Block:forum_detail_vod" />
<div id="ff-forum-detail">
  <div class="col-xs-12">
    <p class="forum_detail">
      {$forum_content|htmlspecialchars} <small class="text-muted">{$user_name|htmlspecialchars} {$forum_addtime|date='Y-m-d',###}</small>
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
  <div class="clearfix"></div>
</div>
<!-- -->
<div id="ff-forum-post">
  <div class="col-xs-12" id="forum-reply-{$forum_id}">
    <include file="Block:forum_post" />
  </div>
  <div class="clearfix"></div>
</div>
<!-- -->
<div class="col-xs-12">
  <div class="page-header">
    <h4 class="ff-text">影评回复</h4>
  </div>
  <div id="ff-forum-item">
  	<include file="Block:forum_item" />
  </div>
  <div class="clearfix"></div>
</div>
<!-- -->
<gt name="page_array.totalpages" value="1">
<div id="ff-forum-page">
<div class="col-xs-12 text-center">
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
</div>
</div>
</gt>
<!--page end -->
<!-- -->
<div class="clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!-- -->
</body>
</html>