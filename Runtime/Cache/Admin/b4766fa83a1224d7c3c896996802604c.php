<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>第三方支付接入参数</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel='stylesheet' type='text/css' href='__PUBLIC__/css/admin-style.css' />
</head>
<body class="body">
<div class="title">
  <div class="left">第三方支付平台接入参数</div>
</div>
<div class="add">
  <form action="?s=Admin-Config-Update-type-pay" method="post" name="myform" id="myform">
  <ul><li class="left">支付商家选择：</li>
  <li class="right">
  <select name="config[user_pay_name]" class="w128">
  <option value="vyipay" <?php if(($user_pay_name)  ==  "vyipay"): ?>selected<?php endif; ?>>微易支付</option>
  <option value="19fk" <?php if(($user_pay_name)  ==  "19fk"): ?>selected<?php endif; ?>>瑞捷支付</option>
  </select>
  <label><a href="http://cdn.feifeicms.co/server/v3/jump.php?id=4&version=<?php echo L("feifeicms_version");?>" target="_blank" style="color:red">支付商家申请地址</a></label>
  <label><a href="?s=Admin-Orders-Show">订单管理</a></label></li>
  </ul>
  <ul><li class="left">支付商家编号：</li>
    <li class="right"><input type="text" class="w200" name="config[user_pay_appid]" value="<?php echo ($user_pay_appid); ?>"></li>
  </ul>
  <ul><li class="left">支付商家密钥：</li>
    <li class="right"><input type="text" class="w200" name="config[user_pay_appkey]" value="<?php echo ($user_pay_appkey); ?>"></li>
  </ul>
  <!-- -->
  <ul class="footer">
    <input type="submit" name="submit" value="提交"> <input type="reset" name="reset" value="重置">
  </ul>
  </form>
</div>
<center>Powered by <a href="<?php echo L("feifeicms_homeurl");?>" target="_blank">feifeicms</a> <font color="#FF0000"><?php echo L("feifeicms_version");?></font></center>
</body>
</html>