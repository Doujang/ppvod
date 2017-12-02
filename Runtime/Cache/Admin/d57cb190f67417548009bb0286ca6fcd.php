<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台用户管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
<script src="__PUBLIC__/jquery/1.11.3/jquery.min.js"></script>
<script src="__PUBLIC__/js/admin.js"></script>
<script src="__PUBLIC__/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function add_url(){
	$count = $("#vod-url>tr").length;
	$tr ='<tr><td class="tl">播放地址<strong>'+($count+1)+'</strong>：</td><td class="tr"><p class="play_list"><select name="vod_play[]" id="vod_play"><?php $_result=F('_feifeicms/player');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player_name): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>"><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($player_name[0]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <select name="vod_server[]" id="vod_server"><option value="">不使用公共前缀</option><?php $_result=C('play_server');if(is_array($_result)): $n = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server_name): ++$n;$mod = ($n % 2 )?><option value="<?php echo ($key); ?>"><?php echo ($server_name); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> <a class="play_repair" href="javascript:;">检正格式</a></p><p class="play_url"><textarea name="vod_url[]"></textarea></p></td></tr>';
	if($count > 0){
		$("#vod-url>tr:last-child").after($tr);
		$("#vod-url>tr:last textarea").val('');
	}else{
		$("#vod-url").append($tr);
	}
}
function add_scenario(){
	$count = $("#vod-scenario>tr").length;
	$tr ='<tr><td class="tl">第'+($count+1)+'集：</td><td class="tr"><p class="play_url"><textarea name="vod_scenario[info][]"></textarea></p></td></tr>';
	if($count > 0){
		$("#vod-scenario>tr:last-child").after($tr);
		$("#vod-scenario>tr:last textarea").val('');
	}else{
		$("#vod-scenario").append($tr);
	}
}
$(document).ready(function(){
	//编辑器调用
	CKEDITOR.replace('vod_content',{
		filebrowserImageUploadUrl : './?g=admin&m=upload&a=ckeditor&sid=vod'
	});
	//常用TAG加载
	$("#vod_keywords_label").load("?s=Admin-Tag-Showajax-input-vod_keywords-sid-vod_tag");
	//tabs标签
	$("#tabs>a").click(function(){
		var no = $(this).attr('id');
		var n = $("#tabs>a").length;
		showtab('tabs',no,n);
		$("#tabs>a").removeClass("on");
		$(this).addClass("on");
		return false;
	});
	// 分类change
	$('#vod_cid').on("change", function(){
		//alert($("select[id='vod_state']").children('option').eq(1).val());
		//$('#vod_state').children('option').eq(0).val();
		//
		$cid = $(this).children('option:selected').val();
		if($cid){
			$.getJSON('?s=Admin-List-extend-id-'+$cid, null, function(json){
				if(json.status==1){
				 $.each(json.data, function(key, value){
					 if(value != ''){
						 $("#vod_"+key+"_label").empty();
						 $.each(value, function(key2, value2){
								$("#vod_"+key+"_label").append('<a href="javascript:;" class="select" data-id="vod_'+key+'">'+value2+'</a>');
						 });
					 }
					});
				}
			});
		}
	});
	//默认选项点击选择
	$(document).on("click", ".select", function(){
		$id = $(this).attr('data-id');
		if($id == 'vod_type'||$id == 'vod_keywords'||$id == 'vod_area'||$id == 'vod_language'){
			$val = $("input[id='"+$id+"']").val();
			if($val == ''){
				$val = $(this).text();
			}else{
				$val = $val+','+$(this).text();
				$val = $val.split(',').unique().join(',');//排重
			}
			$("input[id='"+$id+"']").val($val);
		}else{
			$("input[id='"+$id+"']").val($(this).text());
		}
	});
	// 豆瓣资料获取
	$('#vod_douban_caiji').on('click', function(){
		$(this).html('请稍等...');
		$id = $('#vod_douban_id').val();
		if($id > 10000){
			$.ajax({
			 type: "get",
			 async: false,
			 url: "http://cdn.feifeicms.co/server/v3/douban.php?id="+$id,
			 dataType: "jsonp",
			 jsonp: "callback",
			 jsonpCallback:"DouBan",
			 timeout: 5000,
			 success: function(json){
				 if(json.status == 200){
					 if(json.data.vod_total){
						 $('#vod_total').val(json.data.vod_total);
					 }
					 if(json.data.vod_continu){
						 $('#vod_continu').val(json.data.vod_continu);
					 }
					 if(json.data.vod_isend){
						 $('#vod_isend').val(json.data.vod_isend);
					 }
					 if(json.data.vod_name){
						 $('#vod_name').val(json.data.vod_name);
					 }
					 if(json.data.vod_pic){
						 $('#vod_pic').val(json.data.vod_pic);
					 }
					 if(json.data.vod_year){
						 $('#vod_year').val(json.data.vod_year);
					 }
					 if(json.data.vod_filmtime){
						 $('#vod_filmtime').val(json.data.vod_filmtime);
					 }
					 if(json.data.vod_language){
						 $('#vod_language').val(json.data.vod_language);
					 }
					 if(json.data.vod_area){
						 $('#vod_area').val(json.data.vod_area);
					 }
					 if(json.data.vod_type){
						 $('#vod_type').val(json.data.vod_type);
					 }
					 if(json.data.vod_actor){
						 $('#vod_actor').val(json.data.vod_actor);
					 }
					 if(json.data.vod_director){
						 $('#vod_director').val(json.data.vod_director);
					 }
					 if(json.data.vod_length){
						 $('#vod_length').val(json.data.vod_length);
					 }
					 if(json.data.vod_content){
						 CKEDITOR.instances.vod_content.setData(json.data.vod_content);
					 }
					 if(json.data.vod_gold){
						 $('#vod_douban_score').val(json.data.vod_douban_score);
					 }
					 if(json.data.vod_keywords){
						 $('#vod_keywords').val(json.data.vod_keywords);
					 }
					 if(!$('#vod_reurl').val()){
					 	$('#vod_reurl').val(json.data.vod_reurl);
					 }
					 $('#vod_inputer').val(json.data.vod_inputer);
				 }else{
					 alert(json.error);
				 }
			 },
			 error: function(){
				alert('请求解析服务器失败。');
			 }
	 });
		}else{
			alert('请先填写该影片对应的豆瓣的ID。');
		}
	});
	//表单提交
	$("#myform").submit(function(){
		if($feifeicms.form.empty('myform','vod_name') == false){
			return false;
		}
		if($("#vod_cid").val()==0){
			alert('请选择分类');
			return false;
		}
	});	
	// 校正播放地址
	$(document).on("click", "a.play_repair", function(){
		$html_play = $(this).parent();      //播放列表对象
		$html_url = $(this).parent().next();//播放地址对象
		//alert($html_play.find("select").eq(0).val());
		//alert($html_url.find("textarea").eq(0).val());
		//无播放地址
		if($html_url.find("textarea").eq(0).val()==''){
			return false;
		}
		var $array_url = $html_url.find("textarea").eq(0).val().split("\n");
		var $array_new = new Array();
		for(var $key in $array_url){
			if($key != 'unique'){
				$urls = $array_url[$key].split('$');
				if(!$urls[4]){
					$urls[4] = $html_play.find("select").eq(0).val();
				}
				if(!$urls[3]){
					$urls[3] = '{feifeicms}';
				}
				if(!$urls[2]){
					$urls[2] = '{feifeicms}';
				}
				if(!$urls[1]){
					$urls[1] = $urls[0];
					$urls[0] = $key*1+1;
				}else{
					$urls[1] = $urls[1];
					$urls[0] = $urls[0];
				}
				$array_new[$key] = $urls.join('$');
			}
		}
		$html_url.find("textarea").eq(0).val($array_new.join('\n'));
	});	
});
</script>
</head>
<body class="body">
<form action="?s=Admin-Vod-Update" method="post" name="myform" id="myform">
<?php if(($vod_id)  >  "0"): ?><input type="hidden" name="vod_id" value="<?php echo ($vod_id); ?>"><?php endif; ?>
<div class="title">
	<div class="tabs" id="tabs"><a href="javascript:void(0)" class="on" id="1"><?php echo ($vod_tplname); ?>视频</a><a href="javascript:void(0)" id="2">扩展信息</a><a href="javascript:void(0)" id="3">分集剧情</a></div>
  <div class="right"><a href="?s=Admin-Vod-Show">返回视频管理</a></div>
