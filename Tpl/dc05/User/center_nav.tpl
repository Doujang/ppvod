<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
  <div class="navbar-header navbar-left">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
    <span class="sr-only">切换导航</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{:ff_url('user/center',array('action'=>'index'))}">用户中心</a>
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav">
    	<li><a href="{$root}">网站首页</a></li>
      <li <eq name="user_action" value="index">class="active"</eq>><a href="{:ff_url('user/center',array('action'=>'index'))}">帐号管理</a></li>
      <li <eq name="user_action" value="history">class="active"</eq>><a href="{:ff_url('user/center',array('action'=>'history'))}">我喜欢的</a></li>
      <li <eq name="user_action" value="forum">class="active"</eq>><a href="{:ff_url('user/center',array('action'=>'forum'))}">我的话题</a></li>
      <li><a class="ff-text" href="{:ff_url('user/logout')}">退出</a></li>
    </ul>
  </div>
</div>
</nav>
<eq name="user_action" value="index">
<div class="container ff-bg">
  <h2 class="text-center">
    <a href="{:ff_url('user/center')}">
      <img class="img-circle face" src="{$user_face|ff_url_img|default=$root.'Public/images/face/default.png'} " align="用户中心">
    </a>
  </h2>
  <h4 class="text-center user-name">
    {$user_name|htmlspecialchars}
  </h4>
  <h6 class="text-center user-link">
    <a href="{:ff_url('user/index',array('id'=>$user_id))}" class="ff-text">
      {$site_url}{:ff_url('user/index',array('id'=>$user_id))}
    </a>
  </h6>
</div>
<div class="clearfix"></div>
</eq>