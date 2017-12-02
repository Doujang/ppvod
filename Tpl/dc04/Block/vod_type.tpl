<volist name="Tag" id="feifei">
<notempty name="feifei.tag_name">
<eq name="feifei.tag_list" value="vod_type">/ <a href="{:ff_url('vod/type',array('id'=>$list_id,'type'=>urlencode($feifei['tag_name']),'area'=>'','year'=>'','star'=>'','state'=>'','order'=>'hits'),true)}">{$feifei.tag_name}</a></eq>
</notempty>
</volist>