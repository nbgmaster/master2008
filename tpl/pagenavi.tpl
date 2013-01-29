<table width="100%" class="table_007" cellspacing="0" cellpadding="1">

  <tr>
   
    <td align="left" class="td_010">
    <b>{$title_pagenavi}</b>
    </td>
    
   <td align="right">

   <table cellspacing="0" cellpadding="0" class="table_008">

    <tr>

    <td align="right" class="td_011">

    <table cellspacing="1" cellpadding="1"><tr>

    {foreach from=$array_p item=pages name=pages}

    {if $pages.style == 'pageCurrent'}

    <td class="{$pages.style}" align="center">[{$pages.page}]</td>

    {/if}

    {if $pages.style == 'page'}

   <td class="{$pages.style}" align="center"><a href="{$pages.link}" class="pagenavi">{$pages.page}</a></td>

    {/if}

    {/foreach}

    </tr></table>

    </td>

    {*if $array}

    <td>{$sides_total} <b>{$pagesT}</b> {$sides}</td>

    {/if*}

    </tr>

   </table>
   
   </td>

  </tr>

</table>
