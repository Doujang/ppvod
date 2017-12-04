<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>文章管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript">
function changeurl(cid,continu,player,stars,status){
	self.location.href='?s=Admin-News-Show-cid-'+cid+'-stars-'+stars+'-status-'+status+'-type-<?php echo ($type); ?>-order-<?php echo ($order); ?>';
}
$(document).ready(function(){
	$feifeicms.show.table();
	$('#selectcid').change(function(){
		changeurl($(this).val(),'','','','');
	});
	$('#selectstars').change(function(){
		changeurl('','','',$(this).val(),'');
	});		
});
function createhtml(id){
	var offset = $("#html_"+id).offset();
	var left = (offset.left/2)+50;
	var top = offset.top+15;
	var html = $.ajax({
		url: '?s=Admin-Create-news_detail_id-ids-'+id,
		async: false
	}).responseText;
	$("#htmltags").html(html);
	$("#htmltags").css({left:left,top:top,display:""});	
	window.setTimeout(function(){
		$("#htmltags").hide();
	},1000);
}
</script>
</head>
<body class="body">
<!--生成静态预览框-->
<div id="htmltags" style="position:absolute;display:none;" class="htmltags"></div>
<!--图片预览框-->
<div id="showpic" class="showpic" style="display:none;"><img name="showpic_img" id="showpic_img" width="120" height="160"></div>
<!--背景灰色变暗-->
<div id="showbg" style="position:absolute;left:0px;top:0px;filter:Alpha(Opacity=0);opacity:0.0;background-color:#fff;z-index:8;"></div>
<form action="?s=Admin-News-Show" method="post" name="myform" id="myform">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead><tr><th class="r"><span style="float:left">新闻资讯管理</span><span class="right"><a href="?s=Admin-News-Add" style="float:right">添加文章资讯</a></span></th></tr></thead>
  <tr>
    <td class="tr ct" style="height:40px"><input type="button" value="所有" class="submit" onClick="changeurl('','','','','',2);"> <input type="button" value="未审核" class="submit" onClick="changeurl('','','','',2);"> <input type="button" value="已审核" class="submit" onClick="changeurl('','','','',1);"> <select name="selectcid" id="selectcid">
