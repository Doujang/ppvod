<?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>{$site_url}</loc>
<lastmod>{:date('Y-m-d',time())}</lastmod>
<changefreq>hourly</changefreq>
<priority>1.0</priority>
</url>
<volist name=":ff_mysql_news('limit:'.$limit.';page_is:true;page_id:list;page_p:'.$page.';cache_name:default;cache_time:default;order:news_addtime;sort:asc')" id="feifei">
<url>
<loc>{$site_url}{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_ename'],$feifei['news_jumpurl'])}</loc>
<lastmod>{$feifei.news_addtime|date='Y-m-d',###}</lastmod>
<changefreq>daily</changefreq>
<priority>0.8</priority>
</url>
</volist>
</urlset>