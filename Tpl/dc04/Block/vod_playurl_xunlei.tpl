<notempty name="item_down">
<div class="row vod-item-down">
  <div class="col-sm-9">
    <p class="text-muted">友情提示：未安装工具时，会自动提示安装，安装完毕后即可高速下载。</p>
  </div>
  <div class="col-sm-3 text-right">
    <a class="btn btn-primary btn-sm thunder_down_all" href="javascript:;">迅雷批量</a>
    <a class="btn btn-primary btn-sm xf_down_all" href="javascript:void(0);">旋风批量</a>
  </div>
</div>
<volist name="item_down.son" id="feifeison" key="pid">
<div class="row vod-item-down">
  <div class="col-sm-9">
    <div class="input-group">
      <span class="input-group-addon">
      <input type="checkbox" class="down_url" name="down_url_list_0" value="{$feifeison.url|ff_ThunderEncode}" file_name="{$feifeison.title}" checked="checked">
      </span>
      <input type="text" class="form-control" value="{$feifeison.title} {$feifeison.url|ff_ThunderEncode}">
    </div>
  </div>
  <div class="col-sm-3 text-right">
    <button type="button" class="btn btn-success btn-sm thunder_down">迅雷下载</button>
    <button type="button" class="btn btn-warning btn-sm qqdl">旋风下载</button>
  </div>
</div>
</volist>
<div class="clearfix"></div>
</notempty>