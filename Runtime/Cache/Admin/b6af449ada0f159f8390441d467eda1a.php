<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>日志管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$feifeicms.show.table();
	//排序
	$('.ff-order').on('click',function(){
		$order = $(this).attr('data-order');
		$sort = $(this).attr('data-sort');
		$url = "<?php echo ($link); ?>".replace("FFLINK",1).replace("<?php echo ($order); ?>",$order);
		if($(this).attr('data-sort') == "desc"){
			$url = $url.replace("desc","asc");
		}else{
			$url = $url.replace("asc","desc");
		}
		self.location.href = $url;
	});
	//排序图标
	$("img.ff-order").each(function(i){
		if($(this).attr('data-order') == '<?php echo ($order); ?>'){
			if($(this).attr('data-sort') == 'desc'){
				$(this).attr('src','__PUBLIC__/images/admin/down.gif').addClass('active');
			}else{
				$(this).attr('src','__PUBLIC__/images/admin/up.gif').addClass('active');
			}
			return false;
		}
	});
});
</script>
</head>
<body class="body">
<form action="?s=Admin-Admin-Delall" method="post" name="myform" id="myform"> 
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th class="r"><span style="float:left">日志筛选</span></th></tr></thead>
  <tr>
    <td class="tr">
    <select name="sid" class="w100"><option value="99">所属频道</option><option value="1" <?php if((sid)  ==  "1"): ?>selected<?php endif; ?>>视频</option><option value="1" <?php if((sid)  ==  "2"): ?>selected<?php endif; ?>>文章</option><option value="3" <?php if((sid)  ==  "3"): ?>selected<?php endif; ?>>专题</option></select>&nbsp;
    <select name="type" class="w100"><option value="99">日志类型</option><option value="1" <?php if(($type)  ==  "1"): ?>selected<?php endif; ?>>点播记录</option><option value="2" <?php if(($type)  ==  "2"): ?>selected<?php endif; ?>>收藏记录</option><option value="3" <?php if(($type)  ==  "3"): ?>selected<?php endif; ?>>想看记录</option><option value="4" <?php if(($type)  ==  "4"): ?>selected<?php endif; ?>>在看记录</option><option value="5" <?php if(($type)  ==  "5"): ?>selected<?php endif; ?>>看过记录</option></select>&nbsp;
    <input type="button" value="搜索" class="submit" onClick="post('?s=Admin-Record-Show');"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table">
  <thead>
    <tr class="ct">
      <th class="l" width="80"><img class="ff-order" data-order="record_id" data-sort="<?php echo ($sort); ?>" src="__PUBLIC__/images/admin/down.gif">ID</th>
      <th class="l">所属用户</th>
      <th class="l" width="80">所属频道</th>
      <th class="l" width="100">内容ID</th>
      <th class="l" width="100">日志类型</th>
      <th class="l" width="120"><img class="ff-order" data-order="record_time" data-sort="<?php echo ($sort); ?>" src="__PUBLIC__/images/admin/down.gif">日志时间</th>
      <th class="r" width="80">相关操作</th>
    </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><tbody>
  <tr>
    <td class="l ct"><input name='ids[]' type='checkbox' value='<?php echo ($feifei["record_id"]); ?>' class="noborder"><?php echo ($feifei["record_id"]); ?></td>
    <td class="l pd"><a href="?s=Admin-Record-Show-uid-<?php echo ($feifei["record_uid"]); ?>"><?php echo (remove_xss($feifei["user_name"])); ?></a></td>
    <td class="l ct"><a href="?s=Admin-Record-Show-sid-<?php echo ($feifei["record_sid"]); ?>"><?php switch($feifei["record_sid"]): ?><?php case "1":  ?>视频<?php break;?><?php case "2":  ?>文章<?php break;?><?php case "3":  ?>专题<?php break;?><?php case "4":  ?>标签<?php break;?><?php case "5":  ?>留言<?php break;?><?php case "6":  ?>评论<?php break;?><?php default: ?>未知<?php endswitch;?></a></td>
    <td class="l ct"><a href="?s=Admin-Record-Show-sid-<?php echo ($feifei["record_sid"]); ?>-did-<?php echo ($feifei["record_did"]); ?>">（<?php echo ($feifei["record_did"]); ?>）</a></td>
    <td class="l ct"><a href="?s=Admin-Record-Show-type-<?php echo ($feifei["record_type"]); ?>"><?php switch($feifei["record_type"]): ?><?php case "1":  ?>点播记录<?php break;?><?php case "2":  ?>收藏<?php break;?><?php case "3":  ?>想看<?php break;?><?php case "4":  ?>在看<?php break;?><?php case "5":  ?>看过<?php break;?><?php default: ?>未知<?php endswitch;?></a></td>
    <td class="l ct"><?php echo (date('Y-m-d H:i',$feifei["record_time"])); ?></td>
    <td class="r ct">
    <a href="?s=Admin-Record-Del-ids-<?php echo ($feifei["record_id"]); ?>" onClick="return confirm('确定删除?')">删除</a>
    </td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
   <tr>
      <td colspan="7" class="r pages"><?php echo ($pages); ?></td>
    </tr> 
  <tfoot>
    <tr>
      <td colspan="7" class="r">
      <input type="button" value="全选" class="submit" onClick="checkall('all');">
      <input name="" type="button" value="反选" class="submit" onClick="checkall();">
      <input type="button" value="删除" class="submit" onClick="post('?s=Admin-Record-Del');">
      </td>
    </tr>  
  </tfoot>
</table>
</form>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>