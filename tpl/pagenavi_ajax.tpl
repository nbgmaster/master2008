<table width="100%" class="table_011" cellspacing="0" cellpadding="1">

  <tr>

   <td align="left">

    <table cellspacing="1" cellpadding="1"><tr><td width="48" class="sides">{$sides}:</td>

    {foreach from=$pages_c item=pages name=pages}

    {if $pages.style == 'pageCurrent'}

    <td class="{$pages.style}_small" align="center">[{$pages.page}]</td>

    {/if}
    
    {if $blog}{assign var="blog_id" value=$blog.thisid}{assign var="com_total" value=$blog.comments_total}{/if}
    
    {if $pages.page == '&laquo;'}{assign var="pageid" value='first'}
      {elseif $pages.page == '&raquo;'}{assign var="pageid" value='last'}
      {else}{assign var="pageid" value=$pages.page}
    {/if}
    
    {if $pages.style == 'page'}

   <td class="{$pages.style}" align="center"><a onclick="xajax_page('blog_comments', '{$blog_id}', '{$pageid}', '{$com_total}')" class="pagenavi" style="cursor:pointer">{$pages.page}</a></td>

    {/if}

    {/foreach}

    </tr></table>

    </td>

    </tr>

   </table>
