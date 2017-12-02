<php>
$ajax_cid = intval($_GET['cid']);
$ajax_page = !empty($_GET['p']) ? intval($_GET['p']) : 1;
$ajax_order = !empty($_GET['order']) ? ff_order_by($_GET['order']) : 'addtime';
if($_GET['tagtype'] == 'type'){
  $item_news = ff_mysql_news(array(
    'cid'=> ff_list_ids($ajax_cid),
    'limit'=> 20,
    'page_is'=> true,
    'page_id'=> 'ajax',
    'page_p'=> $ajax_page,
    'tag_name'=> htmlspecialchars(strip_tags(urldecode(trim($_GET['wd'])))),
    'tag_cid'=> '3',
    'cache_name'=> 'default',
    'cache_time'=> 'default',
    'order'=> 'news_'.$ajax_order,
    'sort'=> 'desc',
    'field'=>'list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content'
  ));
}elseif($_GET['tagtype'] == 'tags'){
  $item_news = ff_mysql_news(array(
    'limit'=> 20,
    'page_is'=> true,
    'page_id'=> 'ajax',
    'page_p'=> $ajax_page,
    'tag_name'=> htmlspecialchars(strip_tags(urldecode(trim($_GET['wd'])))),
    'tag_cid'=> '3,4',
    'cache_name'=> 'default',
    'cache_time'=> 'default',
    'order'=> 'news_'.$ajax_order,
    'sort'=> 'desc',
    'field'=>'list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content'
  ));
}elseif($_GET['tagtype'] == 'search'){
  $item_news = ff_mysql_news(array(
    'limit'=> 20,
    'page_is'=> true,
    'page_id'=> 'ajax',
    'page_p'=> $ajax_page,
    'name'=> htmlspecialchars(strip_tags(urldecode(trim($_GET['wd'])))),
    'cache_name'=> 'default',
    'cache_time'=> 'default',
    'order'=> 'news_'.$ajax_order,
    'sort'=> 'desc',
    'field'=>'list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content'
  ));
}else{
  $item_news = ff_mysql_news(array(
    'cid'=> ff_list_ids($ajax_cid),
    'limit'=> 20,
    'page_is'=> true,
    'page_id'=> 'ajax',
    'page_p'=> $ajax_page,
    'cache_name'=> 'default',
    'cache_time'=> 'default',
    'order'=> 'news_'.$ajax_order,
    'sort'=> 'desc',
    'field'=>'list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content'
  ));
}
$page_array = $_GET['ff_page_ajax'];
if($ajax_page > $page_array['totalpages']){
 exit();
}
</php>
<volist name="item_news" id="feifei">
<include file="Block:news_item" />
</volist>