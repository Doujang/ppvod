<php>$item_forum = ff_mysql_forum('uid:'.$user_id.';limit:20;page_is:true;page_id:forum;page_p:'.$user_page.';cache_name:default;cache_time:default;order:forum_id;sort:desc');
$page = ff_url_page('user/index',array('id'=>$user_id,'p'=>'FFLINK'),true,'forum',4);
$totalpages = ff_page_count('forum', 'totalpages');
</php><!DOCTYPE html>
<html lang="zh-cn">
<head>
<include file="Block:user_header" />
<title>{$user_name|htmlspecialchars}的个人主页_{$site_name}</title>
<meta name="keywords" content="{$user_name|htmlspecialchars}喜欢的电影">
<meta name="description" content="欢迎来到{$user_name|htmlspecialchars}的个人主页，在这里与您一起分享{$user_name|htmlspecialchars}喜欢的影片。">
</head>
<body>
<div class="container ff-user-center">
<div class="row">
  <div class="col-xs-12">
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
  <div class="clearfix"></div>
  <div class="col-xs-12">
    <div class="page-header">
      <h4><span class="glyphicon glyphicon-menu-right ff-text"></span> {$user_name|htmlspecialchars}发表的看法</h4>
    </div>
    <table class="table table-striped table-bordered table-responsive">
      <tbody>
       <volist name="item_forum" id="feifei">
       <tr>
          <td>{$feifei.forum_addtime|date='Y-m-d H:i:s',###}
          <small><a href="{:ff_url('forum/detail', array('id'=>$feifei['forum_id']), true)}" target="_blank">详情</a></small></td>
        </tr>
        <tr>
          <td>{$feifei.forum_content|htmlspecialchars|msubstr=0,300}</td>
        </tr>
        </volist>
      </tbody>
    </table>
  </div>
  <gt name="totalpages" value="1">
    <div class="clearfix"></div>
    <div class="col-xs-12 text-center">
      <ul class="pagination pagination-lg hidden-xs">
        {$page}
      </ul>
      <ul class="pager visible-xs">
      	<gt name="user_page" value="1">
          <li><a id="ff-prev" href="{:ff_url('user/index', array('id'=>$user_id,'p'=>($user_page-1)), true)}">上一页</a></li>
        </gt>
        <lt name="user_page" value="$totalpages">
          <li><a id="ff-next" href="{:ff_url('user/index', array('id'=>$user_id,'p'=>($user_page+1)), true)}">下一页</a></li>
        </lt>
       </ul> 
    </div>
  </gt>
</div><!--row end -->
</div>
<include file="Block:user_footer" />
</body>
</html>