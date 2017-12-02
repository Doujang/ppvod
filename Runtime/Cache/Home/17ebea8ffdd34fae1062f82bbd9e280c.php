<?php if (!defined('THINK_PATH')) exit();?><?php $item_vod = ff_mysql_vod('cid:'.$type_id.';limit:30;tag_name:'.$type_type.';tag_list:vod_type;area:'.$type_area.';year:'.implode(',',str_split($type_year,4)).';actor:'.$type_star.';state:'.$type_state.';page_is:true;page_id:type;page_p:'.$type_page.';cache_name:default;cache_time:default;order:vod_'.$type_order.';sort:desc');
$params = array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>'FFLINK');
$page = ff_url_page('vod/type', $params, true, 'type', 4);
$totalpages = ff_page_count('type', 'totalpages'); ?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="<?php echo ($root); ?>favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="./Public/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="./Tpl/default/system.css?<?php echo L("feifeicms_version");?>">
<script type="text/javascript">var cms = {
root:"<?php echo ($root); ?>",urlhtml:"<?php echo (C("url_html")); ?>",sid:"<?php echo ($site_sid); ?>",id:"<?php echo ($vod_id); ?><?php echo ($news_id); ?><?php echo ($special_id); ?>",userid:"<?php echo ($site_user_id); ?>",username:"<?php echo ($site_user_name); ?>",userforum:"<?php echo (C("user_forum")); ?>",page:"<?php echo (($list_page)?($list_page):1); ?>",domain_m:"<?php echo ($site_domain_m); ?>"
};</script><script type="text/javascript" src="./Public/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="./Public/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./Public/js/system.js?<?php echo L("feifeicms_version");?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo ($public_path); ?>html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="<?php echo ($public_path); ?>respond/1.4.2/respond.min.js"></script>
<![endif]-->
<title><?php echo ($type_type); ?><?php echo ($type_area); ?><?php echo ($type_year); ?><?php echo ($type_star); ?><?php echo ($type_state); ?><?php echo ($list_name); ?>大全-<?php echo ($list_name); ?>排行榜-<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($list_keywords); ?>">
<meta name="description" content="<?php echo ($list_description); ?>">
</head>
<body class="vod-type">
<nav class="navbar navbar-inverse" role="navigation" data-dir="#nav-<?php echo ($list_dir); ?>">
  <div class="container">
  	<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-feifeicms">
        <span class="glyphicon glyphicon-align-justify"></span>
      </button>      
      <?php if(($site_user_id)  >  "0"): ?><a class="navbar-toggle btn" href="<?php echo ff_url('user/center');?>">
          <span class="glyphicon glyphicon-user"></span>
        </a>
      <?php else: ?>
      	<a class="navbar-toggle btn ff-user user-login-modal" href="<?php echo ff_url('user/login');?>" data-href="<?php echo ff_url('user/center');?>">
          <span class="glyphicon glyphicon-user"></span>
        </a><?php endif; ?>
      <a class="navbar-toggle btn" href="<?php echo ff_url('ajax/search');?>">
        <span class="glyphicon glyphicon-search"></span>
      </a>
			<?php if(($model)  !=  "index"): ?><a class="navbar-toggle btn ff-goback" href="javascript:;"><span class="glyphicon glyphicon-chevron-left"></span></a><?php endif; ?>      
      <a class="navbar-brand" href="<?php echo ($root); ?>"><?php echo ($site_name); ?></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-feifeicms">
    	<ul class="nav navbar-nav navbar-left">
  <?php $_result=ff_mysql_nav('field:*;limit:0;cache_name:default;cache_time:default;order:nav_pid asc,nav_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><?php if(!empty($feifei["nav_son"])): ?><li class="dropdown">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($feifei["nav_title"]); ?><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <?php if(is_array($feifei["nav_son"])): $i = 0; $__LIST__ = $feifei["nav_son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeison): ++$i;$mod = ($i % 2 )?><?php if(($feifeison["nav_target"])  ==  "1"): ?><li><a href="<?php echo ($feifeison["nav_link"]); ?>" target="_blank"><?php echo ($feifeison["nav_title"]); ?></a></li>
         <?php else: ?>
          <li><a href="<?php echo ($feifeison["nav_link"]); ?>"><?php echo ($feifeison["nav_title"]); ?></a></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </li>
  <?php else: ?>
     <?php if(($feifei["nav_target"])  ==  "1"): ?><li id="nav-<?php echo ($feifei["nav_tips"]); ?>"><a href="<?php echo ($feifei["nav_link"]); ?>" target="_blank"><?php echo ($feifei["nav_title"]); ?></a></li>
    <?php else: ?>
      <li id="nav-<?php echo ($feifei["nav_tips"]); ?>"><a href="<?php echo ($feifei["nav_link"]); ?>"><?php echo ($feifei["nav_title"]); ?></a></li><?php endif; ?><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
  <li class="hidden-xs"><a class="ff-record-get" href="javascript:;" data-toggle="popover" data-container="body" data-html="true" data-trigger="manual" data-placement="bottom" data-content="loading...">看过</a></li>
  <li class="visible-sm"><a href="<?php echo ff_url('user/center');?>"><span class="glyphicon glyphicon-user"></span></a></li>
  <li class="visible-sm"><a href="<?php echo ff_url('ajax/search');?>"><span class="glyphicon glyphicon-search"></span></a></li>
</ul>
      <div class="visible-md visible-lg">
      	<form class="navbar-form navbar-right ff-search" id="ff-search" data-sid="<?php echo ($site_sid); ?>" role="search" action="<?php echo ($root); ?>index.php?s=vod-search-name" method="post">
  <div class="input-group input-group-sm">
    <span class="input-group-addon">
    	<?php if(($site_user_id)  >  "0"): ?><a class="text-muted" href="<?php echo ff_url('user/center');?>" data-toggle="tooltip" data-placement="bottom" title="我的用户中心"><span class="glyphicon glyphicon-user"></span></a>
      <?php else: ?>
      	<a class="text-muted ff-user user-login-modal" href="<?php echo ff_url('user/login');?>" data-href="<?php echo ff_url('user/center');?>" data-toggle="tooltip" data-placement="bottom" title="点击登录"><span class="glyphicon glyphicon-user"></span></a><?php endif; ?>
    </span>
    <input type="text" class="form-control ff-wd" id="ff-wd" name="wd" placeholder="请输入影片名称">
    <div class="input-group-btn">
      <button type="submit" class="btn btn-default" data-action="<?php echo ff_url('vod/search',array('name'=>'FFWD'), true);?>">
        <span class="glyphicon glyphicon-search"></span>
      </button>
    </div>
  </div>
</form>
      </div>
    </div>
  </div><!-- /.container -->
</nav><!-- /.navbar -->
<div class="container ff-bg">
  <div class="page-header">
    <h2><span class="glyphicon glyphicon-film ff-text"></span> <?php echo ($list_name); ?>
    <small><?php echo ($type_type); ?> <?php echo ($type_area); ?> <?php echo ($type_year); ?> <?php echo ($type_star); ?> <?php echo ($type_state); ?> 共有<label class="ff-text"><?php echo ff_page_count('type', 'records');?></label>个影片  第<span class="ff-text"><?php echo ($type_page); ?></span>页</small>
    </h2>
  </div>
  <dl class="dl-horizontal">
    <dt>频道：</dt>
    <dd class="text-nowrap ff-gallery">
    <?php $_result=ff_mysql_list('sid:1;limit:12;cahce_name:default;cahce_time:default;order:list_pid asc,list_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['list_id'],'type'=>'','area'=>'','year'=>'','star'=>'','state'=>'','order'=>'addtime','p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="id<?php echo md5($feifei['list_id']);?>"><?php echo ($feifei["list_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd>
    <dt>类型：</dt>
    <dd class="text-nowrap ff-gallery ff-text-right">
    <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>'','area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="type<?php echo md5('');?>">全部</a>
    <?php $_result=explode(',',$list_extend['type']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($feifei),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="type<?php echo md5($feifei);?>"><?php echo ($feifei); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd>
    <dt>地区：</dt>
    <dd class="text-nowrap ff-gallery">
    <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>'','year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="area<?php echo md5('');?>">全部</a>
    <?php $_result=explode(',',$list_extend['area']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($feifei),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="area<?php echo md5($feifei);?>"><?php echo ($feifei); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd>
    <dt>年代：</dt>
    <dd class="text-nowrap ff-gallery">
    <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>'','star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="year<?php echo md5('');?>">全部</a>
    <?php $_result=explode(',',$list_extend['year']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$feifei,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="year<?php echo md5($feifei);?>"><?php echo ($feifei); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>'20002010','star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="year<?php echo md5('20002010');?>">2010-2000</a><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>'19901999','star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="year<?php echo md5('19901999');?>">90年代</a><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>'18001989','star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="year<?php echo md5('18001989');?>">更早</a></dd>
    <?php if(!empty($list_extend["star"])): ?><dt>明星：</dt>
    <dd class="text-nowrap ff-gallery">
    <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>'','state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="star<?php echo md5('');?>">全部</a>
    <?php $_result=explode(',',$list_extend['star']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,13,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($feifei),'state'=>urlencode($type_state),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="star<?php echo md5($feifei);?>"><?php echo ($feifei); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd><?php endif; ?>
    <?php if(!empty($list_extend["state"])): ?><dt>资源：</dt>
    <dd class="text-nowrap ff-gallery">
    <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>'','order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="state<?php echo md5('');?>">全部</a>
    <?php $_result=explode(',',$list_extend['state']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($feifei),'order'=>$type_order,'p'=>1),true);?>" class="btn btn-sm btn-default gallery-cell" id="state<?php echo md5($feifei);?>"><?php echo ($feifei); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></dd><?php endif; ?>
  </dl> 
  <!-- -->
  <div class="clearfix ff-clearfix"></div>
  <div class="btn-toolbar" role="toolbar">
    <div class="btn-group">
      <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>hits,'p'=>1),true);?>" class="btn btn-default" id="orderhits">最近热播</a>
      <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>addtime,'p'=>1),true);?>" class="btn btn-default" id="orderaddtime">最新上映</a>
      <a href="<?php echo ff_url('vod/type',array('id'=>$type_id,'type'=>urlencode($type_type),'area'=>urlencode($type_area),'year'=>$type_year,'star'=>urlencode($type_star),'state'=>urlencode($type_state),'order'=>gold,'p'=>1),true);?>" class="btn btn-default" id="ordergold">评分最高</a>
    </div>
  </div>
  <div class="clearfix ff-clearfix"></div>
  <script>
	$("#id<?php echo (md5($type_id)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#type<?php echo (md5($type_type)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#area<?php echo (md5($type_area)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#year<?php echo (md5($type_year)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#star<?php echo (md5($type_star)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#state<?php echo (md5($type_state)); ?>").removeClass("btn-default").addClass("btn-success");
	$("#order<?php echo ($type_order); ?>").removeClass("btn-default").addClass("btn-success");
	</script>   
  <!-- -->
  <ul class="list-unstyled vod-item-img ff-img-90">
    <?php if(is_array($item_vod)): $i = 0; $__LIST__ = $item_vod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><li class="col-md-2 col-sm-3 col-xs-6">
	<p class="image">
    <a href="<?php echo ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl']);?>">
      <img class="img-responsive img-thumbnail ff-img" data-original="<?php echo ff_url_img($feifei['vod_pic'],$feifei['vod_content']);?>" alt="<?php echo ($feifei["vod_name"]); ?>">
      <span class="continu"><?php switch($feifei["list_name"]): ?><?php case "电影":  ?><?php echo ($feifei["vod_gold"]); ?>分<?php break;?>
<?php case "电视剧":  ?><?php if(($feifei["vod_isend"])  ==  "1"): ?><?php if(($feifei["vod_total"])  >  "0"): ?><?php echo ($feifei["vod_total"]); ?>集全
    <?php else: ?>
      <?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):'全'); ?>集<?php endif; ?>
  <?php else: ?>
    <?php if($feifei['vod_continu'] == $feifei['vod_total']): ?><?php if(($feifei["vod_total"])  >  "0"): ?><?php echo ($feifei["vod_total"]); ?>集全
      <?php else: ?>
        <?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):'全'); ?>集<?php endif; ?>
    <?php elseif($feifei['vod_continu'] < $feifei['vod_total']): ?>
   	 <?php if(($feifei["vod_continu"])  >  "0"): ?>更新至<?php echo ($feifei["vod_continu"]); ?>集
      <?php else: ?>
        全集<?php endif; ?>
     <?php elseif($feifei['vod_continu'] > $feifei['vod_total']): ?>
     	全<?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):''); ?>集<?php endif; ?><?php endif; ?><?php break;?>
