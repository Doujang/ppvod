<?php if (!defined('THINK_PATH')) exit();?><?php $is_more = intval($_GET['ismore']);
if($is_more==1 && $forum_page==1){
	$item_list = ff_mysql_forum('cid:'.$forum_cid.';sid:'.$forum_sid.';pid:0;status:1;limit:15;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_addtime;sort:desc');
}else{
	$item_list = ff_mysql_forum('cid:'.$forum_cid.';sid:'.$forum_sid.';pid:0;status:1;limit:15;page_is:true;page_id:forum;page_p:'.$forum_page.';cache_name:default;cache_time:default;order:forum_up;sort:desc');
}
$page_array = $_GET['ff_page_forum'];
if($forum_page > 1){
  if($forum_page > $page_array['totalpages']){
   exit();
  }
} ?>
<?php if(($is_more)  ==  "1"): ?><?php if(is_array($item_list)): $i = 0; $__LIST__ = $item_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><div class="media">
  <a class="media-left" href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank">
    <img src="<?php echo ((ff_url_img($feifei["user_face"]))?(ff_url_img($feifei["user_face"])):$root.'Public/images/face/default.png'); ?>" class="img-circle user-face">
  </a>
  <div class="media-body">
    <h5 class="media-heading user-name">
      <a href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank"><?php echo (htmlspecialchars($feifei["user_name"])); ?></a>
      <small><?php echo (date('Y/m/d',$feifei["forum_addtime"])); ?></small>
    </h5>
    <p class="forum-content">
      <?php echo (msubstr(htmlspecialchars($feifei["forum_content"]),0,300)); ?>
      <a class="forum-report" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" title="举报"><small>举报</small></a>
    </p>
    <p class="forum-btn">
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="up" data-toggle="tooltip" data-placement="top" title="支持"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_up"]); ?></span></a>
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="down" data-toggle="tooltip" data-placement="top" title="反对"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_down"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-toggle="collapse" title="回复"><span class="glyphicon glyphicon-comment"></span> <span class="forum-reply-val"><?php echo ($feifei["forum_reply"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-get forum-reply-get-<?php echo ($feifei["forum_reply"]); ?>" data-id="<?php echo ($feifei["forum_id"]); ?>" href="<?php echo ff_url('forum/detail', array('id'=>$feifei['forum_id']), true);?>" title="查看回复"><span class="glyphicon glyphicon-align-right"></span> 查看回复</a>
    </p>
    <p class="collapse forum-reply" data-id="<?php echo ($feifei["forum_id"]); ?>">
    </p>
  </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
  <form class="form-forum ff-forum-post" role="form" action="<?php echo ($root); ?>index.php?s=forum-update" method="post">
  <input name="forum_cid" type="hidden" value="<?php echo (($forum_cid)?($forum_cid):0); ?>" />
  <input name="forum_sid" type="hidden" value="<?php echo (($forum_sid)?($forum_sid):5); ?>" />
  <input name="forum_pid" type="hidden" value="<?php echo (($forum_id)?($forum_id):0); ?>" />
  <div class="form-group">
    <textarea name="forum_content" class="form-control" rows="5" placeholder="吐槽......"></textarea>
  </div>
  <div class="form-group text-right">
    <label>
      <input class="form-control input-sm text-center ff-vcode ff-vcode-input" name="forum_vcode" maxlength="4" type="text" placeholder="验证码">
    </label>
    <label>
      <button type="submit" class="btn btn-default btn-sm">提交</button>
    </label>
  </div>
  <div class="form-group ff-alert clearfix">
  </div>
</form>
  <div class="ff-forum-item">
  <?php if(is_array($item_list)): $i = 0; $__LIST__ = $item_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><div class="media">
  <a class="media-left" href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank">
    <img src="<?php echo ((ff_url_img($feifei["user_face"]))?(ff_url_img($feifei["user_face"])):$root.'Public/images/face/default.png'); ?>" class="img-circle user-face">
  </a>
  <div class="media-body">
    <h5 class="media-heading user-name">
      <a href="<?php echo ff_url('user/index',array('id'=>$feifei['user_id']),true);?>" target="_blank"><?php echo (htmlspecialchars($feifei["user_name"])); ?></a>
      <small><?php echo (date('Y/m/d',$feifei["forum_addtime"])); ?></small>
    </h5>
    <p class="forum-content">
      <?php echo (msubstr(htmlspecialchars($feifei["forum_content"]),0,300)); ?>
      <a class="forum-report" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" title="举报"><small>举报</small></a>
    </p>
    <p class="forum-btn">
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="up" data-toggle="tooltip" data-placement="top" title="支持"><span class="glyphicon glyphicon-thumbs-up"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_up"]); ?></span></a>
      <a class="btn btn-default btn-xs ff-updown-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-module="forum" data-type="down" data-toggle="tooltip" data-placement="top" title="反对"><span class="glyphicon glyphicon-thumbs-down"></span> <span class="ff-updown-val"><?php echo ($feifei["forum_down"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-set" href="javascript:;" data-id="<?php echo ($feifei["forum_id"]); ?>" data-toggle="collapse" title="回复"><span class="glyphicon glyphicon-comment"></span> <span class="forum-reply-val"><?php echo ($feifei["forum_reply"]); ?></span></a>
      <a class="btn btn-default btn-xs forum-reply-get forum-reply-get-<?php echo ($feifei["forum_reply"]); ?>" data-id="<?php echo ($feifei["forum_id"]); ?>" href="<?php echo ff_url('forum/detail', array('id'=>$feifei['forum_id']), true);?>" title="查看回复"><span class="glyphicon glyphicon-align-right"></span> 查看回复</a>
    </p>
    <p class="collapse forum-reply" data-id="<?php echo ($feifei["forum_id"]); ?>">
    </p>
  </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <?php if(($page_array["totalpages"])  >  "1"): ?><h6 class="ff-forum-page col-xs-12 col-sm-6 col-sm-offset-3">
  <a class="btn btn-default btn-block ff-page-more" data-target=".ff-forum-item" data-page="<?php echo ($forum_page); ?>" data-url="<?php echo ($root); ?>index.php?s=forum-ajax-sid-<?php echo ($forum_sid); ?>-cid-<?php echo ($forum_cid); ?>-ismore-1-p-" href="javascript:;">查看更多评论...</a>
</h6><?php endif; ?><?php endif; ?>