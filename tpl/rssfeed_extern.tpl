 <table width="100%">
 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$rss_title}</h2>

 <ul style="line-height:1.6em;">

 {foreach from=$ay_rss item=rssnews name=rssnews}

   <li style="padding-top:2px;padding-bottom:2px;padding-right:2px">

   <a href="{$rssnews.href}" {if $blank}target="_blank"{/if} class="leftnavi">{$rssnews.title}</a>

   </li>

 {/foreach}

 </ul>

 </div>

 </td></tr>
 </table>
