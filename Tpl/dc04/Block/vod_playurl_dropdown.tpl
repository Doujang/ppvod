<div class="btn-group">
  <button type="button" class="btn ff-btn-play dropdown-toggle btn-sm" data-toggle="dropdown">{$play_name_zh|msubstr=0,4}<span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu">
    <volist name="vod_play_list" id="feifei" key="k">
    <notin name="feifei.player_name_en" value="yugao,down">
    <li><a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$feifei['player_sid'],$play_pid)}">{$feifei.player_name_zh|msubstr=0,4}</a></li>
    </notin>
    </volist>
  </ul>
</div>