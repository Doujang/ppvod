<!-- 循环图片展示 -->
<ul class="list-unstyled vod-item-img-vertical">
<volist name="item_list" id="feifei">
<li class="col-xs-2">
  <a href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}">
    <img class="img-responsive ff-img" data-original="{:ff_url_img($feifei['vod_pic'],$feifei['vod_content'])}" alt="{$feifei.vod_name}">
  </a>
  <h5 class="ff-text-hidden">
    <a class="ff-text" href="{:ff_url_vod_read($feifei['list_id'],$feifei['list_dir'],$feifei['vod_id'],$feifei['vod_ename'],$feifei['vod_jumpurl'])}" title="{$feifei.vod_name}">{$feifei.vod_name|msubstr=0,10}</a>
  </h5>
  <h6 class="ff-text-hidden ff-link">
    主演：{$feifei.vod_actor|ff_url_search}
  </h6>
  <h6>
    播放量：{$feifei.vod_hits|number_format}
  </h6>
</li>
</volist>
</ul>