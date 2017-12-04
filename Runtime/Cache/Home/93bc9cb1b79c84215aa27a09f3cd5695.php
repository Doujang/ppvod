<?php if (!defined('THINK_PATH')) exit();?><?php $item_orders = ff_mysql_orders('uid:'.$user_id.';limit:30;page_is:true;page_id:orders;page_p:'.$user_page.';cache_name:default;cache_time:default;order:order_id;sort:desc');
$page = ff_url_page('user/center',array('action'=>'orders','p'=>'FFLINK'),true,'orders',4);
$totalpages = ff_page_count('orders', 'totalpages'); ?><!DOCTYPE html>
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
<title>订单管理_<?php echo ($site_name); ?></title>
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
      <h4><span class="glyphicon glyphicon-menu-right ff-text"></span> 我的订单管理</h4>
    </div>
    <table class="table table-bordered table-responsive text-center">
    <thead>
      <tr>
      	<th class="text-center">订单号</th>
      	<th class="text-center">支付</th>
      	<th class="text-center">状态</th>
      </tr>
    </thead>
    <tbody>
     <?php if(is_array($item_orders)): $i = 0; $__LIST__ = $item_orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><tr>
      	<td><?php echo ($feifei["order_sign"]); ?></td>
      	<td><?php switch($feifei["order_ispay"]): ?><?php case "1":  ?>付款中<?php break;?><?php case "2":  ?><font color="green">已付款</font><?php break;?><?php default: ?>未付款<?php endswitch;?></td>
      	<td><?php switch($feifei["order_status"]): ?><?php case "1":  ?>已确认<?php break;?><?php case "2":  ?>已取消<?php break;?><?php case "3":  ?>无效<?php break;?><?php case "4":  ?>退货<?php break;?><?php default: ?>未确认<?php endswitch;?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  </div>
  <!-- -->
  <?php if(($totalpages)  >  "1"): ?><div class="clearfix"></div>
    <div class="col-xs-12 ff-col text-center">
      <ul class="pagination pagination-lg hidden-xs">
        <?php echo ($page); ?>
      </ul>
      <ul class="pager visible-xs">
      	<?php if(($user_page)  >  "1"): ?><li><a id="ff-prev" href="<?php echo ff_url('user/center', array('action'=>'buy','p'=>($user_page-1)), true);?>">上一页</a></li><?php endif; ?>
        <?php if(($user_page)  <  $totalpages): ?><li><a id="ff-next" href="<?php echo ff_url('user/center', array('action'=>'buy','p'=>($user_page+1)), true);?>">下一页</a></li><?php endif; ?>
       </ul> 
    </div><?php endif; ?>
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