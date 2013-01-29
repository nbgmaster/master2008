{literal}<?xml version="1.0" encoding="UTF-8" ?>{/literal}

<rss version="2.0">
<channel>

    <title>{$feed_blog_name_DE}</title>
    <link>http://www.richter-stefan.info/blog/feed/</link>
    <description>{$feed_blog_description_DE}</description>
    <language>de-de</language>
    <pubDate>{$feed_date}</pubDate>
    <lastBuildDate>{$feed_date}</lastBuildDate>
    <docs></docs>
    <generator>Rss Feed Engine</generator>
    <managingEditor></managingEditor>
    <webMaster>mail@richter-stefan.info</webMaster>
    
    <image>
        <title>{$feed_blog_img_DE}</title>
        <link>{$root_dir}</link>
        <url>{$dir_img}blog.jpg</url>
        <width>125</width>
        <height>123</height>
        <description>Blog Images</description>
    </image>

    {foreach from=$data item=datarow}<item>
    <title>{$datarow.title_DE}</title>
        <guid>{$root_dir}{$datarow.link}</guid>
        <link>{$root_dir}{$datarow.link}</link>
        <description></description>
        <pubDate>{$datarow.date}</pubDate>
        </item>
    {/foreach}

</channel>
</rss>