</div>
<div class="add">
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs1">
  <tr>
    <td class="tl">影片名称：</td>
    <td class="tr"><input type="text" name="vod_name" id="vod_name" value="<?php echo ($vod_name); ?>" maxlength="255" error="* 名称不能为空" class="w300 ti_5">
    影片分类：<label><select name="vod_cid" id="vod_cid" class="w100"><option value="">请选择</option><?php $_result=ff_mysql_list('sid:1;limit:0;order:list_pid asc,list_oid;sort:asc');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifei["list_id"]); ?>" <?php if(($feifei["list_id"])  ==  $list_id): ?>selected<?php endif; ?>><?php echo ($feifei["list_name"]); ?></option><?php if(is_array($feifei["list_son"])): $i = 0; $__LIST__ = $feifei["list_son"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifeison): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($feifeison["list_id"]); ?>" <?php if(($feifeison["list_id"])  ==  $list_id): ?>selected<?php endif; ?>>├ <?php echo ($feifeison["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></label> 影片状态：<label><select name="vod_status" class="w100"><option value="1">显示</option><option value="0" <?php if(($vod_status)  ==  "0"): ?>selected<?php endif; ?>>隐藏</option></select></label></td>
  </tr>
  <tr>
    <td class="tl">影片副标：</td>
    <td class="tr"><input type="text" name="vod_title" id="vod_title" maxlength="255" value="<?php echo ($vod_title); ?>" class="w300 ti_5"> 影片时长：<label><input type="text" name="vod_length" id="vod_length" maxlength="3" value="<?php echo ($vod_length); ?>" class="w100 ct" title="单位：分钟"></label> 版权跳转：<label><input type="text" name="vod_copyright" id="vod_copyright" maxlength="7" value="<?php echo ($vod_copyright); ?>" class="w100 ct" title="单位秒"></label></td>
  </tr>
  <tr>
    <td class="tl">影片主演：</td>
    <td class="tr" style="position:relative"><input type="text" name="vod_actor" id="vod_actor" maxlength="255" value="<?php echo ($vod_actor); ?>" class="w300 ti_5" title="可使用半角逗号,分隔"> 上映日期：<label><input type="text" name="vod_filmtime" id="vod_filmtime" maxlength="10" value="<?php if(!empty($vod_filmtime)): ?><?php echo (date('Y-m-d',$vod_filmtime)); ?><?php endif; ?>" class="w100 ct" title="如：2013-07-20"></label> 更新日期：<label><input type="text" name="vod_addtime" id="vod_addtime" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w100"> <input name="checktime" type="checkbox" style="border:none;width:auto;position:absolute; top:8px" value="1" checked title="勾选则使用系统当前时间"></label></td>
  </tr>
  <tr>
    <td class="tl">影片导演：</td>
    <td class="tr"><input type="text" name="vod_director" id="vod_director" maxlength="255" value="<?php echo ($vod_director); ?>" class="w300 ti_5"> 总共集数：<label><input type="text" name="vod_total" id="vod_total" maxlength="10" value="<?php echo ($vod_total); ?>" class="w100 ct" title="如：共40集"></label> 连载信息：<label><input type="text" name="vod_continu" id="vod_continu" maxlength="15" value="<?php echo ($vod_continu); ?>" class="w100 ct" title="留空为完结"></label></td>
  </tr>
  <tr>
    <td class="tl">影片别名：</td>
    <td class="tr"><input type="text" name="vod_ename" id="vod_ename" value="<?php echo ($vod_ename); ?>" maxlength="120" class="w300 ti_5"> 电视频道：<label><input type="text" name="vod_tv" id="vod_tv" maxlength="7" value="<?php echo ($vod_tv); ?>" class="w100 ct" title="电视频道"></label> 节目周期：<label><input type="text" name="vod_weekday" id="vod_weekday" maxlength="7" value="<?php echo ($vod_weekday); ?>" class="w100 ct" title="一，二，三，四，五，六，七"></label></td>
  </tr>
  <tr>
    <td class="tl">来源标识：</td>
    <td class="tr"><input type="text" name="vod_reurl" id="vod_reurl" value="<?php echo ($vod_reurl); ?>" maxlength="150" class="w300 ti_5"> 豆瓣评分：<label><input type="text" name="vod_douban_score" id="vod_douban_score" value="<?php echo ($vod_douban_score); ?>" class="w100 ct"></label> 豆瓣ID值：<label><input type="text" name="vod_douban_id" id="vod_douban_id" value="<?php echo ($vod_douban_id); ?>" class="w100 ct"></label> <a id="vod_douban_caiji" href="javascript:;">获取资料</a></td>
  </tr>
  <tr>
    <td class="tl">影片TAG：</td>
    <td class="tr"><input type="text" name="vod_keywords" id="vod_keywords"  maxlength="255" value="<?php echo ($vod_keywords); ?>" class="w300 xy_tag ti_5"><p id="vod_keywords_label" style="padding:0; margin:5px 0 0 0">常用TAG加载中...</p></td>
  </tr>     
  <tr>
    <td class="tl">扩展分类：</td>
    <td class="tr"><input type="text" name="vod_type" id="vod_type" maxlength="255" value="<?php echo ($vod_type); ?>" class="w300 ti_5">
    <p id="vod_type_label" style="padding:0; margin:5px 0 0 0"><?php $_result=explode(',',$list_extend['type']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_type"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></p></td>
  </tr> 
  <tr>
    <td class="tl">影片系列：</td>
    <td class="tr"><input type="text" name="vod_series" id="vod_series" value="<?php echo ($vod_series); ?>" maxlength="120" class="w300 ti_5">
    <p style="color:#666; padding:0; margin:5px 0 0 0">如“变形金刚”1、2、3部ID分别为77，88，99则每部影片此处填写为77,88,99；或将每部影片都填“变形金刚”（推荐）。</p></td>
  </tr>
  <tr>
    <td class="tl">发行年份：</td>
    <td class="tr"><input type="text" name="vod_year" id="vod_year" value="<?php echo ($vod_year); ?>" class="w100 ct"> <label id="vod_year_label"><?php $_result=explode(',',$list_extend['year']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_year"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></label></td>
  </tr> 
  <tr>
    <td class="tl">发行地区：</td>
    <td class="tr"><input type="text" name="vod_area" id="vod_area" value="<?php echo ($vod_area); ?>" class="w100 ct"> <label id="vod_area_label"><?php $_result=explode(',',$list_extend['area']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_area"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></label></td>
  </tr>   
  <tr>
    <td class="tl">影片对白：</td>
    <td class="tr"><input type="text" name="vod_language" id="vod_language" value="<?php echo ($vod_language); ?>" class="w100 ct"> <label id="vod_language_label"><?php $_result=explode(',',$list_extend['language']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_language"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></label></td>
  </tr>
  <tr>
    <td class="tl">影片版本：</td>
    <td class="tr"><input type="text" name="vod_version" id="vod_version" value="<?php echo ($vod_version); ?>" class="w100 ct"> <label id="vod_version_label"><?php $_result=explode(',',$list_extend['version']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_version"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></label></td>
  </tr>
  <tr>
    <td class="tl">资源类别：</td>
    <td class="tr"><input type="text" name="vod_state" id="vod_state" value="<?php echo (($vod_state)?($vod_state):'正片'); ?>" class="w100 ct"> <label id="vod_state_label"><?php $_result=explode(',',$list_extend['state']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): ++$i;$mod = ($i % 2 )?><a href="javascript:;" class="select" data-id="vod_state"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></label></td>
  </tr>   
  <tr>
    <td class="tl">海报剧照：</td>
    <td class="tr"><label style="float:left; margin-top:3px; margin-right:5px"><input type="text" name="vod_pic" id="vod_pic" maxlength="255" value="<?php echo ($vod_pic); ?>" class="w300 ti_5" onMouseOver="if(this.value)showpic(event,this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();"></label><iframe src="?s=Admin-Upload-Show-sid-vod" scrolling="no" topmargin="0" width="280" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:3px; float:left"></iframe></td>
  </tr>
  <tr>
    <td class="tl">轮播图片：</td>
    <td class="tr"><label style="float:left; margin-top:3px; margin-right:5px"><input type="text" name="vod_pic_slide" id="vod_pic_slide" maxlength="255" value="<?php echo ($vod_pic_slide); ?>" class="w300 ti_5" onMouseOver="if(this.value)showpic(event,this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();"></label><iframe src="?s=Admin-Upload-Show-sid-vod-fileback-vod_pic_slide" scrolling="no" topmargin="0" width="280" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:3px; float:left"></iframe></td>
  </tr> 
  <tr>
    <td class="tl">背景图片：</td>
    <td class="tr"><label style="float:left; margin-top:3px; margin-right:5px"><input type="text" name="vod_pic_bg" id="vod_pic_bg" maxlength="255" value="<?php echo ($vod_pic_bg); ?>" class="w300 ti_5" onMouseOver="if(this.value)showpic(event,this.value,'<?php echo C("upload_path");?>/');" onMouseOut="hiddenpic();"></label><iframe src="?s=Admin-Upload-Show-sid-vod-fileback-vod_pic_bg" scrolling="no" topmargin="0" width="280" height="26" marginwidth="0" marginheight="0" frameborder="0" align="left" style="margin-top:3px; float:left"></iframe></td>
  </tr>
  <?php $array_url = explode('$$$',$vod_url); ?>
	<tbody id="vod-url">
  <?php if(is_array($vod_play_list)): $u = 0; $__LIST__ = $vod_play_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$feifei): ++$u;$mod = ($u % 2 )?><tr>
      <td class="tl">播放地址<strong><?php echo ($u); ?></strong>：</td>
      <td class="tr">
      <p class="play_list">
      <select name="vod_play[]" id="vod_play"><?php $_result=F('_feifeicms/player');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$player_name): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($key); ?>" <?php if($key == $feifei['player_name_en']): ?>selected<?php endif; ?>><?php echo ($i); ?>.<?php echo ($key); ?>.<?php echo ($player_name[0]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>
      <select name="vod_server[]" id="vod_server" style="width:140px"><option value="">不使用公共前缀</option><?php $_result=C('play_server');if(is_array($_result)): $n = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server_name): ++$n;$mod = ($n % 2 )?><option value="<?php echo ($key); ?>" <?php if($key == $feifei['server_name']): ?>selected<?php endif; ?>><?php echo ($server_name); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>
      <a class="play_repair" href="javascript:;">检正格式</a>
      </p>
      <p class="play_url">
        <textarea name='vod_url[]'><?php echo ($array_url[($feifei['player_sid']-1)]); ?></textarea>
      </p>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <?php if(empty($vod_play_list)): ?><script type="text/javascript">add_url();</script><?php endif; ?>
  </tbody>
   <tr>
    <td class="tl">增加播放地址：</td>
    <td class="tr"><a href="javascript:add_url();" class="play_url_add">点击这里添加一组播放地址</a> <label style="color:#666">格式：分集标题$播放地址$分集图片$分集看点$指定播放器；占位标记为feifeicms</label></td>
  </tr>    
  <tr>
    <td class="tl">影片简介：</td>
    <td class="tr padding-5050"><textarea name="vod_content" id="vod_content"><?php echo ($vod_content); ?></textarea></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs2" style="display:none">
  <tr>
    <td class="tl">推荐星级：</td>
    <td class="tr" id="abc"><input name="vod_stars" id="vod_stars" type="hidden" value="<?php echo ($vod_stars); ?>"><?php if(is_array($vod_starsarr)): $i = 0; $__LIST__ = $vod_starsarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ajaxstar): ++$i;$mod = ($i % 2 )?><img src="__PUBLIC__/images/admin/star<?php echo ($ajaxstar); ?>.gif" onClick="addstars('vod',<?php echo ($i); ?>);" id="star_<?php echo ($i); ?>" class="navpoint"><?php endforeach; endif; else: echo "" ;endif; ?></td>
  </tr>
  <tr>
    <td class="tl">影片权限：</td>
    <td class="tr">
    <select name="vod_ispay" id="vod_ispay" class="w100">                            
    <option value='0'>免费点播</option>
    <option value='1' <?php if(($vod_ispay)  ==  "1"): ?>selected<?php endif; ?>>VIP点播</option>
    </select>
    </td>
  </tr>
  <tr>
    <td class="tl">单片付费：</td>
    <td class="tr">
    <input type="text" name="vod_price" id="vod_price" value="<?php echo (intval($vod_price)); ?>" maxlength="6" class="w150">
    <label>影币</label>
    </td>
  </tr>
  <tr>
    <td class="tl">影片试看：</td>
    <td class="tr">
    <input type="text" name="vod_trysee" id="vod_trysee" value="<?php echo (intval($vod_trysee)); ?>" maxlength="3" class="w150">
    <label>分钟</label></td>
  </tr>     
  <tr>
    <td class="tl">首字母：</td>
    <td class="tr"><input type="text" name="vod_letter" id="vod_letter" value="<?php echo ($vod_letter); ?>" maxlength="1" class="w150"></td>
  </tr>
  <tr>
    <td class="tl">总人气：</td>
    <td class="tr"><input type="text" name="vod_hits" id="vod_hits" maxlength="15" value="<?php echo ($vod_hits); ?>" class="w150"></td>
  </tr>       
  <tr>
    <td class="tl">月人气：</td>
    <td class="tr"><input type="text" name="vod_hits_month" id="vod_hits_month" maxlength="15" value="<?php echo ($vod_hits_month); ?>" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">周人气：</td>
    <td class="tr"><input type="text" name="vod_hits_week" id="vod_hits_week" maxlength="15" value="<?php echo ($vod_hits_week); ?>" class="w150"></td>
  </tr>
  <tr>
    <td class="tl">日人气：</td>
    <td class="tr"><input type="text" name="vod_hits_day" id="vod_hits_day" maxlength="15" value="<?php echo ($vod_hits_day); ?>" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">评分值：</td>
    <td class="tr"><input type="text" name="vod_gold" id="vod_gold" value="<?php echo ($vod_gold); ?>" maxlength="4" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">评分人数：</td>
    <td class="tr"><input type="text" name="vod_golder" id="vod_golder" value="<?php echo ($vod_golder); ?>" maxlength="8" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">支持：</td>
    <td class="tr"><input type="text" name="vod_up" id="vod_up" value="<?php echo ($vod_up); ?>" maxlength="8" class="w150"></td>
  </tr>
  <tr>
    <td class="tl">反对：</td>
    <td class="tr"><input type="text" name="vod_down" id="vod_down" value="<?php echo ($vod_down); ?>" maxlength="8" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">完结：</td>
    <td class="tr"><input type="text" name="vod_isend" id="vod_isend" value="<?php echo ($vod_isend); ?>" maxlength="8" class="w150" disabled="disabled"></td>
  </tr>     
  <tr>
    <td class="tl">录入时间：</td>
    <td class="tr"><input type="text" name="vod_addtime" id="vod_addtime" maxlength="25" value="<?php echo (date('Y-m-d H:i:s',$vod_addtime)); ?>" class="w150"></td>
  </tr> 
  <tr>
    <td class="tl">独立模板：</td>
    <td class="tr"><input type="text" name="vod_skin" id="vod_skin" value="<?php echo ($vod_skin); ?>" maxlength="25" class="w150"></td>
  </tr>
  <tr>
    <td class="tl">录入编辑：</td>
    <td class="tr"><input type="text" name="vod_inputer" id="vod_inputer" value="<?php echo ($vod_inputer); ?>" maxlength="15" class="w150"></td>
  </tr>             
  <tr>
    <td class="tl">跳转URL：</td>
    <td class="tr"><input type="text" name="vod_jumpurl" id="vod_jumpurl" value="<?php echo ($vod_jumpurl); ?>" maxlength="150" class="w300"></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="table" id="tabs3" style="display:none">
  <tbody id="vod-scenario">
  	<?php if(is_array($vod_scenario["info"])): $i = 0; $__LIST__ = $vod_scenario["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scenario): ++$i;$mod = ($i % 2 )?><tr>
      <td class="tl">第<?php echo ($i); ?>集：</td>
      <td class="tr"><p class="play_url"><textarea name="vod_scenario[info][]"><?php echo ($scenario); ?></textarea></p></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
   <tr>
    <td class="tl">增加剧情介绍：</td>
    <td class="tr"><a href="javascript:add_scenario();" class="play_url_add">点击这里添加一集剧情介绍</a></td>
  </tr>
</table>
<ul class="footer">
	<input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置">
</ul>
</div>
</form>
<!--图片预览框-->
<div id="showpic" class="showpic" style="display:none;"><img name="showpic_img" id="showpic_img" width="120" height="160"></div>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>