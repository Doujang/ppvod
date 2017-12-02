<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
<title>{$site_name}</title> 
<description>{$site_name}</description> 
<link>{$site_url}</link> 
<language>zh-cn</language> 
<docs>{$site_name}</docs> 
<generator>Rss Powered By {$site_url}</generator> 
<image>
<url>{$site_url}/Public/images/logo.gif</url> 
</image>
<volist name=":ff_mysql_news('limit:'.$limit.';page_is:true;page_id:list;page_p:'.$page.';cache_name:default;cache_time:default;order:news_addtime;sort:asc')" id="feifei">
<item>
<title>{$feifei.news_name|htmlspecialchars}{$feifei.news_title|htmlspecialchars}</title> 
<link>{$site_url}{:ff_url_news_read($feifei['list_id'],$feifei['list_dir'],$feifei['news_id'],$feifei['news_ename'],$feifei['news_jumpurl'])}</link>
<author>{$feifei.news_actor|htmlspecialchars}</author>
<pubDate>{$feifei.news_addtime|date='Y-m-d H:i:s',###}</pubDate>
<description><![CDATA["{$feifei.news_content|msubstr=0,200}"]]></description> 
</item>
</volist>
</channel>
</rss>