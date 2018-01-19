<div class="media news-item-medial">
	<a class="media-left" href="{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_ename'],$feifei['news_jumpurl'],1)}" target="_blank">
  	<img class="media-object img-rounded ff-img" data-original="{:ff_url_img($feifei['news_pic'],$feifei['news_content'])}" title="{$feifei.news_name}">
  </a>
  <div class="media-body">
    <h2 class="media-heading">
      <a href="{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_name'],$feifei['news_jumpurl'])}" target="_blank">
      {$feifei.news_name|msubstr=0,36,true}
      </a>
    </h2>
    <p class="text-muted news-remark hidden-xs">
      {$feifei.news_remark|strip_tags|msubstr=0,90,true}
    </p>
    <h5 class="text-muted news-tool">
    	<i class="fa fa-clock-o"> {$feifei.news_addtime|date='Y/m/d',###}</i> 
    	<i class="fa fa-eye"> {$feifei.news_hits|number_format}</i> 
    	<i class="fa fa-thumbs-o-up"> {$feifei.news_up|number_format}</i>
      <i class="fa fa-thumbs-o-down"> {$feifei.news_down|number_format}</i>
      <i class="fa fa-list-ul hidden-xs hidden-sm"> <a href="{:ff_url_news_show($feifei['list_id'],$feifei['list_dir'],1)}">{$feifei.list_name}</a></i>
      <notempty name="feifei.news_keywords">
      <volist name=":explode(',',$feifei['news_keywords'])" id="feifeitag" offset="0" length="1">
      	<i class="fa fa-tag hidden-xs hidden-sm"> <a href="{$feifeitag|ff_url_tags='news_tag'}">{$feifeitag}</a></i>
      </volist>
      </notempty>
    </h5>
  </div>
  
</div>