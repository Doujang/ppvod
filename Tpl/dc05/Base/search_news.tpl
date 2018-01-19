<form class="navbar-form navbar-right ff-search" data-sid="{$site_sid|default=2}" data-limit="{:C('ui_search_limit')}" role="search" method="post" action="{$root}index.php?s=news-search-name">
  <div class="input-group">
    <input type="text" class="form-control ff-wd" name="wd" placeholder="请输入关键字">
    <div class="input-group-btn">
      <button type="submit" class="btn btn-default" data-action="{:ff_url('news/search',array('name'=>'FFWD'), true)}">
        <span class="glyphicon glyphicon-search"></span>
      </button>
    </div>
  </div>
</form>