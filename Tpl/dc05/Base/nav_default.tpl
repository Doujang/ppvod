<ul class="nav navbar-nav">
  <volist name=":ff_mysql_nav('field:*;limit:0;cache_name:default;cache_time:default;order:nav_pid asc,nav_oid;sort:asc')" id="feifei" offset="0" length="10">
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