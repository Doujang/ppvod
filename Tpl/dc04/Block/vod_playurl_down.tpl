<ul class="list-unstyled vod-item-play ff-item-playurl" data-active="{$vod_id}-{$play_sid}-{$play_pid}" data-more="{$Think.config.ui_playurl|intval}">
  <volist name="item_down.son" id="feifeison" key="pid">
    <li class="col-xs-1">
    <a href="{:ff_url('vod/down',array('id'=>$vod_id,'pid'=>$pid),true)}" class="btn btn-default btn-block" data-id="{$vod_id}-{$item_down.player_sid}-{$pid}"><if condition="strlen($feifeison['title']) eq 8">{$feifeison.title|msubstr=2,5}<else/>{$feifeison.title|h|msubstr=0,6}</if></a>
    </li>
  </volist>
</ul>