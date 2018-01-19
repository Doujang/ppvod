<php>
$series_array = explode(',',$vod_series);
if(count($series_array) > 1 ){
	$item_list = ff_mysql_vod('ids:'.$vod_series.';limit:6;cache_name:default;cache_time:default;order:vod_id;sort:desc');
}else{
	$item_list = ff_mysql_vod('series:'.$vod_series.';limit:6;cache_name:default;cache_time:default;order:vod_id;sort:desc');
}
</php>
<include file="Block:vod_item_img_vertical" />