<option value="">按分类查看</option><?php $_result=ff_mysql_list('sid:2;order:list_pid asc,list_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $cid): ?>selected<?php endif; ?>><?php echo ($feifei["list_name"]); ?></option><?php if(is_array($feifei['list_son'])): $i = 0; $__LIST__ = $feifei['list_son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $cid): ?>selected<?php endif; ?>>├ <?php echo ($feifei["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="selectstars" id="selectstars"><option value="0">按星级查看</option><option value="5" <?php if(($stars)  ==  "5"): ?>selected<?php endif; ?>>五星</option><option value="4" <?php if(($stars)  ==  "4"): ?>selected<?php endif; ?>>四星</option><option value="3" <?php if(($stars)  ==  "3"): ?>selected<?php endif; ?>>三星</option><option value="2" <?php if(($stars)  ==  "2"): ?>selected<?php endif; ?>>二星</option><option value="1" <?php if(($stars)  ==  "1"): ?>selected<?php endif; ?>>一星</option></select> <input type="text" name="wd" id="wd" maxlength="20" value="<?php echo (urldecode(($wd)?($wd):'输入关键字搜索影片')); ?>" onClick="this.select();" style="color:#666666"> <input type="button" value="搜索" class="submit" onClick="post('?s=Admin-News-Show');"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table">
  <thead>
    <tr class="ct">
      <th class="r" width="20">ID</th>
      <th class="l" ><span style="float:left; padding-top:7px"><?php if(($orders)  ==  "news_id desc"): ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-id-order-asc"><img src="__PUBLIC__/images/admin/up.gif" border="0" alt="点击按ID升序排列"></a><?php else: ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-id-order-desc"><img src="__PUBLIC__/images/admin/down.gif" border="0" alt="点击按ID降序排列"></a><?php endif; ?></span>新闻标题</th>
      <th class="l" width="70">分类</th>
      <th class="l" width="60">人气<?php if(($orders)  ==  "news_hits desc"): ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits-order-asc"><img src="__PUBLIC__/images/admin/up.gif" border="0" alt="点击按人气升序排列"></a><?php else: ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-hits-order-desc"><img src="__PUBLIC__/images/admin/down.gif" border="0" alt="点击按人气降序排列"></a><?php endif; ?></th>
      <th class="l" width="60">评分<?php if(($orders)  ==  "news_gold desc"): ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-gold-order-asc"><img src="__PUBLIC__/images/admin/up.gif" border="0" alt="点击按评分升序排列"></a><?php else: ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-gold-order-desc"><img src="__PUBLIC__/images/admin/down.gif" border="0" alt="点击按评分降序排列"></a><?php endif; ?></th>
      <th class="l" width="80">文章权重<?php if(($orders)  ==  "news_stars desc"): ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-stars-order-asc"><img src="__PUBLIC__/images/admin/up.gif" border="0" alt="点击按星级升序排列"></a><?php else: ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-stars-order-desc"><img src="__PUBLIC__/images/admin/down.gif" border="0" alt="点击按星级降序排列"></a><?php endif; ?></th>
      <th class="l" width="80">更新时间<?php if(($orders)  ==  "news_addtime desc"): ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-addtime-order-asc"><img src="__PUBLIC__/images/admin/up.gif" border="0" alt="点击按时间升序排列"></a><?php else: ?><a href="?s=Admin-News-Show-cid-<?php echo ($cid); ?>-stars-<?php echo ($stars); ?>-status-<?php echo ($status); ?>-type-addtime-order-desc"><img src="__PUBLIC__/images/admin/down.gif" border="0" alt="点击按时间降序排列"></a><?php endif; ?></th>
      <th class="r" width="100">相关操作</th>
    </tr>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><tbody>
  <tr>
    <td class="r ct"><input name='ids[]' type='checkbox' value='<?php echo ($feifei["news_id"]); ?>' class="noborder"></td>
    <td class="l pd">
    <span style="float:left"><span style="color:#666666"><?php echo ($feifei["news_id"]); ?>、</span><?php if(C('url_html') > 0): ?><a href="javascript:createhtml('<?php echo ($feifei["news_id"]); ?>');" id="html_<?php echo ($feifei["news_id"]); ?>"><font color="green">生成</font></a><?php endif; ?> 『<a href="<?php echo ($feifei["list_url"]); ?>"><?php echo ($feifei["list_name"]); ?></a>』<a href="<?php echo ($feifei["news_url"]); ?>" target="_blank"><?php echo (msubstr($feifei["news_name"],0,40,'utf-8',true)); ?></a> <span id="ct_<?php echo ($feifei["news_id"]); ?>"><?php if(($feifei['news_continu'])  !=  "0"): ?><sup onClick="setcontinu(<?php echo ($feifei["news_id"]); ?>,'<?php echo ($feifei["news_continu"]); ?>');" class="navpoint"><?php echo ($feifei["news_continu"]); ?></sup><?php else: ?><img src="__PUBLIC__/images/admin/ct.gif" style="margin-top:10px" class="navpoint" onClick="setcontinu(<?php echo ($feifei["news_id"]); ?>,'<?php echo ($feifei["news_continu"]); ?>');"><?php endif; ?></span></span>
    </td>
    <td class="l ct"><a href="<?php echo ($feifei["list_url"]); ?>"><?php echo (ff_list_find($feifei["news_cid"])); ?></a></td>
    <td class="l ct"><?php echo ($feifei["news_hits"]); ?></td>
    <td class="l ct"><?php echo ($feifei["news_gold"]); ?></td>
    <td class="l ct"><?php if(is_array($feifei['news_starsarr'])): $i = 0; $__LIST__ = $feifei['news_starsarr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajaxstar): ++$i;$mod = ($i % 2 )?><img src="__PUBLIC__/images/admin/star<?php echo ($ajaxstar); ?>.gif" onClick="setstars('News',<?php echo ($feifei["news_id"]); ?>,<?php echo ($i); ?>);" id="star_<?php echo ($feifei["news_id"]); ?>_<?php echo ($i); ?>" class="navpoint"><?php endforeach; endif; else: echo "" ;endif; ?></td>
    <td class="l ct"><?php echo (date('Y-m-d',$feifei["news_addtime"])); ?></td>
    <td class="r ct"><a href="?s=Admin-News-Add-cid-<?php echo ($feifei["news_cid"]); ?>-id-<?php echo ($feifei["news_id"]); ?>" title="点击修改影片">编辑</a> <a href="?s=Admin-News-Del-id-<?php echo ($feifei["news_id"]); ?>" onClick="return confirm('确定删除该文章吗?')" title="点击删除影片">删除</a> <?php if(($feifei["news_status"])  ==  "1"): ?><a href="?s=Admin-News-Status-id-<?php echo ($feifei["news_id"]); ?>-value-0" title="点击隐藏文章">隐藏</a><?php else: ?><a href="?s=Admin-News-Status-id-<?php echo ($feifei["news_id"]); ?>-value-1" title="点击显示文章"><font color="red">显示</font></a><?php endif; ?></td>
  </tr>
  </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
      <td colspan="9" class="r pages"><?php echo ($pages); ?></td>
    </tr>   
  <tfoot>
    <tr>
      <td colspan="9" class="r"><input type="button" value="全选" class="submit" onClick="checkall('all');"> <input name="" type="button" value="反选" class="submit" onClick="checkall();"> <?php if((C("url_html"))  ==  "1"): ?><input type="button" value="生成静态" name="createhtml" id="createhtml" class="submit" onClick="post('?s=Admin-News-Create');"/><?php endif; ?> <input type="button" value="批量删除" class="submit" onClick="if(confirm('删除后将无法还原,确定要删除吗?')){post('?s=Admin-News-Delall');}else{return false;}"> <input type="button" value="批量移动" class="submit" onClick="$('#psetcid').show();"> <span style="display:none" id="psetcid"><select name="pestcid"><option value="">选择目标分类</option><?php $_result=ff_mysql_list('sid:2;limit:0;order:list_pid asc,list_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $cid): ?>selected<?php endif; ?>><?php echo ($feifei["list_name"]); ?></option><?php if(is_array($feifei['list_son'])): $i = 0; $__LIST__ = $feifei['list_son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $cid): ?>selected<?php endif; ?>>├ <?php echo ($feifei["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select> <input type="button" class="submit" value="确定转移" onClick="post('?s=Admin-News-Pestcid');"/></span></td>
    </tr>  
  </tfoot>
</table>
</form>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>