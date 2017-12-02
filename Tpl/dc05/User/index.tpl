<php>$item_news = ff_mysql_record('sid:2;uid:'.$user_id.';type:2;group:record_did;limit:20;cache_name:default;cache_time:default;order:record_id;sort:desc;field:list_id,list_name,list_dir,news_id,news_cid,news_name,news_ename,news_jumpurl,news_addtime,news_pic,news_keywords,news_up,news_down,news_hits,news_remark,news_content');
</php><!DOCTYPE html>
<html lang="szh-cn">
<head>
<include file="User:header" />
<title>{$user_name|htmlspecialchars}的个人主页_{$site_name}</title>
<meta name="keywords" content="{$user_name|htmlspecialchars}喜欢的电影">
<meta name="description" content="欢迎来到{$user_name|htmlspecialchars}的个人主页，在这里与您一起分享{$user_name|htmlspecialchars}喜欢的影片。">
</head>
<body class="user-center user-index">
<div class="container ff-bg">
<div class="row">
  <div class="col-xs-12 ff-col">
    <h2 class="text-center">
      <a href="{:ff_url('user/index',array('id'=>$user_id),true)}">
        <img class="img-circle face" src="{$user_face|ff_url_img|default=$root.'Public/images/face/default.png'} " align="用户中心">
      </a>
    </h2>
    <h4 class="text-center user-name">
      {$user_name|htmlspecialchars}的个人主页
    </h4>
    <h6 class="text-center user-link">
      <a href="{:ff_url('user/index',array('id'=>$user_id))}">
        {$site_url}{:ff_url('user/index',array('id'=>$user_id))}
      </a>
    </h6>
  </div>
  <div class="clear"></div>
  <div class="col-xs-12 ff-col">
    <div class="page-header">
      <h4><span class="glyphicon glyphicon-menu-right ff-text"></span> {$user_name|htmlspecialchars}推荐的阅读</h4>
    </div>
    <volist name="item_news" id="feifei">
    	<include file="Block:news_item" />
    </volist>
  </div>
</div><!--row end -->
</div>
<include file="User:footer" />
</body>
</html>