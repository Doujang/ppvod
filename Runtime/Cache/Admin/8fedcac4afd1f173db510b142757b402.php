<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>友情链接管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
</head>
<body class="body">
<table border="0" cellpadding="0" cellspacing="0" class="table">
<form action="?s=Admin-Link-Updateall" method="post" name="myform" id="myform">
<thead>
<tr class="ct">
  <th class="l" width="70">排序</th>
  <th class="l" width="120">链接形式</th>
  <th class="l" width="200">网站名称</th>
  <th class="l" width="320">友情链接地址</th>
  <th class="l" >Logo地址</th>
  <th class="r" width="120">相关操作</th>
</tr>
</thead>
<?php if(is_array($list_link)): $i = 0; $__LIST__ = $list_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><input name="link_id[<?php echo ($feifei["link_id"]); ?>]" type="hidden" value="<?php echo ($feifei["link_id"]); ?>">
<tbody>
<tr>
<td class="l ct"><input name="link_order[<?php echo ($feifei["link_id"]); ?>]" type="text" value="<?php echo ($feifei["link_order"]); ?>" size="5" maxlength="5" class="w50"></td>
<td class="l ct"><select name="link_type[<?php echo ($feifei["link_id"]); ?>]"><option value="1">文字链接</option><option value="2" <?php if(($feifei["link_type"])  ==  "2"): ?>selected<?php endif; ?>>图片链接</option></select></td>
<td class="l ct"><input name="link_name[<?php echo ($feifei["link_id"]); ?>]" type="text" value="<?php echo ($feifei["link_name"]); ?>" maxlength="250" class="w150"></td>
<td class="l ct"><input name="link_url[<?php echo ($feifei["link_id"]); ?>]" type="text" value="<?php echo ($feifei["link_url"]); ?>" maxlength="250" class="w300"></td>
<td class="l ct"><input name="link_logo[<?php echo ($feifei["link_id"]); ?>]" type="text" value="<?php echo ($feifei["link_logo"]); ?>" maxlength="250" style="width:90%"></td>
<td class="r ct"><a href="?s=Admin-Link-Add-id-<?php echo ($feifei["link_id"]); ?>" title="点击修改友链">修改</a> <a href="?s=Admin-Link-Del-id-<?php echo ($feifei["link_id"]); ?>" onClick="return confirm('确定删除该友情链接吗?')" title="点击删除影片">删除</a></td>
</tr>
</tbody><?php endforeach; endif; else: echo "" ;endif; ?> 
<tfoot>
<tr>
  <td colspan="6" class="r"><input type="button" class="submit" value="批量修改" onClick="post('?s=Admin-Link-Updateall');"> <input class="submit" type="reset" name="Input" value="重置" > <input type="button" class="submit" value="添加链接" onClick="window.location='?s=Admin-Link-Add';"> 注：提交时如果"网站名称"为空则删除该对应的链接</td>
</tr>  
</tfoot>
</form>       
</table>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>