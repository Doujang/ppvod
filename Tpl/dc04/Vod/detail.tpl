<php>$item_yugao = ff_play_one($vod_play_list,'yugao');</php>
<php>$item_down = ff_play_one($vod_play_list,'down');</php>
<php>$item_play = ff_play_one($vod_play_list,'max');//$item_play_end = end($item_play['son']);</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:vod_detail" />
</head>
<body class="vod-detail ff-bg">
<include file="Block:nav_pc" />
<div class="container">
<div class="page-header">
  <h4 class="ff-link">
    <a class="ff-text" href="{:ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl)}">{$vod_name|msubstr=0,30}</a> 
    <small><include file="Block:vod_continu" /></small>
  </h4>
</div>
<div class="row">
<div class="col-xs-8 ff-info">
  <include file="Block:vod_detail_info" />
</div>
<div class="col-xs-4 ff-ads text-right">
  {:ff_url_ads('300_250')}
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12">
  <include file="Block:vod_detail_tab" />
</div>
<div class="clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
<!-- -->
</div><!--row end -->
</div>
</body>
</html>