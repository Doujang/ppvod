<!--<button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-open"></span> {$vod_hits+999|number_format}</button> -->
<a class="btn btn-default btn-sm ff-updown" href="javascript:;" data-id="{$vod_id}" data-module="vod" data-type="up" data-toggle="tooltip" data-placement="top" title="支持">
	<span class="glyphicon glyphicon-thumbs-up"></span>
  顶：<span class="ff-updown-tips">{$vod_up}</span>
</a>
<a class="btn btn-default btn-sm ff-updown" href="javascript:;" data-id="{$vod_id}" data-module="vod" data-type="down" data-toggle="tooltip" data-placement="top" title="反对">
  <span class="glyphicon glyphicon-thumbs-down"></span>
  踩：<span class="ff-updown-tips">{$vod_down}</span>
</a>