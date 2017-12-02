<php>$item_special = ff_mysql_special('limit:30;tag_name:'.$special_type.';tag_list:special_type;page_is:true;page_id:special;page_p:'.$special_page.';cache_name:default;cache_time:default;order:special_stars;sort:desc');
$page = ff_url_page('special/show',array('type'=>urlencode($special_type),'p'=>'FFLINK'),true,'special',4);
$totalpages = ff_page_count('special', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:special_list" />
</head>
<body class="special-list">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">影视专题</li>
  <small class="pull-right">共有<span class="ff-text">{:ff_page_count('special', 'records')}</span>个专题 第<span class="ff-text">{$special_page}</span>页</small>
</ol>
<ul class="list-unstyled vod-item-img-horizontal">
  <volist name="item_special" id="feifei">
  <li class="col-xs-2">
    <a class="ff-text" href="{:ff_url('special/read', array('id'=>$feifei['special_id']), true)}">
    <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['special_logo'])}" alt="{$feifei.special_name}">
    <h5>{$feifei.special_name|msubstr=0,10}</h5>
    </a>
  </li>
  </volist>
</ul>
<!-- -->
<div class="row">
<gt name="totalpages" value="1">
  <div class="col-xs-12 text-center">
    <ul class="pagination pagination-lg hidden-xs">
      {$page}
    </ul>
  </div>
  <ul class="pager visible-xs">
    <gt name="special_page" value="1">
      <li><a id="ff-prev" href="{:ff_url('special/show',array('type'=>urlencode($special_type),'p'=>$special_page-1) )}">上一页</a></li>
    </gt>
    <lt name="special_page" value="$totalpages">
      <li><a id="ff-next" href="{:ff_url('special/show',array('type'=>urlencode($special_type),'p'=>$special_page+1) )}">下一页</a></li>
    </lt>
   </ul> 
</gt>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row wnd -->
</div>
</body>
</html>