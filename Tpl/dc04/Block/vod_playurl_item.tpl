<ul class="list-unstyled vod-item-play ff-item-playurl" data-active="{$vod_id}-{$play_sid}-{$play_pid}" data-more="{$Think.config.ui_playurl|intval}">
  <volist name="item_play.son" id="feifeison" key="pid">
    <li class="col-xs-1">
    <a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$pid)}" class="btn btn-default btn-block" data-id="{$vod_id}-{$item_play.player_sid}-{$pid}"><if condition="strlen($feifeison['title']) eq 8">{$feifeison.title|msubstr=2,5}<else/>{$feifeison.title|h|msubstr=0,6}</if></a>
    </li>
  </volist>
</ul>