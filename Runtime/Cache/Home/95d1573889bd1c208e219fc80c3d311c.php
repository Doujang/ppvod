<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="./Public/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="./Public/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="./Tpl/default/system.css?<?php echo L("feifeicms_version");?>">
<script type="text/javascript">var cms = {
root:"<?php echo ($root); ?>",urlhtml:"<?php echo (C("url_html")); ?>",sid:"<?php echo ($site_sid); ?>",id:"<?php echo ($vod_id); ?><?php echo ($news_id); ?><?php echo ($special_id); ?>",userid:"<?php echo ($site_user_id); ?>",username:"<?php echo ($site_user_name); ?>",userforum:"<?php echo (C("user_forum")); ?>",page:"<?php echo (($list_page)?($list_page):1); ?>",domain_m:"<?php echo ($site_domain_m); ?>"
};
</script>
<script type="text/javascript" src="./Public/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="./Public/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./Public/js/system.js?<?php echo L("feifeicms_version");?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo ($public_path); ?>html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="<?php echo ($public_path); ?>respond/1.4.2/respond.min.js"></script>
<![endif]-->
<title><?php if(in_array(($list_id), explode(',',"2,3,4"))): ?>《<?php echo ($vod_name); ?>》全集在线观看－<?php echo ($list_name); ?><?php else: ?>《<?php echo ($vod_name); ?>》高清在线观看-电影<?php echo ($vod_name); ?>下载<?php endif; ?>－<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($vod_name); ?>,<?php echo ($vod_name); ?>在线观看,<?php echo ($vod_name); ?>全集,电视剧<?php echo ($vod_name); ?>,<?php echo ($vod_name); ?>下载,<?php echo ($vod_name); ?>主题曲,<?php echo ($vod_name); ?>剧情,<?php echo ($vod_name); ?>演员表">
<meta name="description" content="<?php echo ($vod_name); ?> <?php echo ($vod_name); ?>在线观看 <?php echo ($vod_name); ?>全集 电视剧<?php echo ($vod_name); ?>；<?php echo ($vod_name); ?>剧情：<?php echo (msubstr(h($vod_content),0,100)); ?>">
</head>
<body class="vod-detail">
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
  <h2>
    <span class="glyphicon glyphicon-film ff-text"></span>
    <a href="<?php echo ff_url_vod_show($list_id,$list_dir,1);?>"><?php echo ($list_name); ?></a>
    <a href="<?php echo ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl);?>"><?php echo (msubstr($vod_name,0,8,true)); ?></a>
    <small>影片详情</small>
    <small class="pull-right hidden-xs">
      相关链接： 
      <a href="<?php echo ff_url('forum/vod',array('cid'=>$vod_id,'p'=>1),true);?>" target="_blank"><?php echo (msubstr($vod_name,0,8,true)); ?>影评</a>
      <?php if(!empty($vod_scenario["info"])): ?><a href="<?php echo ff_url('scenario/detail',array('id'=>$vod_id),true);?>" target="_blank"><?php echo (msubstr($vod_name,0,8,true)); ?>剧情</a><?php endif; ?>
    </small>
  </h2>
</div>
<div class="row">
<div class="col-md-8 col-xs-12">
	<div class="media">
  	<div class="media-left">
      <a href="<?php echo ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl);?>">
        <img class="media-object img-thumbnail ff-img" data-original="<?php echo (ff_url_img($vod_pic,$vod_content)); ?>" alt="<?php echo ($vod_name); ?>免费观看">
      </a>
      <div class="hidden-xs hidden-sm">
      <p class="text-center">
      	<dl>
  <dt></dt>
  <dd>
    <a class="btn btn-default btn-xs ff-record-set" href="javascript:;" data-sid="<?php echo ($site_sid); ?>" data-id="<?php echo ($vod_id); ?>" data-type="2" data-toggle="tooltip" data-placement="top" title="喜欢"><span class="glyphicon glyphicon-heart-empty"></span> 喜欢</a>
    <a class="btn btn-default btn-xs ff-record-set" href="javascript:;" data-sid="<?php echo ($site_sid); ?>" data-id="<?php echo ($vod_id); ?>" data-type="3" data-toggle="tooltip" data-placement="top" title="想看"><span class="glyphicon glyphicon-heart-empty"></span> 想看</a>
    <a class="btn btn-default btn-xs ff-record-set" href="javascript:;" data-sid="<?php echo ($site_sid); ?>" data-id="<?php echo ($vod_id); ?>" data-type="4" data-toggle="tooltip" data-placement="top" title="在看"><span class="glyphicon glyphicon-heart-empty"></span> 在看</a>
    <a class="btn btn-default btn-xs ff-record-set" href="javascript:;" data-sid="<?php echo ($site_sid); ?>" data-id="<?php echo ($vod_id); ?>" data-type="5" data-toggle="tooltip" data-placement="top" title="看过"><span class="glyphicon glyphicon-heart-empty"></span> 看过</a>
  </dd>
