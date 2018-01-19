<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="<?php echo ($root); ?>favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo ($public_path); ?>bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo ($tpl_path); ?>user.css?<?php echo L("feifeicms_version");?>">
<script type="text/javascript">var cms = {
root:"<?php echo ($root); ?>",id:"<?php echo ($vod_id); ?><?php echo ($news_id); ?><?php echo ($special_id); ?>",userid:"<?php echo ($user_id); ?>",page:"<?php echo (($list_page)?($list_page):1); ?>",domain_m:"<?php echo ($site_domain_m); ?>"
}</script><script type="text/javascript" src="<?php echo ($public_path); ?>jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ($public_path); ?>bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo ($public_path); ?>js/system.js?<?php echo L("feifeicms_version");?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo ($public_path); ?>html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="<?php echo ($public_path); ?>respond/1.4.2/respond.min.js"></script>
<![endif]-->
<title>用户中心_<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_name); ?>用户中心">
<meta name="description" content="欢迎回到<?php echo ($site_name); ?>用户中心">
</head>
<body class="user-center">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
  <div class="navbar-header navbar-left">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
    <span class="sr-only">切换导航</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo ff_url('user/center',array('action'=>'index'));?>">用户中心</a>
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav">
    	<li><a href="<?php echo ($root); ?>">网站首页</a></li>
      <li <?php if(($user_action)  ==  "index"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'index'));?>">帐号管理</a></li>
      <li <?php if(($user_action)  ==  "orders"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'orders'));?>">订单管理</a></li>
      <li <?php if(($user_action)  ==  "buy"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'buy'));?>">影币记录</a></li>
      <li <?php if(($user_action)  ==  "history"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'history'));?>">观看记录</a></li>
      <li <?php if(($user_action)  ==  "forum"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'forum'));?>">我的话题</a></li>
      <li <?php if(($user_action)  ==  "likes"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'likes'));?>">收藏</a></li>
      <li <?php if(($user_action)  ==  "wish"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'wish'));?>">想看</a></li>
      <li <?php if(($user_action)  ==  "do"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'do'));?>">在看</a></li>
      <li <?php if(($user_action)  ==  "collect"): ?>class="active"<?php endif; ?>><a href="<?php echo ff_url('user/center',array('action'=>'collect'));?>">看过</a></li>
      <li><a class="ff-text" href="<?php echo ff_url('user/logout');?>">退出</a></li>
  </div>
</div>
</nav>
<div class="container ff-bg">
<h2 class="text-center">
  <a href="<?php echo ff_url('user/center');?>">
    <img class="img-circle face" src="<?php echo ((ff_url_img($user_face))?(ff_url_img($user_face)):$root.'Public/images/face/default.png'); ?> " align="用户中心">
  </a>
</h2>
<h4 class="text-center user-name">
  <?php echo (htmlspecialchars($user_name)); ?>
</h4>
<h6 class="text-center user-link">
  <a href="<?php echo ff_url('user/index',array('id'=>$user_id));?>" class="ff-text">
    <?php echo ($site_url); ?><?php echo ff_url('user/index',array('id'=>$user_id));?>
  </a>
</h6>
</div>
<div class="clearfix"></div>
<div class="container ff-bg">
<div class="row">
  <div class="col-xs-12 ff-col">
    <div class="page-header">
      <h4><span class="glyphicon glyphicon-menu-right ff-text"></span> 帐号管理</h4>
    </div>
    <dl class="safe">
      <dt>我的影币</dt>
      <dd>影币可用来支付付费点播影片或购买VIP权限 您现在拥有（<?php echo (($user_score)?($user_score):0); ?>）个影币 <a href="javascript:;" class="btn btn-success btn-sm user-pay">充值影币</a></dd>  
      <dt>VIP权限</dt>
      <dd>VIP权限到期后将不能观看付费影片，您的VIP到期时间为（<?php echo (date('Y/m/d',$user_deadtime)); ?>）<a href="javascript:;" class="btn btn-success btn-sm user-upvip">续期VIP</a></dd>
      <dt>登录邮箱</dt>
      <dd><?php echo ($user_email); ?> <a href="javascript:;" class="btn btn-success btn-sm user-change-email">修改邮箱</a></dd>
      <dt>用户密码</dt>
      <dd>建议使用字母、数字与标点的组合，可以大幅提升帐号安全 <a href="javascript:;" class="btn btn-success btn-sm user-change-pwd">修改密码</a></dd>    
      <dt>邀请奖励 <small>每邀请一个用户注册后将获得（<?php echo C("user_register_score_pid");?>）影币奖励</small></dt>
      <dd>推广链接：<?php echo ($site_url); ?><?php echo ff_url('user/register',array('id'=>$user_id));?></dd>
      <dt>最近登录IP</dt>
      <dd>您最近一次登录本站的IP为（<?php echo ($user_logip); ?>）</dd>
      <dt>最近登录时间</dt>
      <dd>您最近一次登录本站的时间为（<?php echo (date('Y/m/d H:i:s',$user_logtime)); ?>）</dd>      
    </dl>
  </div>  
</div><!--row end -->
</div>
<div class="clearfix ff-clearfix"></div>
<div class="container ff-bg ff-footer">
<div class="row">
  <div class="col-xs-12 ff-col text-center">
  <p><?php echo ($site_description); ?></p>
  <p><?php echo ($site_copyright); ?></p>
  <p>Powerd by <a href="http://www.feifeicms.com/" target="_blank">feifeicms <?php echo L("feifeicms_version");?></a></p>
  </div>
</div>
<span style="display:none"><?php echo ($site_tongji); ?></span>
</div>
</body>
</html>