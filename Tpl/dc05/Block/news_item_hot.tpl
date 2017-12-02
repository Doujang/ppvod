<li>
<a href="{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_name'],$feifei['news_jumpurl'])}">{$feifei.news_name|msubstr=0,42,true}
</a>
<small><i class="fa fa-thumbs-o-up"> {$feifei.news_up|number_format}</i></small>
</li>