<?php case "动漫":  ?><?php if(($feifei["vod_isend"])  ==  "1"): ?><?php if(($feifei["vod_total"])  >  "0"): ?><?php echo ($feifei["vod_total"]); ?>集全
    <?php else: ?>
      <?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):'全'); ?>集<?php endif; ?>
  <?php else: ?>
    <?php if($feifei['vod_continu'] == $feifei['vod_total']): ?><?php if(($feifei["vod_total"])  >  "0"): ?><?php echo ($feifei["vod_total"]); ?>集全
      <?php else: ?>
        <?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):'全'); ?>集<?php endif; ?>
    <?php elseif($feifei['vod_continu'] < $feifei['vod_total']): ?>
      <?php if(($feifei["vod_continu"])  >  "0"): ?>更新至<?php echo ($feifei["vod_continu"]); ?>集
      <?php else: ?>
        全集<?php endif; ?>
     <?php elseif($feifei['vod_continu'] > $feifei['vod_total']): ?>
     	全<?php echo (($feifei["vod_continu"])?($feifei["vod_continu"]):''); ?>集<?php endif; ?><?php endif; ?><?php break;?>
<?php case "综艺":  ?><?php if(strlen($feifei['vod_continu']) > 6): ?><?php echo (date('Y-m-d',strtotime($feifei["vod_continu"]))); ?>
  <?php else: ?>
    <?php echo ($feifei["vod_continu"]); ?>期<?php endif; ?><?php break;?>
