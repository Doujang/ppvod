<notempty name="forum_cid">
<div id="ff-forum-detail-vod">
<div class="col-xs-12 ff-col">
  <div class="media">
    <a class="media-left" href="{:ff_url_vod_read($vod['list_id'],$vod['list_dir'],$vod['vod_id'],$vod['vod_ename'],$vod['vod_jumpurl'])}">
      <img class="media-object img-thumbnail ff-img" data-original="{$vod.vod_pic|ff_url_img}" alt="{$vod.vod_name}">
    </a>
    <div class="media-body">
      <dl class="dl-horizontal">
        <dt>主演：</dt>
        <dd class="ff-link">{$vod.vod_actor|ff_url_search}</dd>
        <dt>导演：</dt>
        <dd class="ff-link">{$vod.vod_director|ff_url_search='director'}</dd>
        <dt>地区：</dt>
        <dd class="ff-link"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>urlencode($vod_area),'year'=>'','star'=>'','state'=>'','order'=>'hits'),true)}">{$vod.vod_area|default='未录入'}</a></dd>
        <dt>年份：</dt>
        <dd class="ff-link"><a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>'','area'=>'','year'=>$vod_year,'star'=>'','state'=>'','order'=>'hits'),true)}">{$vod.vod_year|default='2017'}</a></dd>
        <dt>剧情：</dt>
        <dd>
          {$vod.vod_content|strip_tags|msubstr=0,300,true}
        </dd>
      </dl>
    </div>
  </div>
</div>
<div class="clearfix ff-clearfix"></div>
</div>
</notempty>