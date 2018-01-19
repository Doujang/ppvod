<notempty name="vod_scenario.info">
<ul class="row list-unstyled vod-scenario-item" id="vod-scenario-item" data-max="{$Think.CONFIG.ui_scenario}">
</ul>
<dl class="scenario-content vod-scenario" id="vod-scenario">
  <volist name="vod_scenario.info" id="feifei">
  <dt id="vod-scenario-title-{$i}" class="vod-scenario-title">
    <a class="ff-text" href="{:ff_url('vod/view',array('id'=>$vod_id,'pid'=>$i),true)}">{$vod_name} 第{$i}集</a>
  </dt>
  <dd id="vod-scenario-info-{$i}" class="vod-scenario-info">
    {$feifei}
   </dd>
  </volist>
</dl>
</notempty>