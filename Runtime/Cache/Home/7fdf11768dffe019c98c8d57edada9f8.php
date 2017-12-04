<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>iframe播放器<?php echo ($play_status); ?></title>
<style>body{background:#000;overflow-x:hidden;overflow-y:hidden;}.embed-responsive .embed-responsive-item,.embed-responsive iframe,.embed-responsive embed,.embed-responsive object{position:absolute;top:0;bottom:0;left:0;width:100%;height:100%;border:0;}.embed-responsive.embed-responsive-16by9{padding-bottom:56.25%;}.embed-responsive.embed-responsive-4by3{padding-bottom:75%;}</style>
</head>
<body>
<div class="embed-responsive embed-responsive-4by3" id="cms_player">
<?php if(($play_trysee)  >  "0"): ?><?php echo ($vod_player); ?><?php else: ?><?php if(($play_status)  ==  "200"): ?><?php echo ($vod_player); ?><?php else: ?>参数错误<?php endif; ?><?php endif; ?>
<script>window.parent.feifei.playurl.vip_callback('<?php echo ($play_id); ?>','<?php echo ($play_sid); ?>','<?php echo ($play_pid); ?>','<?php echo ($play_status); ?>','<?php echo ($play_trysee); ?>','<?php echo (nb($play_tips)); ?>');</script>
</div>
</body>
</html>