</dl>
      </p>
      </div>
    </div>
    <div class="media-body">
    	<h2>
      	<a class="ff-text" href="<?php echo ff_url_vod_read($list_id,$list_dir,$vod_id,$vod_ename,$vod_jumpurl);?>"><?php echo ($vod_name); ?></a>
        <small><?php switch($list_name): ?><?php case "电影":  ?><?php echo ($vod_state); ?><?php break;?>
<?php case "电视剧":  ?><?php if(($vod_isend)  ==  "1"): ?><?php if(($vod_total)  >  "0"): ?><?php echo ($vod_total); ?>集全
    <?php else: ?>
      <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
  <?php else: ?>
    <?php if($vod_continu == $vod_total): ?><?php if(($vod_total)  >  "0"): ?><?php echo ($vod_total); ?>集全
      <?php else: ?>
        <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
    <?php elseif($vod_continu < $vod_total): ?>
    	<?php if(($vod_continu)  >  "0"): ?>更新至<?php echo ($vod_continu); ?>集
      <?php else: ?>
        <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
    <?php elseif($vod_continu > $vod_total): ?>
    	全<?php echo (($vod_continu)?($vod_continu):''); ?>集<?php endif; ?><?php endif; ?><?php break;?>
<?php case "动漫":  ?><?php if(($vod_isend)  ==  "1"): ?><?php if(($vod_total)  >  "0"): ?><?php echo ($vod_total); ?>集全
    <?php else: ?>
      <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
  <?php else: ?>
    <?php if($vod_continu == $vod_total): ?><?php if(($vod_total)  >  "0"): ?><?php echo ($vod_total); ?>集全
      <?php else: ?>
        <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
    <?php elseif($vod_continu < $vod_total): ?>
    	<?php if(($vod_continu)  >  "0"): ?>更新至<?php echo ($vod_continu); ?>集
      <?php else: ?>
        <?php echo (($vod_continu)?($vod_continu):'全'); ?>集<?php endif; ?>
    <?php elseif($vod_continu > $vod_total): ?>
    	全<?php echo (($vod_continu)?($vod_continu):''); ?>集<?php endif; ?><?php endif; ?><?php break;?>
<?php case "综艺":  ?><?php if(strlen($vod_continu) > 6): ?><?php echo (date('Y-m-d',strtotime($vod_continu))); ?>
  <?php else: ?>
    <?php echo ($vod_continu); ?>期<?php endif; ?><?php break;?>
<?php default: ?><?php endswitch;?></small>
      </h2>
      <dl class="dl-horizontal">
        <dt>主演：</dt>
        <dd class="ff-text-right"><?php echo (ff_url_search($vod_actor)); ?></dd>
        <dt>导演：</dt>
        <dd class="ff-text-right"><?php echo (ff_url_search($vod_director,'director')); ?></dd>
        <dt>类型：</dt>
        <dd class="ff-text-right">
        <a href="<?php echo ff_url_vod_show($list_id,$list_dir,1);?>"><?php echo ($list_name); ?></a>
        <?php if(!empty($vod_type)): ?><?php $_result=explode(',',$vod_type);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$list_id,'type'=>urlencode($feifei),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'hits'),true);?>">
<?php echo ($feifei); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
        </dd>
        <dt>地区：</dt>
        <dd class="ff-text-right"><?php if(!empty($vod_area)): ?><?php $_result=explode(',',$vod_area);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$vod_cid,'type'=>'','area'=>urlencode($feifei),'year'=>'','star'=>'','state'=>'','order'=>'addtime'),true);?>">
<?php echo ($feifei); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<a href="javascript:;">
未填写
</a><?php endif; ?></dd>
        <dt>年份：</dt>
        <dd class="ff-text-right"><a href="<?php echo ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true);?>"><?php echo (($vod_year)?($vod_year):'2017'); ?></a></dd>
        <dt class="hidden-xs hidden-sm">剧情：</dt>
        <dd class="ff-text-right hidden-xs hidden-sm">
        	<span class="vod-content-default text-justify"><?php echo (msubstr(strip_tags($vod_content),0,150,true)); ?></span>