<?php default: ?>
高清<?php endswitch;?></span>
      <i class="playbg"></i>
      <i class="playbtn"></i>
    </a>
  </p>
  <h4 class="ff-text-right">
    <a href="<?php echo ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl']);?>" title="<?php echo ($feifei["vod_name"]); ?>"><?php echo (msubstr($feifei["vod_name"],0,20,true)); ?></a>
  </h4>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  <?php if(($totalpages)  >  "1"): ?><div class="clearfix"></div>
  <div class="text-center">
    <ul class="pagination pagination-lg hidden-xs">
      <?php echo ($page); ?>
    </ul>
    <ul class="pager visible-xs">
      <?php if(($page["totalpages"])  >  "1"): ?><?php $params['p'] = $type_page-1 ?>
        <li><a id="ff-prev" href="<?php echo ff_url('vod/type', $params, true);?>">上一页</a></li><?php endif; ?>
      <?php if(($list_page)  <  $totalpages): ?><?php $params['p'] = $type_page+1 ?>
        <li><a id="ff-next" href="<?php echo ff_url('vod/type', $params, true);?>">下一页</a></li><?php endif; ?>
    </ul>
  </div><?php endif; ?>
</div><!--container end -->
<div class="clearfix ff-clearfix"></div>
<div class="container ff-bg">
  <div class="clearfix"></div>
