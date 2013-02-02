<html>
<head>

<title>{$title_hp}</title>

        <!--meta charset="utf-8"-->
        <meta name="author" content="Stefan Richter" />
        <meta name="copyright" content="(C) 2009 Stefan Richter - www.nbg-master.de" />
        <meta name="publisher" content="Stefan Richter" />
        <meta name="language" content="{if $lang == 'german'}DE{else}EN{/if}" />
        <meta name="robots" content="follow,index" />
        <meta name="revisit-after" content="15 days" />
        <meta name="title" content="{$title_hp}" />
        <meta name="description" content="{$main_title}" />
        <meta name="keywords" content="{$keywords}" />
               
        <meta http-equiv="imagetoolbar" content="no">
           <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
             
        <!--meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"-->
        
        <noscript><meta http-equiv="refresh" content="0;URL=noscript.htm"></noscript>
        
        {if $rss_blog_status == '1'}
        <link rel="alternate" type="application/rss+xml" title="{if $lang == 'german'}{$feed_blog_description_DE}{else}{$feed_blog_description_EN}{/if}" href="{$root_dir}blog/feed/">
        {/if}

        {if $rss_gallery_status == '1'}
        <link rel="alternate" type="application/rss+xml" title="{if $lang == 'german'}{$feed_gallery_description_DE}{else}{$feed_gallery_description_EN}{/if}" href="{$root_dir}gallery/feed/">
        {/if}
     
<script type="text/javascript" src="{$root_dir}js/{$lang_java}.js"></script>

{include file="css/default.tpl"}

{if $browser == 'IE'}{include file="css/IE_fix.tpl"}{/if}

</head>

<body>

<center>

<a name="top"></a>

<table cellpadding="0" cellspacing="0" class="table_001">

<tr><td align="center" class="td_001">

<img src="{$dir_img}{$tpl_banner}" id="banner">

</td></tr>

<tr><td align="center" class="td_002" valign="top">   

    <ul id="navigation">
                   
        {*foreach from=$block item=nav_bt name=nav_bt}
  
             
             {if $nav_bt.position != 0} 
             <li class="button_1"><a href="{$ref_home}" class="navi"><p>
             {if $block.lang_active == 'DE'}{$nav_bt.title_DE}{else}{$nav_bt.title_EN}{/if}</p></a></li>
              {/if}
             {/foreach*}
              
        {if $module == '' OR $module == 'admin' AND $do == 'editblog'}<li class="button_1_hover">{$navi_home}</li>
        {else}<li class="button_1"><a href="{$ref_home}" class="navi"><p>{$navi_home}</p></a></li>
        {/if}  
        {if $module == 'cms' AND $cat == 'about'}<li class="button_2_hover">{$navi_about} </li> 
        {else}<li class="button_2"><a href="{$ref_about}" class="navi"><p>{$navi_about}</p></a></li>
        {/if}
        {if $module == 'cms' AND $cat == 'ref'}<li class="button_2_hover">{$navi_ref}</li>
        {else}<li class="button_2"><a href="{$ref_ref}" class="navi"><p>{$navi_ref}</p></a> </li>        
        {/if}
        {if $module == 'gallery' OR $module == 'admin' AND $do == 'editgallery'}<li class="button_2_hover">{$navi_gal}</li>
        {else}<li class="button_2"><a href="{$ref_gal}" class="navi"><p>{$navi_gal} </p></a></li>
        {/if}
        {if $module == 'cms' AND $cat == 'hiking'}<li class="button_2_hover">{$navi_hiking} </li>
        {else}<li class="button_2"><a href="{$ref_hiking}" class="navi"><p>{$navi_hiking}</p></a> </li>        
        {/if}
        {if $module == 'links'}<li class="button_2_hover">{$navi_links}</li>
        {else}<li class="button_2"><a href="{$ref_links}" class="navi"><p>{$navi_links}</p></a> </li>
        {/if}
        {if $module == 'cms' AND $cat == 'imprint'}<li class="button_2_hover">{$navi_imp}</li> 
        {else}<li class="button_2"><a href="{$ref_imp}" class="navi"><p>{$navi_imp} </p></a></li>         
        {/if}               
        <li class="button_3">&nbsp;&nbsp;</li>                       
    </ul>

</td></tr>

<tr><td class="td_003" valign="top">

<table cellspacing="0" cellpadding="0" class="mainframe">

<tr>

<td valign="top" class="leftframe">


