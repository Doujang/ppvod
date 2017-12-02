<php>$item_list = ff_mysql_vod('cid:'.$vod_cid.';limit:6;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');</php>
<include file="Block:vod_item_img_vertical" />