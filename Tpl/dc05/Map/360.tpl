<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex>
<volist name=":ff_mysql_news('limit:'.$limit.';page_is:true;page_id:list;page_p:'.$page.';cache_name:default;cache_time:default;order:news_addtime;sort:asc')" id="feifei">
<sitemap>
<loc>{$site_url}{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_ename'],$feifei['news_jumpurl'])}</loc>
<lastmod>{$feifei.news_addtime|date='Y-m-d',###}</lastmod>
</sitemap>
</volist>
</sitemapindex>