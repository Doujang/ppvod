<php>
$forum_sid = 2;
$item_list = ff_mysql_forum('cid:'.$forum_cid.';status:1;sid:2;pid:0;limit:20;page_is:true;page_id:forum;page_p:'.$forum_page.';order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
if($forum_cid){
	$news = $item_list[0];
	$page_info = ff_url_page('forum/news', array('cid'=>$forum_cid,'p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/news', array('cid'=>$forum_cid), true);
  $page_last = ff_url('forum/news', array('cid'=>$forum_cid,'p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/news', array('cid'=>$forum_cid,'p'=>($forum_page+1)), true);
}else{
	$page_info = ff_url_page('forum/news', array('p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/news', '', true);
  $page_last = ff_url('forum/news', array('p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/news', array('p'=>($forum_page+1)), true);
}
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:forum_category_news" />
</head>
<body class="forum-vod">
<include file="Block:header" />
<div class="container dc05 ff-forum" data-type="{$Think.config.forum_type}">
<div class="page-header">
  <h4><a href="{$page_this}">{$news['news_name']} 精彩评论</a></h4>
</div>
<!-- -->
<div class="hidden">
	<include file="Base:forum_post" />
</div>
<!-- -->
<notempty name="forum_cid">
<div class="media news-item-medial">
  <div class="media-body">
    <p class="text-muted news-remark">
      {$news.news_remark|strip_tags}
    </p>
  </div>
</div>
</notempty>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<div class="ff-forum-item">
	<include file="Base:forum_item" />
</div>
<!-- -->
<gt name="page_array.totalpages" value="1">
<div class="clearfix"></div>
<div class="text-center">
  <ul class="pager">
    <gt name="forum_page" value="1">
      <li><a id="ff-prev" href="{$page_last}">上一页</a></li>
    </gt>
    <lt name="forum_page" value="$page_array['totalpages']">
      <li><a id="ff-next" href="{$page_next}">下一页</a></li>
    </lt>
  </ul>
</div>
</gt>
</div><!--container end -->
<div class="clearfix ff-clearfix"></div>
<div class="container">
  <include file="Block:footer" />
</div>
</body>
</html>