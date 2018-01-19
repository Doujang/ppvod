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
<title>用户登录_<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($site_name); ?>用户登录">
<meta name="description" content="欢迎回到<?php echo ($site_name); ?>">
<script>
$(document).ready(function(){
	$(".form-user-login").on('submit',function(e){
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			dataType: 'json',
			timeout: 3000,
			data: $(this).serialize(),
			beforeSend: function(xhr){
				$('#user-submit').html('正在登录...');
			},
			error : function(){
				feifei.alert.warning('.ff-alert','请求失败，请刷新网页。');
			},
			success: function(json){
				if(json.status == 200){
					location = '<?php echo ff_url("user/center",array("action"=>"index"));?>';
				}else{
					$('#user-submit').html('登录');
					feifei.alert.warning('.ff-alert',json.info);
				}
			},
			complete: function(xhr){
			}
		});
		return false;
	});
});
</script>
</head>
<body class="user-login">
<div class="container ff-bg">
<div class="row">
<div class="col-md-6 col-md-offset-3">
  <h2 class="text-center">
  	<a href="<?php echo ff_url('user/register');?>">欢迎回到<?php echo ($site_name); ?></a>
  </h2>
  <h5 class="text-center">
    <a class="ff-text" href="<?php echo ($root); ?>">返回首页</a>
    <a class="ff-text" href="<?php echo ff_url('user/forget');?>">忘记密码</a>
    <a class="ff-text" href="<?php echo ff_url('user/register');?>">没有帐号注册</a>
  </h5>
  <div class="row">
  <div class="col-xs-12 ff-col">
  	<h4 class="text-muted">
      用户登录
    </h4>
    <form class="form-horizontal form-user-login" action="<?php echo ff_url('user/loginpost');?>" method="post" role="form" target="_blank">
      <div class="form-group">
        <label for="user_email" class="col-md-3 control-label">邮箱</label>
        <div class="col-md-8">
          <input class="form-control" name="user_email" id="user_email" type="text" placeholder="请输入邮箱" required>
        </div>
      </div>
      <div class="form-group">
        <label for="user_pwd" class="col-md-3 control-label">密码</label>
        <div class="col-md-8">
          <input class="form-control" name="user_pwd" id="user_pwd" type="password" placeholder="请输入密码" required>
        </div>
      </div>
			<div class="form-group">
        <div class="col-xs-7 checkbox text-right">
          <label><input name="user_remember" type="checkbox" value="1" checked> 下次自动登录</label>
        </div>
        <div class="col-xs-4 text-right">
          <button type="submit" class="btn btn-success" id="user-submit">登录</button>
        </div>
      </div>
  	</form>
    <div class="form-group ff-alert clearfix">
  	</div>
  </div>
  </div>
</div>    
</div>
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