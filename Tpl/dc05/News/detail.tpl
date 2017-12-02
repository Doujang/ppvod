<!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Base:header_meta" />
<include file="Seo:news_detail" />
</head>
<body class="news-detail">
<include file="Block:header" />
<div class="container dc05">
<div class="page-header">
  <h1>{$news_name}</h1>
  <h5 class="text-muted visible-md visible-lg">
    <i class="fa fa-clock-o">
    	{$news_addtime|date='Y-m-d',###}
    </i>
    <i class="fa fa-eye">
    	{$news_hits}
    </i>
    <i class="fa fa-tags ff-text-right">
      <volist name="Tag" id="feifei"><eq name="feifei.tag_list" value="news_type"><a href="{:ff_url('news/type',array('id'=>$news_cid,'type'=>urlencode($feifei['tag_name'])),true)}">{$feifei.tag_name|msubstr=0,8}</a><else/><a href="{:ff_url('news/tags',array('name'=>urlencode($feifei['tag_name'])),true)}">{$feifei.tag_name|msubstr=0,8}</a></eq></volist>
    </i>
  </h5>         
</div>
<div class="row">
<div class="col-xs-12">
  <div class="news-content">
    {:ff_url_tags_content(strip_tags($news_content,"<a>,<p>,<img>,<center>,<b>,<strong>,<pre>,<code>,<ol>,<ul>,<li>,<dl>,<dt>,<dd>,<table>,<caption>,<thead>,<tbody>,<tfoot>,<col>,<colgroup>,<tr>,<th>,<td>"),$Tag)}
  </div> 
  <!-- --> 
  <p class="news-up text-center">
    <a class="btn btn-default btn-lg ff-record-set" href="javascript:;" data-sid="{$site_sid}" data-id="{$news_id}" data-type="2" data-toggle="tooltip" data-placement="top" title="喜欢"><i class="fa fa-feed"></i> 收藏</a>
    <a class="btn btn-default btn-lg ff-updown-set" href="javascript:;" data-id="{$news_id}" data-module="news" data-type="up" data-toggle="tooltip" data-placement="top" title="支持"><i class="fa fa-thumbs-o-up"></i>赞 <span class="ff-updown-val">{$news_up|default=1}</span></a>
 		<gt name="news_page_count" value="1">
      <gt name="news_page" value="1">
        <a class="btn btn-default btn-lg" href="{:ff_url_news_read($list_id,$list_dir,$news_id,$news_ename,$news_jumpurl,$news_page-1)}">上一页</a>
      </gt>
      <lt name="news_page" value="$news_page_count">
        <a class="btn btn-default btn-lg" href="{:ff_url_news_read($list_id,$list_dir,$news_id,$news_ename,$news_jumpurl,$news_page+1)}">下一页</a>
      </lt>
    </gt>    
  </p> 
  <!-- -->
  <php>$detail_prev = ff_detail_array('news', 'prev', $news_id, $news_cid);
  $detail_next = ff_detail_array('news', 'next', $news_id, $news_cid);</php>           
  <ul class="list-unstyled news-more">
  <empty name="detail_prev">
    <li>上一篇：没有了</li>
  <else/>
    <li>上一篇：<a id="ff-prev" href="{:ff_url_news_read($list_id,$list_dir,$detail_prev['news_id'],$detail_prev['news_ename'],$detail_prev['news_jumpurl'],1)}">{$detail_prev.news_name}</a></li>
  </empty>
  <empty name="detail_next">
    <li>下一篇：没有了</li>
  <else/>
    <li>下一篇：<a id="ff-next" href="{:ff_url_news_read($list_id,$list_dir,$detail_next['news_id'],$detail_next['news_ename'],$detail_next['news_jumpurl'],1)}">{$detail_next.news_name}</a></li>
  </empty>
  </ul>
</div>
</div><!--row end -->
<include file="Base:news_forum" />
<div class="clearfix"></div>
<!-- -->
<div class="page-header">
  <h4>推荐阅读</h4>
</div>
<volist name=":ff_mysql_news('cid:'.$list_id.';limit:10;cache_name:default;cache_time:default;order:news_up desc,news_id;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content')" id="feifei">
<include file="Block:news_item" />
</volist>
<!-- -->
{$news_hits_insert}
</div><!--container end -->
<div class="clearfix ff-clearfix"></div>
<div class="container ff-bg">
  <include file="Block:footer" />
</div>
</body>
</html>