<span class="vod-content ff-collapse text-justify"><?php echo ff_url_tags_content(nb(strip_tags($vod_content,"<a>")),$Tag);?></span>
<a href="javascript:;" data-toggle="ff-collapse" data-target=".vod-content" data-default=".vod-content-default" data-html="收起">详情</a>
        </dd>
      </dl>
    </div>
  </div>
</div>
<div class="col-md-4 ff-col hidden-xs hidden-sm">
  <dl class="ff-score">
  <dt>评分：</dt>
  <dd>
    <span class="ff-score-raty" data-module="vod" data-id="<?php echo ($vod_id); ?>" data-score="<?php echo ($vod_gold/2); ?>" data-toggle="tooltip" data-placement="bottom"></span>
    <sup class="ff-score-val"><?php echo ($vod_gold); ?></sup>
    <sup>分</sup>
  </dd>
</dl>
  <div class="clearfix"></div>
  <div class="text-center ff-ads">
  <?php echo ff_url_ads('300_250');?>
  </div>
</div>
</div><!--row end -->
<?php $playurl_line = array();
$playurl_down = array();
$playurl_yugao = array();
foreach($vod_play_list as $key=>$value){
	if($value['player_name_en'] == "yugao"){
  	array_push($playurl_yugao, $value);
 	}else if($value['player_name_en'] == "down"){
  	array_push($playurl_down, $value);
 	}else{
  	array_push($playurl_line, $value);
 	}
} ?>
<!-- -->
<?php if(is_array($playurl_line)): $sid = 0; $__LIST__ = $playurl_line;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$sid;$mod = ($sid % 2 )?><div class="page-header ff-playurl-line">
  <h2>
  <span class="glyphicon glyphicon-facetime-video ff-text"></span>
  来源：<?php echo ($feifei["player_name_zh"]); ?></h2>
</div>
<ul class="list-unstyled row text-center ff-playurl-line ff-playurl" data-active="<?php echo ($vod_id); ?>-<?php echo ($play_sid); ?>-<?php echo ($play_pid); ?>" data-more="<?php echo (intval(C("ui_playurl"))); ?>">
  <?php if(is_array($feifei["son"])): $pid = 0; $__LIST__ = $feifei["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeison): ++$pid;$mod = ($pid % 2 )?><li class="col-md-1 col-xs-4" data-id="<?php echo ($vod_id); ?>-<?php echo ($feifei["player_sid"]); ?>-<?php echo ($pid); ?>"><a href="<?php echo ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$feifei['player_sid'],$pid);?>" class="btn btn-default btn-block btn-sm ff-text-hidden"><?php echo ($feifeison["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="clearfix"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- -->
<?php if(is_array($playurl_yugao)): $sid = 0; $__LIST__ = $playurl_yugao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$sid;$mod = ($sid % 2 )?><div class="page-header ff-playurl-yugao">
  <h2>
  	<span class="glyphicon glyphicon-film ff-text"></span>
    来源：<?php echo ($feifei["player_name_zh"]); ?> <?php echo ($sid); ?>
  </h2>
</div>
<ul class="list-unstyled row text-center ff-playurl ff-playurl-yugao" data-active="<?php echo ($vod_id); ?>-<?php echo ($play_sid); ?>-<?php echo ($play_pid); ?>" data-more="<?php echo (intval(C("ui_playurl"))); ?>">
  <?php if(is_array($feifei["son"])): $pid = 0; $__LIST__ = $feifei["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeison): ++$pid;$mod = ($pid % 2 )?><li class="col-md-1 col-xs-4" data-id="<?php echo ($vod_id); ?>-<?php echo ($feifei["player_sid"]); ?>-<?php echo ($pid); ?>"><a href="<?php echo ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$feifei['player_sid'],$pid);?>" class="btn btn-default btn-block btn-sm ff-text-hidden"><?php echo (str_replace('片','',$feifeison["title"])); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="clearfix"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- -->
<?php if(!empty($playurl_down)): ?><div class="page-header ff-playurl-down">
  <h2>
  	<span class="glyphicon glyphicon-cloud-download ff-text"></span>
    下载观看 <small>友情提示：未安装工具时，会自动提示安装，安装完毕后即可高速下载。</small></h2>
