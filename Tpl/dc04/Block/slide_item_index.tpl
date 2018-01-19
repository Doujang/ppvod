<volist name=":ff_mysql_list('sid:1;limit:4;cache_name:default;cache_time:default;order:list_pid asc,list_oid;sort:asc')" id="feifeilist">
<php>$item = ff_mysql_vod('cid:'.$feifeilist['list_id'].';limit:24;cache_name:default;cache_time:default;order:vod_stars desc,vod_addtime;sort:desc');</php>
<div class="carousel slide" id="ff-slide-{$feifeilist.list_id}">
	<h4>
  	<a href="{:ff_url('vod/type',array('id'=>$feifeilist['list_id'],'type'=>'','area'=>'','year'=>'','star'=>'','state'=>'','ispay'=>'','order'=>'hits','p'=>1),true)}">{$feifeilist.list_name}精选</a>
    <small><a class="pull-right" href="{:ff_url('vod/type',array('id'=>$feifeilist['list_id'],'type'=>'','area'=>'','year'=>'','star'=>'','state'=>'','ispay'=>'','order'=>'addtime','p'=>1),true)}">全部{$feifeilist.list_name}>></a></small>
  </h4>
  <!-- 轮播（Carousel）指标 -->
  <ol class="carousel-indicators">
  	<li data-target="#ff-slide-{$feifeilist.list_id}" data-slide-to="0" class="active"></li>
    <li data-target="#ff-slide-{$feifeilist.list_id}" data-slide-to="1"></li>
    <li data-target="#ff-slide-{$feifeilist.list_id}" data-slide-to="2"></li>
    <li data-target="#ff-slide-{$feifeilist.list_id}" data-slide-to="3"></li>
  </ol>
  <!-- 轮播（Carousel）项目 -->
  <div class="carousel-inner">
  	<ul class="item list-unstyled active">
      <volist name="item" id="feifei" offset="0" length="6">
      <li class="col-xs-2">
        <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
          <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
        </a>
        <p class="ff-continu">
        	<include file="Block:vod_continu_foreach" />
        </p>
        <h5 class="ff-text-hidden">
          <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,10}</a>
        </h5>
        <h6 class="ff-text-hidden ff-link">
        	主演：{$feifei.vod_actor|ff_url_search}
        </h6>
        <h6>
        	播放量：{$feifei.vod_hits|number_format}
        </h6>
      </li>
      </volist>
    </ul>
    <ul class="list-unstyled item">
      <volist name="item" id="feifei" offset="6" length="6">
      <li class="col-xs-2">
        <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
          <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
        </a>
        <p class="ff-continu">
        	<include file="Block:vod_continu_foreach" />
        </p>
        <h5 class="ff-text-hidden">
          <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,10}</a>
        </h5>
        <h6 class="ff-text-hidden ff-link">
        	主演：{$feifei.vod_actor|ff_url_search}
        </h6>
        <h6>
        	播放量：{$feifei.vod_hits|number_format}
        </h6>
      </li>
      </volist>
    </ul>
    <ul class="item list-unstyled">
      <volist name="item" id="feifei" offset="12" length="6">
      <li class="col-xs-2">
        <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
          <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
        </a>
        <p class="ff-continu">
        	<include file="Block:vod_continu_foreach" />
        </p>
        <h5 class="ff-text-hidden">
          <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,10}</a>
        </h5>
        <h6 class="ff-text-hidden ff-link">
        	主演：{$feifei.vod_actor|ff_url_search}
        </h6>
        <h6>
        	播放量：{$feifei.vod_hits|number_format}
        </h6>
      </li>
      </volist>
    </ul>
    <ul class="item list-unstyled">
      <volist name="item" id="feifei" offset="18" length="6">
      <li class="col-xs-2">
        <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
          <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
        </a>
        <p class="ff-continu">
        	<include file="Block:vod_continu_foreach" />
        </p>
        <h5 class="ff-text-hidden">
          <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,10}</a>
        </h5>
        <h6 class="ff-text-hidden ff-link">
        	主演：{$feifei.vod_actor|ff_url_search}
        </h6>
        <h6>
        	播放量：{$feifei.vod_hits|number_format}
        </h6>
      </li>
      </volist>
    </ul>
  </div>
</div>
</volist>