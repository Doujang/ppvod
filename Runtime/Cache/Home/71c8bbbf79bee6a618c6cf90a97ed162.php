<?php if (!defined('THINK_PATH')) exit();?><?php $forum_sid = 1;
$item_list = ff_mysql_forum('cid:'.$forum_cid.';status:1;sid:1;pid:0;limit:20;page_is:true;page_id:forum;page_p:'.$forum_page.';order:forum_addtime;sort:desc');
$page_array = $_GET['ff_page_forum'];
if($forum_cid){
	$vod = $item_list[0];
	$page_info = ff_url_page('forum/vod', array('cid'=>$forum_cid,'p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/vod', array('cid'=>$forum_cid), true);
  $page_last = ff_url('forum/vod', array('cid'=>$forum_cid,'p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/vod', array('cid'=>$forum_cid,'p'=>($forum_page+1)), true);
}else{
	$page_info = ff_url_page('forum/vod', array('p'=>'FFLINK'), true, 'forum', 4);
  $page_this = ff_url('forum/vod', '', true);
  $page_last = ff_url('forum/vod', array('p'=>($forum_page-1)), true);
  $page_next = ff_url('forum/vod', array('p'=>($forum_page+1)), true);
} ?><!DOCTYPE html>
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
<?php $list_dir = 'forum'; ?>
<title><?php echo ($vod['vod_name']); ?>精彩影评第<?php echo ($forum_page); ?>页_<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($vod['vod_name']); ?>影评,<?php echo ($vod['vod_name']); ?>观后感">
<meta name="description" content="<?php echo ($vod['vod_name']); ?>影评共有<?php echo ($page_array["totalpages"]); ?>页,为你展示的是第<?php echo ($forum_page); ?>的精彩评论。">
</head>
<body class="forum-vod">
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
<div class="container ff-bg ff-forum" data-type="<?php echo (C("forum_type")); ?>">
<!-- -->
<div class="page-header">
  <h2>
  <span class="glyphicon glyphicon-comment ff-text"></span>
  <a href="<?php echo ($page_this); ?>"><?php echo ($vod["vod_name"]); ?>精彩影评</a>
  </h2>
</div>
<!-- -->
<div class="hidden">
	<form class="form-forum ff-forum-post" role="form" action="<?php echo ($root); ?>index.php?s=forum-update" method="post">
  <input name="forum_cid" type="hidden" value="<?php echo (($forum_cid)?($forum_cid):0); ?>" />
  <input name="forum_sid" type="hidden" value="<?php echo (($forum_sid)?($forum_sid):5); ?>" />
  <input name="forum_pid" type="hidden" value="<?php echo (($forum_id)?($forum_id):0); ?>" />
  <div class="form-group">
    <textarea name="forum_content" class="form-control" rows="5" placeholder="吐槽......"></textarea>
  </div>
  <div class="form-group text-right">
    <label>
      <input class="form-control input-sm text-center ff-vcode ff-vcode-input" name="forum_vcode" maxlength="4" type="text" placeholder="验证码">
    </label>
    <label>
      <button type="submit" class="btn btn-default btn-sm">提交</button>
    </label>
  </div>
  <div class="form-group ff-alert clearfix">
  </div>
</form>
</div>
<!-- -->
<?php if(!empty($forum_cid)): ?><div class="media vod-inc-info">
  <a class="media-left" href="<?php echo ff_url_vod_read($vod['list_id'],$vod['list_dir'],$vod['vod_id'],$vod['vod_ename'],$vod['vod_jumpurl']);?>">
    <img class="media-object img-thumbnail ff-img" data-original="<?php echo (ff_url_img($vod["vod_pic"])); ?>" alt="<?php echo ($vod["vod_name"]); ?>">
  </a>
  <div class="media-body">
    <dl class="dl-horizontal">
      <dt>主演：</dt>
      <dd class="text-nowrap ff-text-right"><?php echo (ff_url_search($vod["vod_actor"])); ?></dd>
      <dt>导演：</dt>
      <dd class="text-nowrap ff-text-right"><?php echo (ff_url_search($vod["vod_director"],'director')); ?></dd>
      <dt>地区：</dt>
      <dd class="text-nowrap ff-text-right"><a href="<?php echo ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>urlencode($vod_area),'year'=>'','star'=>'','state'=>'','order'=>'hits'),true);?>"><?php echo (($vod["vod_area"])?($vod["vod_area"]):'未录入'); ?></a></dd>
      <dt>年份：</dt>
      <dd class="text-nowrap ff-text-right"><a href="<?php echo ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true);?>"><?php echo (($vod["vod_year"])?($vod["vod_year"]):'2017'); ?></a></dd>
      <dt>链接：</dt>
      <dd class="text-nowrap ff-text-right"><a href="<?php echo ff_url_vod_read($vod['list_id'],$vod['list_dir'],$vod['vod_id'],$vod['vod_ename'],$vod['vod_jumpurl']);?>"><?php echo ($vod["vod_name"]); ?>免费观看</a><a href="<?php echo ff_url('scenario/detail',array('id'=>$vod['vod_id']),true);?>"><?php echo ($vod["vod_name"]); ?>剧情介绍</a></dd>
    </dl>
  </div>
</div>
<div class="clearfix ff-clearfix"></div><?php endif; ?>
<!-- -->
<div class="clearfix ff-clearfix"></div>
<div class="ff-forum-item">
	<?php if(is_array($item_list)): $i = 0; $__LIST__ = $item_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><div class="media">
  <a class="media-left" href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank">
    <img src="<?php echo ((ff_url_img($feifei["user_face"]))?(ff_url_img($feifei["user_face"])):$root.'Public/images/face/default.png'); ?>" class="img-circle user-face">
  </a>
  <div class="media-body">
    <h5 class="media-heading user-name">
      <a href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank"><?php echo (htmlspecialchars($feifei["user_name"])); ?></a>
      <small><?php echo (date('Y/m/d',$feifei["forum_addtime"])); ?></small>
    </h5>
    <p class="forum-content">
      <?php echo (msubstr(htmlspecialchars($feifei["forum_content"]),0,300)); ?>
      <a class="forum-report" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" title="举报"><small>举报</small></a>
    </p>
    <p class="forum-btn">
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="up" data-toggle="tooltip" data-placement="top" title="支持"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_up"]); ?></span></a>
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="down" data-toggle="tooltip" data-placement="top" title="反对"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_down"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-toggle="collapse" title="回复"><span class="glyphicon glyphicon-comment"></span> <span class="forum-reply-val"><?php echo ($feifei["forum_reply"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-get forum-reply-get-<?php echo ($feifei["forum_reply"]); ?>" data-id="<?php echo ($feifei["forum_id"]); ?>" href="<?php echo ff_url('forum/detail', array('id'=>$feifei['forum_id']), true);?>" title="查看回复"><span class="glyphicon glyphicon-align-right"></span> 查看回复</a>
    </p>
    <p class="collapse forum-reply" data-id="<?php echo ($feifei["forum_id"]); ?>">
    </p>
  </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<?php if(($page_array["totalpages"])  >  "1"): ?><div class="clearfix"></div>
<div class="text-center" id="ff-forum-page">
  <ul class="pagination pagination-lg hidden-xs">
    <?php echo ($page_info); ?>
  </ul>
  <ul class="pager visible-xs">
    <?php if(($forum_page)  >  "1"): ?><li><a id="ff-prev" href="<?php echo ($page_last); ?>">上一页</a></li><?php endif; ?>
    <?php if(($forum_page)  <  $page_array['totalpages']): ?><li><a id="ff-next" href="<?php echo ($page_next); ?>">下一页</a></li><?php endif; ?>
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