</div><?php endif; ?>
<?php if(is_array($playurl_down)): $sid = 0; $__LIST__ = $playurl_down;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$sid;$mod = ($sid % 2 )?><div class="table-responsive ff-playurl-down">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th><?php echo ($feifei["player_name_zh"]); ?> <?php echo ($sid); ?></th>
    <th><a class="thunder_down_all" href="javascript:;">迅雷下载</a></th>
    <th><a class="xf_down_all" href="javascript:void(0);">旋风下载</a></th></tr>
  </thead>
  <tbody>
  <?php if(is_array($feifei["son"])): $pid = 0; $__LIST__ = $feifei["son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeison): ++$pid;$mod = ($pid % 2 )?><tr>
    <td><div class="input-group">
    <span class="input-group-addon">
    <input class="down_url" name="down_url_list_0" type="checkbox" value="<?php echo (ff_ThunderEncode($feifeison["url"])); ?>" file_name="<?php echo ($feifeison["title"]); ?>" checked="checked">
    </span>
    <input class="form-control" type="text" value="<?php echo ($feifeison["title"]); ?> <?php echo (ff_ThunderEncode($feifeison["url"])); ?>">
    </div></td>
    <td><button type="button" class="btn btn-success btn-sm thunder_down">迅雷下载</button></td>
    <td><button type="button" class="btn btn-warning btn-sm qqdl">旋风下载</button></td></tr>
  <tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
  </table>
</div>
<div class="clearfix"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<!-- -->
<?php if(!empty($vod_scenario["info"])): ?><div class="clearfix"></div>
<div class="page-header">
  <h2>
  <span class="glyphicon glyphicon-list ff-text"></span>
  <a href="<?php echo ff_url('scenario/detail',array('id'=>$vod_id),true);?>" target="_blank">分集剧情</a>
 </h2>
</div> 
<ul class="nav nav-pills ff-scenario-pill" data-max="<?php echo (C("ui_scenario")); ?>">
  <!--<li><a href="javascript:;" data-target=".ff-scenario-1" data-toggle="pill">1</a></li> -->
</ul>
<div class="tab-content ff-scenario-content">
  <?php if(is_array($vod_scenario["info"])): $i = 0; $__LIST__ = $vod_scenario["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><dl class="tab-pane active vod-scenario-<?php echo ($i); ?>">
    <dt><a href="<?php echo ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,1,$i);?>"><?php echo ($vod_name); ?> 第<?php echo ($i); ?>集</a></dt>
    <dd><?php echo ($feifei); ?></dd>
  </dl><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php endif; ?>
<!-- -->
<?php if(!empty($vod_series)): ?><?php $series_array = explode(',',$vod_series);
if(count($series_array) > 1 ){
	$item_vod = ff_mysql_vod('ids:'.$vod_series.';limit:6;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
}else{
	$item_vod = ff_mysql_vod('series:'.$vod_series.';limit:6;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc');
} ?>
<div class="clearfix"></div>
<div class="page-header">
  <h2><span class="glyphicon glyphicon-link ff-text"></span> 影片系列</h2>
</div>
<ul class="list-unstyled vod-item-img ff-img-215">
<?php if(is_array($item_vod)): $i = 0; $__LIST__ = $item_vod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><li class="col-md-2 col-sm-3 col-xs-4">
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
  <h2 class="text-nowrap ff-text-right">
    <a href="<?php echo ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl']);?>" title="<?php echo ($feifei["vod_name"]); ?>"><?php echo ($feifei["vod_name"]); ?></a>
  </h2>
  <h4 class="text-nowrap ff-text-right">
  	<?php if(!empty($feifei["vod_actor"])): ?><?php if(!empty($feifei["vod_actor"])): ?><?php $_result=explode(',',$feifei['vod_actor']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiactor): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/search',array('actor'=>urlencode($feifeiactor)),true);?>"><?php echo ($feifeiactor); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
     <?php else: ?>
     	<?php if(!empty($feifei["vod_type"])): ?><?php $_result=explode(',',$feifei['vod_type']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeitype): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['list_id'],'type'=>urlencode($feifeitype),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'hits'),true);?>">
<?php echo ($feifeitype); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
      <?php if(!empty($feifei["vod_area"])): ?><?php $_result=explode(',',$feifei['vod_area']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiarea): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['vod_cid'],'type'=>'','area'=>urlencode($feifeiarea),'year'=>'','star'=>'','state'=>'','order'=>'addtime'),true);?>">
<?php echo ($feifeiarea); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endif; ?>
  </h4>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endif; ?>
<!-- -->
<?php $item_vod=ff_mysql_vod('cid:'.$vod_cid.';actor:'.ff_array(explode(',',$vod_actor),0).';limit:6;cache_name:default;cache_time:default;order:vod_id;sort:desc'); ?>
<?php if(!empty($item_vod)): ?><div class="clearfix"></div>
<div class="page-header">
  <h2><span class="glyphicon glyphicon-th-large ff-text"></span> 同主演作品</h2>
