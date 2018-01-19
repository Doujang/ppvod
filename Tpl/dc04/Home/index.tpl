<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<include file="Block:header_meta" />
<include file="Seo:index" />
</head>
<body class="index">
<include file="Block:nav_pc" />
<div class="container">
<div class="row">
<div class="col-xs-8">
  <include file="Block:slide_index" />
  <div class="clearfix"></div>
  <php>$item = ff_mysql_vod('field:*;cid:5;limit:22;cache_name:default;cache_time:default;order:vod_stars desc,vod_id;sort:desc');</php>
  <ul class="list-unstyled first">
    <volist name="item" id="feifei" offset="0" length="2">
    <li class="col-xs-6"><a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">{$feifei.vod_name|msubstr=0,18,true}</a></li>
    </volist>
  </ul>
  <ul class="list-unstyled item-txt">
    <volist name="item" id="feifei" offset="2" length="12">
    <li class="col-xs-6"><a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">{$feifei.vod_name|msubstr=0,18,true}</a></li>
    </volist>
  </ul>
</div>
<div class="col-xs-4">
  <ul class="list-unstyled vod-item-img-horizontal">
  <volist name="item" id="feifei" offset="12" length="8">
    <li class="col-xs-6 index">
      <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
        <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
      </a>
      <h5>
        <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,18,true}</a>
      </h5>
    </li>
  </volist>
  </ul>
</div>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<!-- -->
<div class="col-xs-12">
  <div class="nav-sub">
    <ul class="list-inline col-xs-5">
      <li id="nav-sub-index" class="active"><a href="{$root}">精选</a><span class="ico-arr"></span></li>
      <php>$item = ff_mysql_list('field:*;sid:1;limit:5;cache_name:default;cache_time:default;order:list_pid asc,list_oid;sort:asc');</php>
      <volist name="item" id="feifei" offset="0" length="5">
      <li id="nav-{$feifei.nav_tips}"><a href="{:ff_url('vod/type',array('id'=>$feifei['list_id'],'type'=>'','area'=>'','year'=>'','star'=>'','state'=>'','order'=>'addtime','p'=>1),true)}">{$feifei.list_name}</a></li>
      </volist>
    </ul>
    <ul class="list-inline col-xs-7 text-right">
      <php>$item_end = end($item); $list_extend = json_decode($item_end['list_extend'],true);</php>
      <volist name=":explode(',',$list_extend['type'])" id="feifei" offset="0" length="12">
      <li id="nav-{$feifei.nav_tips}"><a href="{:ff_url('vod/type',array('id'=>$item_end['list_id'],'type'=>urlencode($feifei),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'addtime','p'=>1),true)}">{$feifei}</a></li>
      </volist>
    </ul>
  </div>
</div>
<div class="clearfix"></div>
<div class="col-xs-12 slide-item">
  <include file="Block:slide_item_index" />
</div>
<div class="clearfix"></div>
<!-- -->
<div class="col-xs-12">
  <div class="text-center ff-ads">
  {:ff_url_ads('960_90')}
  </div>
</div>
<div class="clearfix ff-clearfix"></div>
<!-- -->
<div class="col-xs-12">
  <div class="page-header">
    <h5>友情链接</h5>
  </div>
  <p class="ff-link">
    <volist name=":ff_mysql_link('limit:20;cache_name:default;cache_time:default;order:link_order;sort:asc')" id="feifei"><a href="{$feifei.link_url}" target="_blank">{$feifei.link_name}</a></volist>
  </p>
</div>
<div class="clearfix ff-clearfix"></div>
<div class="col-xs-12 text-center">
  <include file="Block:footer" />
</div>
</div><!--row end -->
</div><!--container end -->
</body>
</html>