<div class="row ff-footer">
  <div class="col-xs-12 text-center">
  	<p class="text-center hidden-xs hidden-sm">
    	<span class="glyphicon glyphicon-phone ff-text" data-toggle="popover" data-trigger="hover" data-placement="top" data-container="body" data-title="手机浏览请扫瞄二维码"></span>
    </p>
    <p><?php echo ($site_description); ?></p>
    <p><?php echo ($site_copyright); ?></p>
    <p>
      <a href="<?php echo ff_url('map/show',array('id'=>'rss','limit'=>100,'p'=>1),true);?>" target="_blank">rss</a>
      <a href="<?php echo ff_url('map/show',array('id'=>'baidu','limit'=>100,'p'=>1),true);?>" target="_blank">baidu</a>
      <a href="<?php echo ff_url('map/show',array('id'=>'google','limit'=>100,'p'=>1),true);?>" target="_blank">google</a>
      <a href="<?php echo ff_url('map/show',array('id'=>'360','limit'=>100,'p'=>1),true);?>" target="_blank">360</a>
      <a href="<?php echo ff_url('forum/guestbook', array('p'=>1), true);?>">网站留言</a>
      <a href="http://www.feifeicms.com/" target="_blank">feifeicms <?php echo L("feifeicms_version");?></a>
      <?php echo ($site_icp); ?>
    </p>
    <p class="tj"><?php echo ($site_tongji); ?></p>
  </div>
</div>
</div>
</body>
</html>