<nav class="navbar navbar-default">
<div class="container">
  <p class="navbar-text navbar-left ff-logo">
    <a href="{$root}"><img src="{$tpl_path}Images/logo-mini.png" title="{$site_name}" /></a>
  </p>
  <ul class="nav navbar-nav">
  	<volist name=":ff_mysql_nav('field:*;limit:120;cache_name:default;cache_time:default;order:nav_pid asc,nav_oid;sort:asc')" id="feifei">
    <notempty name="feifei.nav_son">
      <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">{$feifei.nav_title}<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <volist name="feifei.nav_son" id="feifeison">
          <eq name="feifeison.nav_target" value="1">
            <li><a href="{$feifeison.nav_link}" target="_blank">{$feifeison.nav_title}</a></li>
           <else/>
            <li><a href="{$feifeison.nav_link}">{$feifeison.nav_title}</a></li>
           </eq>
          </volist>
        </ul>
      </li>
    <else/>
       <eq name="feifei.nav_target" value="1">
        <li id="nav-{$feifei.nav_tips}"><a href="{$feifei.nav_link}" target="_blank">{$feifei.nav_title}</a></li>
      <else/>
        <li id="nav-{$feifei.nav_tips}"><a href="{$feifei.nav_link}">{$feifei.nav_title}</a></li>
      </eq>
    </notempty>
    </volist>
  </ul>
  <p class="navbar-text navbar-right ff-user" id="ff-user" data-href="{:ff_url('user/center')}">
    <span class="glyphicon glyphicon-user"></span>
    <gt name="site_user_id" value="0">
      <a href="{:ff_url('user/center')}" class="ff-text">{$site_user_name|msubstr=0,6,true}</a>
    <else/>
    	<a href="{:ff_url('user/login')}">登录</a>
    	<a href="{:ff_url('user/register')}">注册</a>
    </gt>
  </p>
  <form class="navbar-form navbar-right ff-search" id="ff-search" action="{$root}index.php?s=vod-search-name" method="post" role="search">
    <div class="input-group input-group-sm">
      <gt name="Think.config.ui_record" value="0">
      <span class="input-group-addon">
      <a href="javascript:;" class="ff-record-vod ff-text" data-toggle="popover" data-container="body" data-html="true" data-trigger="click" data-placement="bottom" data-content=""><span class="glyphicon glyphicon-record"></span></a>
      </span>
      </gt>
      <input type="text" class="form-control ff-wd" id="ff-wd" name="wd" placeholder="请输入影片名称" value="{$search_wd}">
      <span class="input-group-btn">
      <button type="submit" class="btn ff-btn-play" data-module="vod" data-action="{:ff_url('vod/search',array('name'=>'FFWD'), true)}">搜索</button>
      </span>
    </div>
  </form>  
</div><!-- /.container -->
</nav><!-- /.navbar -->