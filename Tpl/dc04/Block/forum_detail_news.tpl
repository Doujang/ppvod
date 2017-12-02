<notempty name="forum_cid">
<div id="ff-forum-detail-vod">
<div class="col-xs-12 ff-col">
  <div class="media news-item-medial">
    <a class="media-left" href="{:ff_url_news_read($news['list_id'],$news['list_dir'],$news['news_id'],$news['news_name'],$news['news_jumpurl'],1)}">
    <img class="ff-img" data-original="{:ff_url_img($news['news_pic'],$news['news_content'])}" title="{$news.news_name}">
    </a>
    <div class="media-body">
      <h4 class="media-heading">
        <a href="{:ff_url_news_read($news['list_id'],$news['list_dir'],$news['news_id'],$news['news_name'],$news['news_jumpurl'])}">
        {$news.news_name|msubstr=0,36,true}
        </a>
      </h4>
      <p class="text-muted news-remark hidden-xs hidden-sm">
        {$news.news_remark|strip_tags}
      </p>
    </div>
  </div>
</div>
<div class="clearfix"></div>
</div>
</notempty>