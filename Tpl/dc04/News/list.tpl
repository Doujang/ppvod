<php>$item_news = ff_mysql_news('cid:'.$list_id.';limit:20;page_is:true;page_id:list;page_p:'.$list_page.';cache_name:default;cache_time:default;order:news_addtime;sort:desc');
$page = ff_url_page('news/'.$action,array('id'=>$list_id,'list_dir'=>$list_dir,'p'=>'FFLINK'),true,'list',4);
$totalpages = ff_page_count('list', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:news_list" />
</head>
<body class="news-list">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li class="active">最新{$list_name}</li>
  <small class="pull-right">共有<span class="ff-text">{:ff_page_count('list', 'records')}</span>篇内容 第<span class="ff-text">{$list_page}</span>页</small>
</ol>
<ul class="nav nav-pills">
  <volist name=":explode(',',$list_extend['type'])" id="feifei" offset="0" length="12">
  <eq name="feifei" value="$type_type">
  <li class="active"><a href="{:ff_url('news/type',array('type'=>urlencode($feifei),'id'=>$list_id,'p'=>1),true)}">{$feifei}</a></li>
  <else/>
  <li><a href="{:ff_url('news/type',array('type'=>urlencode($feifei),'id'=>$list_id,'p'=>1),true)}">{$feifei}</a></li>
  </eq>
  </volist>
</ul>
<div class="row">
<div class="col-xs-12">
  <include file="Block:news_item_medial" />
</div>
<div class="clearfix"></div>
<gt name="totalpages" value="1">
  <div class="col-xs-12 ff-col text-center">
    <ul class="pagination pagination-lg hidden-xs">
      {$page}
    </ul>
    <ul class="pager visible-xs">
      <gt name="list_page" value="1">
        <li><a id="ff-prev" href="{:ff_url_news_show($list_id,$list_dir,$list_page-1)}">上一页</a></li>
      </gt>
      <lt name="list_page" value="$totalpages">
        <li><a id="ff-next" href="{:ff_url_news_show($list_id,$list_dir,$list_page+1)}">下一页</a></li>
      </lt>
     </ul>
  </div>
  <div class="clearfix"></div>
</gt>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
</body>
</html>