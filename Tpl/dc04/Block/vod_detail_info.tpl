<div class="pic">
  <img class="ff-img" data-original="{$vod_pic|ff_url_img=$vod_content}" alt="{$vod_name}全集观看">
</div>
<dl class="dl-horizontal infos">
  <dt>主演：</dt>
  <dd class="ff-text-hidden ff-link">{$vod_actor|ff_url_search}</dd>
  <dt>导演：</dt>
  <dd class="ff-text-hidden ff-link">{$vod_director|ff_url_search='director'}</dd>
  <dt>类型：</dt>
  <dd class="ff-text-hidden ff-link">
    <a href="{:ff_url_vod_show($list_id,$list_dir,1)}">{$list_name}</a>
    <include file="Block:vod_type" />
  </dd>      
  <dt>地区：</dt>
  <dd class="ff-link"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>urlencode($vod_area),'year'=>'','star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_area|default='未录入'}</a></dd>
  <dt>年份：</dt>
  <dd class="ff-link">
    <a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true)}">{$vod_year|default='2017'}</a>
  </dd>
  <dt>评分：</dt>
  <dd class="ff-raty">
    <include file="Block:vod_score" />
  </dd>
  <dt>人气：</dt>
  <dd>{$vod_hits|number_format}</dd> 
  <dt>分享：</dt>
  <dd class="share">
    <include file="Block:vod_share" />
  </dd>
  <dd class="play-btn">
    <notempty name="item_yugao">
    <a href="{:ff_url('vod/yugao',array('id'=>$vod_id,'pid'=>$item_yugao['player_count']),true)}" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-play-circle"></span> 预告片</a>
    </notempty>
    <notempty name="item_play">
    <a href="{:ff_url_vod_play($list_id,$list_dir,$vod_id,$vod_ename,$item_play['player_sid'],$item_play['player_count'])}" class="btn ff-btn-play btn-lg"><span class="glyphicon glyphicon-play-circle"></span> 播放正片</a>
    </notempty>
    <notempty name="item_down">
    <a href="{:ff_url('vod/down',array('id'=>$vod_id,'pid'=>$item_down['player_count']),true)}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-circle-arrow-down"></span> 下载观看</a>
    </notempty>
  </dd>
</dl>