</div>
<ul class="list-unstyled vod-item-img ff-img-215">
<?php if(is_array($item_vod)): $i = 0; $__LIST__ = $item_vod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><li class="col-md-2 col-sm-3 col-xs-4">
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
  <h2 class="text-nowrap ff-text-right">
    <a href="<?php echo ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl']);?>" title="<?php echo ($feifei["vod_name"]); ?>"><?php echo ($feifei["vod_name"]); ?></a>
  </h2>
  <h4 class="text-nowrap ff-text-right">
  	<?php if(!empty($feifei["vod_actor"])): ?><?php if(!empty($feifei["vod_actor"])): ?><?php $_result=explode(',',$feifei['vod_actor']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiactor): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/search',array('actor'=>urlencode($feifeiactor)),true);?>"><?php echo ($feifeiactor); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
     <?php else: ?>
     	<?php if(!empty($feifei["vod_type"])): ?><?php $_result=explode(',',$feifei['vod_type']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeitype): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['list_id'],'type'=>urlencode($feifeitype),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'hits'),true);?>">
<?php echo ($feifeitype); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
      <?php if(!empty($feifei["vod_area"])): ?><?php $_result=explode(',',$feifei['vod_area']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiarea): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['vod_cid'],'type'=>'','area'=>urlencode($feifeiarea),'year'=>'','star'=>'','state'=>'','order'=>'addtime'),true);?>">
<?php echo ($feifeiarea); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endif; ?>
  </h4>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endif; ?>
<!-- -->
<?php $item_vod=ff_mysql_vod('cid:'.$vod_cid.';limit:6;cache_name:default;cache_time:default;order:vod_hits_lasttime;sort:desc'); ?>
<div class="clearfix"></div>
<div class="page-header">
  <h2><span class="glyphicon glyphicon-fire ff-text"></span> 热播<?php echo ($list_name); ?></h2>
</div>
<ul class="list-unstyled vod-item-img ff-img-215">
<?php if(is_array($item_vod)): $i = 0; $__LIST__ = $item_vod;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><li class="col-md-2 col-sm-3 col-xs-4">
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
  <h2 class="text-nowrap ff-text-right">
    <a href="<?php echo ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl']);?>" title="<?php echo ($feifei["vod_name"]); ?>"><?php echo ($feifei["vod_name"]); ?></a>
  </h2>
  <h4 class="text-nowrap ff-text-right">
  	<?php if(!empty($feifei["vod_actor"])): ?><?php if(!empty($feifei["vod_actor"])): ?><?php $_result=explode(',',$feifei['vod_actor']);if(is_array($_result)): $i = 0; $__LIST__ = array_slice($_result,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiactor): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/search',array('actor'=>urlencode($feifeiactor)),true);?>"><?php echo ($feifeiactor); ?></a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
     <?php else: ?>
     	<?php if(!empty($feifei["vod_type"])): ?><?php $_result=explode(',',$feifei['vod_type']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeitype): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['list_id'],'type'=>urlencode($feifeitype),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'hits'),true);?>">
<?php echo ($feifeitype); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?>
      <?php if(!empty($feifei["vod_area"])): ?><?php $_result=explode(',',$feifei['vod_area']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeiarea): ++$i;$mod = ($i % 2 )?><a href="<?php echo ff_url('vod/type',array('id'=>$feifei['vod_cid'],'type'=>'','area'=>urlencode($feifeiarea),'year'=>'','star'=>'','state'=>'','order'=>'addtime'),true);?>">
<?php echo ($feifeiarea); ?>
</a><?php endforeach; endif; else: echo "" ;endif; ?><?php endif; ?><?php endif; ?>
  </h4>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<!-- -->
<div class="clearfix"></div>
<div class="page-header">
  <h2>
  	<span class="glyphicon glyphicon-comment ff-text"></span>
  	<a href="<?php echo ff_url('forum/vod',array('cid'=>$vod_id,'p'=>1),true);?>" target="_blank">影片评论</a>
   </h2>
</div>
<div class="ff-forum" data-id="<?php echo ($vod_id); ?>" data-sid="1" data-type="<?php echo (C("forum_type")); ?>" data-uyan-uid="<?php echo (C("forum_type_uyan_uid")); ?>" data-cy-id="<?php echo (C("forum_type_changyan_appid")); ?>" data-cy-conf="<?php echo (C("forum_type_changyan_conf")); ?>">
  评论加载中...
</div>
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