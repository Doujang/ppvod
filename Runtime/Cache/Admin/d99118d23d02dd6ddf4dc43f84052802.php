<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>广告管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$feifeicms.show.table();
});
</script>
<style>
.ads1{color:blue;font-weight:bold; padding-left:5px;}
.ads2{color:#333;font-weight:bold; padding-left:5px;}
.ads3{color:#333; font-size:14px; width:95%; height:70px;}
</style>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<thead>
	<tr><th colspan="3" class="r"><span style="float:left">网站广告管理</span><span style="float:right"><a href="?s=Admin-Ads-Add">添加广告</a></span></th></tr>
</thead>
<tbody>
<form action="?s=Admin-Ads-All" method="post" name="myform" id="myform">
<?php if(is_array($list_ads)): $i = 0; $__LIST__ = $list_ads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><input name="ads_id[<?php echo ($feifei["ads_id"]); ?>]" type="hidden" value="<?php echo ($feifei["ads_id"]); ?>">
<tr>
  <td width="320" class="l ct">
  <p>广告标识：<input name="ads_name[<?php echo ($feifei["ads_id"]); ?>]" type="text" value="<?php echo ($feifei["ads_name"]); ?>" maxlength="25" class="w200 ads1"></p>
  <p>调用代码：<input type="text" value="{:ff_url_ads('<?php echo ($feifei["ads_name"]); ?>')}" maxlength="50" class="w200 ads2"></p>
  </td>
  <td class="l ct"><textarea name="ads_content[<?php echo ($feifei["ads_id"]); ?>]" class="ads3"><?php echo (htmlspecialchars($feifei["ads_content"])); ?></textarea></td>
  <td width="120" class="r ct">
    <p><a href="?s=Admin-Ads-View-id-<?php echo ($feifei["ads_id"]); ?>" target="_blank">预览广告</a></p>
    <p><a href="?s=Admin-Ads-Del-id-<?php echo ($feifei["ads_id"]); ?>" onClick="return confirm('确定删除该广告吗?')">删除广告</a></p>
  </td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody> 
<tfoot>
  <tr>
    <td colspan="2" class="r"><input type="submit" class="submit" value="批量修改"> <input class="submit" type="reset" name="Input" value="重置" > 注：提交时如果"广告标识"为空则删除该对应的广告位</td>
  </tr>  
</tfoot>
</form>       
</table>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>