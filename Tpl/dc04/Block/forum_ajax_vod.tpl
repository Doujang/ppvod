<div class="row">
  <div class="col-xs-12" id="ff-forum-post">
    <include file="Block:forum_post" />
  </div>
  <div class="clearfix"></div>
  <!-- -->
  <div class="col-xs-12" id="ff-forum-item">
    <include file="Block:forum_item" />
  </div>
  <div class="clearfix"></div>
  <!-- forum-item end-->
  <gt name="page_array.records" value="10">
    <div class="col-xs-12" id="ff-forum-page">
      <h6>
        <a class="btn btn-default btn-block ff-page-more" id="ff-page-more" data-id="ff-forum-item" data-page="{$forum_page}" data-url="{$root}index.php?s=forum-ajax_vod-sid-{$forum_sid}-cid-{$forum_cid}-p-" href="javascript:;">查看更多评论...</a>
      </h6>
    </div>
    <div class="clearfix"></div>
  </gt>
  <!--pageid end -->
</div><!--row end -->