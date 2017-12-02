<!-- 热门文章循环样式-->
<ol class="news-item-hot">
  <volist name="item_news" id="feifei">
  <li class="col-xs-12 col-sm-6 ff-col"><a href="{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_name'],$feifei['news_jumpurl'],1)}">{$feifei.news_name|msubstr=0,27,true}</a></li></volist>
</ol>