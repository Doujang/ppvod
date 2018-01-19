<nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-dir="#nav-{$list_dir}">
  <a class="navbar-brand" href="{$root}">{$site_name}</a>
  <div class="container">
  	<div class="navbar-header">
    	<a class="navbar-toggle" href="javascript:;" data-toggle="collapse" data-target="#navbar-feifeicms" title="导航">
        <i class="fa fa-navicon"></i>
      </a>
      <gt name="site_user_id" value="0">
        <a class="navbar-toggle nav-ico" href="{:ff_url('user/center')}" title="用户中心">
          <i class="fa fa-user"></i>
        </a>
      <else/>
        <a class="navbar-toggle nav-ico ff-user user-login-modal" href="{:ff_url('user/login')}" data-href="{:ff_url('user/center')}" title="登录与注册">
          <i class="fa fa-user-o"></i>
        </a>
      </gt>
      <a class="navbar-toggle nav-ico" href="{:ff_url('news/search')}" title="搜索">
        <i class="fa fa-search"></i>
      </a>
      <neq name="model" value="index">
        <a class="navbar-toggle nav-ico ff-goback" href="javascript:;" title="返回">
        	<i class="fa fa-chevron-left"></i>
        </a>
      </neq>
    </div>
    <div class="collapse navbar-collapse" id="navbar-feifeicms">
      <include file="Base:nav_default" />
    </div>
  </div>
</nav><!-- /.navbar -->