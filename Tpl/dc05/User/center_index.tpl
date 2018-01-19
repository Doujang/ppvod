<!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="User:header" />
<title>用户中心_{$site_name}</title>
<meta name="keywords" content="{$site_name}用户中心">
<meta name="description" content="欢迎回到{$site_name}用户中心">
</head>
<body class="user-center">
<include file="User:center_nav" />
<div class="container ff-bg">
<div class="row">
  <div class="col-xs-12 ff-col">
    <div class="page-header">
      <h4><span class="glyphicon glyphicon-menu-right ff-text"></span> 帐号管理</h4>
    </div>
    <dl class="safe">
      <dt>登录邮箱</dt>
      <dd>{$user_email} <a href="javascript:;" class="btn btn-info btn-sm user-change-email">修改邮箱</a></dd>
      <dt>用户密码</dt>
      <dd>建议使用字母、数字与标点的组合，可以大幅提升帐号安全 <a href="javascript:;" class="btn btn-info btn-sm user-change-pwd">修改密码</a></dd>    
      <dt>邀请奖励 <small>每邀请一个用户注册后将获得（{:C("user_register_score_pid")}）金币奖励</small></dt>
      <dd>推广链接：{$site_url}{:ff_url('user/register',array('id'=>$user_id))}</dd>
      <dt>最近登录IP</dt>
      <dd>您最近一次登录本站的IP为（{$user_logip}）</dd>
      <dt>最近登录时间</dt>
      <dd>您最近一次登录本站的时间为（{$user_logtime|date='Y/m/d H:i:s',###}）</dd>      
    </dl>
  </div>  
</div><!--row end -->
</div>
<include file="User:footer" />
</body>
</html>