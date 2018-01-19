<!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:header_meta" />
<include file="Seo:news_detail" />
</head>
<body class="news-detail">
<include file="Block:nav_pc" />
<div class="container">
<ol class="breadcrumb">
  <li><a href="{$root}">首页</a></li>
 	<li><a href="{:ff_url_news_show($list_id,$list_dir,1)}">{$list_name}</a></li>
  <li class="active">详情</li>
</ol>
<div class="page-header">
  <h3 class="text-center">
    {$news_name}
  </h3>
  <h5 class="text-muted text-center visible-md visible-lg">
    来源：{$news_inputer|default='佚名'}
    人气：{$news_hits}
    更新：{$news_addtime|date='Y-m-d H:i:s',###}
  </h5>          
</div>
<div class="row">
<div class="col-xs-12">
  <p class="lead text-muted">
    {$news_remark}
  </p> 
  <div class="content">
    {:ff_url_tags_content($news_content, $Tag)}
  </div>
  <p class="tags text-right">
    <volist name="Tag" id="feifei">
    <notempty name="feifei.tag_name">
    <eq name="feifei.tag_list" value="news_type">
      <span class="label label-default">
      <a href="{:ff_url('news/type',array('type'=>urlencode($feifei['tag_name']),'id'=>$list_id),true)}">{$feifei.tag_name}</a>
      </span>
    <else/>
      <span class="label label-success">
      <a href="{:ff_url_tags($feifei['tag_name'],$feifei['tag_list'])}">{$feifei.tag_name}</a>
      </span>
    </eq>
    </notempty>
    </volist>
  </p>  
  <p class="up text-center">
    <a class="btn btn-default btn-lg ff-updown" href="javascript:;" data-id="{$news_id}" data-module="news" data-type="up" data-toggle="tooltip" data-placement="top" title="有用"><span class="glyphicon glyphicon-thumbs-up"></span> 有用（<span class="ff-updown-tips">{$news_up}</span>）</a>
  </p>
  <!-- -->
  <gt name="news_page_count" value="1">
    <ul class="pager">
      <gt name="news_page" value="1">
        <li><a href="{:ff_url_news_read($list_id,$list_dir,$news_id,$news_ename,$news_jumpurl,$news_page-1)}">上一页</a></li>
      </gt>
      <lt name="news_page" value="$news_page_count">
        <li><a href="{:ff_url_news_read($list_id,$list_dir,$news_id,$news_ename,$news_jumpurl,$news_page+1)}">下一页</a></li>
      </lt>
    </ul>
  </gt>
  <!-- -->
  <php>$detail_prev = ff_detail_array('news', 'prev', $news_id, $news_cid);
  $detail_next = ff_detail_array('news', 'next', $news_id, $news_cid);</php>           
  <ul class="list-unstyled more">
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
<div class="clearfix ff-clearfix"></div>
<!-- -->
<div class="col-xs-12">
  <div class="page-header">
    <h4 class="ff-text">大家都在看</h4>
  </div>
  <php>$item_news = ff_mysql_news('cid:'.$list_id.';limit:20;cache_name:default;cache_time:default;order:news_hits_lasttime;sort:desc');</php>
  <include file="Block:news_item_hot" />
</div>
<div class="clearfix ff-clearfix"></div>
<!-- -->
<div class="col-xs-12 ff-col">
	<div class="page-header">
    <h4 class="ff-text">发表评论</h4>
  </div>
	<include file="Block:news_ajax_forum" />
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div>
{$news_hits_insert}
</body>
</html>