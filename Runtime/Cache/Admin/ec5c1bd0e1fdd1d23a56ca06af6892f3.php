<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>分类管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script charset="utf-8" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript">
function changeid($sid){
	if($sid == 1){
		$(".list-vod").show();
	}else if($sid == 2){
		$(".list-vod").hide();
	}
};
$(document).ready(function(){
	changeid("<?php echo ($list_sid); ?>");
	$('#list_sid').change(function(){
		changeid($(this).val());
	});
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','list_name') == false){
			return false;
		}
		if($feifeicms.form.empty('myform','list_skin') == false){
			return false;
		}				
	});
	<?php if(!empty($list_id)): ?>showseo(<?php echo ($list_sid); ?>);<?php endif; ?>
});
</script>
</head>
<body class="body">
<script charset="utf-8" src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<form action="?s=Admin-List-Update" method="post" name="myform" id="myform">
<?php if(($list_id)  >  "0"): ?><input type="hidden" name="list_id" id="list_id" value="<?php echo ($list_id); ?>"><?php endif; ?>
<div class="title">
	<div class="left"><?php echo ($tpltitle); ?>分类分类</div>
    <div class="right"><a href="?s=Admin-List-Show">返回分类管理</a></div>
</div>
<div class="add">
<ul><li class="left">所属模型：</li>
  <li class="right"><select name="list_sid" id="list_sid" class="w120"><option value="1" <?php if(($list_sid)  ==  "1"): ?>selected<?php endif; ?>>视频模型 | vod</option><option value="2" <?php if(($list_sid)  ==  "2"): ?>selected<?php endif; ?>>新闻模块 | news</option></select>&nbsp;</li>
</ul>
<ul><li class="left">上级分类：</li>
  <li class="right"><select name="list_pid" id="list_pid" class="w120"><option value="0">无</option><?php $_result=ff_mysql_list('order:list_pid asc,list_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $list_pid): ?>selected<?php endif; ?>><?php echo ($feifei["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> * 不选择将成为一级分类</li>
</ul>
<ul class="list-vod"><li class="left">影片观看权限：</li>
  <li class="right"><select name="list_ispay" id="list_ispay" class="w120">                            
    <option value='0'>免费点播</option>
    <option value='1' <?php if(($list_ispay)  ==  "1"): ?>selected<?php endif; ?>>VIP点播</option>
    </select></li>
</ul>
<ul class="list-vod"><li class="left">影片单独付费：</li>
  <li class="right"><input type="text" name="list_price" id="list_price" value="<?php echo ($list_price); ?>" maxlength="6" class="w120">
    <label>单位：（影币）</label></li>
</ul>
<ul class="list-vod"><li class="left">影片试看时间：</li>
  <li class="right"><input type="text" name="list_trysee" id="list_trysee" value="<?php echo ($list_trysee); ?>" maxlength="3" class="w120">
    <label>单位：（分钟）</label></li>
</ul>
<ul class="list-vod"><li class="left">版权跳转时间：</li>
  <li class="right"><input type="text" name="list_copyright" id="list_copyright" value="<?php echo ($list_copyright); ?>" maxlength="3" class="w120">
    <label>单位：（秒）</label></li>
</ul>
<ul><li class="left">分类排序：</li>
  <li class="right"><input type="text" name="list_oid" id="list_oid" value="<?php echo ($list_oid); ?>" maxlength="3" class="w120"><label>越小越前面</label></li>
</ul>
<ul><li class="left">分类中文名称：</li>
  <li class="right"><input type="text" name="list_name" id="list_name" value="<?php echo ($list_name); ?>" maxlength="20" error="* 分类名称不能为空!" class="w120"><span id="list_name_error">*</span></li>
</ul>
<ul><li class="left">分类英文别名：</li>
   <li class="right"><input type="text" name="list_dir" id="list_dir" value="<?php echo ($list_dir); ?>" maxlength="40" class="w120"><label>留空则自动转为拼音</label></li>
</ul>
<ul><li class="left">分类页模板名：</li>
   <li class="right"><input type="text" name="list_skin" id="list_skin" value="<?php echo (($list_skin)?($list_skin):'vod_list'); ?>" maxlength="40" error="* 使用模板名不能为空!" class="w120"><label><a href="javascript:" onClick="list_skin.value='channel';">频道页</a></label><span id="list_skin_error"></span></li>
</ul>
<ul><li class="left">详情页模板名：</li>
   <li class="right"><input type="text" name="list_skin_detail" id="list_skin_detail" value="<?php echo (($list_skin_detail)?($list_skin_detail):'vod_detail'); ?>" maxlength="40" class="w120"></li>
</ul>
<ul class="list-vod"><li class="left">播放页模板名：</li>
   <li class="right"><input type="text" name="list_skin_play" id="list_skin_play" value="<?php echo (($list_skin_play)?($list_skin_play):'vod_play'); ?>" maxlength="40" class="w120"></li>
</ul>
<ul><li class="left">筛选页模板名：</li>
   <li class="right"><input type="text" name="list_skin_type" id="list_skin_type" value="<?php echo (($list_skin_type)?($list_skin_type):'vod_type'); ?>" maxlength="40" class="w120"></li>
</ul>
<ul><li class="left">分类SEO标题：</li>
   <li class="right"><input type="text" name="list_title" id="list_title" value="<?php echo ($list_title); ?>" maxlength="80" class="w400">&nbsp;</li>
</ul>
<ul><li class="left">分类SEO关键词：</li>
   <li class="right"><input type="text" name="list_keywords" id="list_keywords" value="<?php echo ($list_keywords); ?>" maxlength="150" class="w400">&nbsp;</li>
</ul>
<ul><li class="left">分类SEO描述：</li>
   <li class="right"><textarea name="list_description" id="list_description"><?php echo ($list_description); ?></textarea></li>
</ul>
<ul><li class="left">分类扩展配置.多分类：</li>
   <li class="right"><input type="text" name="list_extend[type]" id="list_extend_type" value="<?php echo ($list_extend["type"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.地区：</li>
   <li class="right"><input type="text" name="list_extend[area]" id="list_extend_area" value="<?php echo ($list_extend["area"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.年代：</li>
   <li class="right"><input type="text" name="list_extend[year]" id="list_extend_year" value="<?php echo ($list_extend["year"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.明星：</li>
   <li class="right"><input type="text" name="list_extend[star]" id="list_extend_star" value="<?php echo ($list_extend["star"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.资源：</li>
   <li class="right"><input type="text" name="list_extend[state]" id="list_extend_state" value="<?php echo ($list_extend["state"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.语言：</li>
   <li class="right"><input type="text" name="list_extend[language]" id="list_extend_language" value="<?php echo ($list_extend["language"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.版本：</li>
   <li class="right"><input type="text" name="list_extend[version]" id="list_extend_version" value="<?php echo ($list_extend["version"]); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="list-vod"><li class="left">分类扩展配置.周期：</li>
   <li class="right"><input type="text" name="list_extend[weekday]" id="list_extend_weekday" value="<?php echo (($list_extend["weekday"])?($list_extend["weekday"]):'一,二,三,四,五,六,日'); ?>" class="w400">&nbsp;</li>
</ul>
<ul class="footer">
<input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置"> <?php if(($admin_id)  >  "0"): ?>注：不修改密码请留空<?php endif; ?>
</ul>
</div>
</form>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>