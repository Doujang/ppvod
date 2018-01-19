<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iframe播放器{$play_status}</title>
<style>html,body{margin:0px;height:100%;background:#000}</style>
</head>
<body>
<div id="cms_player">
<gt name="play_trysee" value="0">{$vod_player}<else/><eq name="play_status" value="200">{$vod_player}<else/>参数错误</eq></gt>
<script>window.parent.feifei.playurl.vip_callback('{$play_id}','{$play_sid}','{$play_pid}','{$play_status}','{$play_trysee}','{$play_tips|nb}');</script>
</div>
</body>
</html>