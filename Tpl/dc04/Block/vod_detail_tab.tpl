<ul class="nav nav-tabs">
  <li class="active"><a href="#tab-home" data-toggle="tab">影片详情</a></li>
  <notempty name="item_yugao"> 
    <li><a href="#tab-yugao" data-toggle="tab">片花&预告</a></li>
  </notempty> 
  <notempty name="item_down"> 
    <li><a href="#tab-down" data-toggle="tab">下载观看</a></li>
  </notempty> 
  <notempty name="vod_series"> 
    <li><a href="#tab-series" data-toggle="tab">影片系列</a></li>
  </notempty>
  <li><a href="#tab-actor" data-toggle="tab">同主演作品</a></li>
  <li><a href="#tab-director" data-toggle="tab">同导演作品</a></li>
  <li><a href="#tab-like" data-toggle="tab">你可能喜欢</a></li>
  <notempty name="vod_scenario.info">
  <li><a href="#tab-scenario" data-toggle="tab">分集剧情</a></li>
  </notempty>
  <li><a href="#tab-forum" data-toggle="tab">我来说两句</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane fade in active" id="tab-home">
    <gt name="item_play.player_count" value="1">
      <include file="Block:vod_playurl_item" />
      <div class="clearfix ff-clearfix"></div>
    </gt>
    <p class="content">{:ff_url_tags_content(strip_tags($vod_content,'<a>'),$Tag)}</p>
  </div>
  <!-- -->
  <notempty name="item_yugao"> 
  <div class="tab-pane fade" id="tab-yugao">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">片花&预告</h4>
    </div>
    <include file="Block:vod_playurl_yugao" />
    <div class="clearfix ff-clearfix"></div>
  </div>
  </notempty>
  <!-- -->
  <notempty name="item_down"> 
  <div class="tab-pane fade" id="tab-down">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">下载观看</h4>
    </div>
    <include file="Block:vod_playurl_down" />
    <div class="clearfix ff-clearfix"></div>
  </div>
  </notempty>   
  <!-- -->
  <notempty name="vod_series"> 
  <div class="tab-pane fade" id="tab-series">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">影片系列</h4>
    </div>
    <include file="Block:vod_detail_series" />
  </div>
  </notempty>   
  <!-- --> 
  <div class="tab-pane fade" id="tab-actor">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">同主演作品</h4>
    </div>
    <include file="Block:vod_detail_actor" />
  </div>
  <!-- -->
  <div class="tab-pane fade" id="tab-director">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">同导演作品</h4>
    </div>
    <include file="Block:vod_detail_director" />
  </div>
  <!-- -->
  <div class="tab-pane fade in active" id="tab-like">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">你可能喜欢</h4>
    </div>
    <include file="Block:vod_detail_like" />
  </div>
  <!-- -->
  <notempty name="vod_scenario">
  <div class="tab-pane fade" id="tab-scenario">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">分集剧情</h4>
    </div>
     <include file="Block:scenario_item" />
  </div>
  </notempty>
  <!-- -->
  <div class="tab-pane fade in active" id="tab-forum">
    <div class="clearfix ff-clearfix"></div>
    <div class="page-header ff-border-none">
      <h4 class="ff-text">影片评论</h4>
    </div>
    <include file="Block:vod_ajax_forum" />
  </div>
</div><!--tab-content end -->