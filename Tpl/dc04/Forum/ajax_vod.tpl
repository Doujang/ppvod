<php>$list = ff_mysql_forum('cid:'.$forum_cid.';sid:'.$forum_sid.';pid:0;status:1;limit:10;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');$page_array = $_GET['ff_page_forum'];
if($forum_page > 1){
  if($forum_page > $page_array['totalpages']){
   exit();
  }
}</php>
<gt name="forum_page" value="1">
	<include file="Block:forum_item" />
<else/>
  <include file="Block:forum_ajax_vod" />
</gt>