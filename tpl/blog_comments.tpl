 <table width="100%">
 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$left_blog_comments_head}</h2>

 <ul style="line-height:1.6em;">

   {foreach from=$array_blog_comments key=pid item=blog_comments name=blog_comments}

   <li style="padding-top: 2px; padding-bottom: 2px;">
       <a href="{$root_dir}{$blog_comments.link}">
           <b>{if $lang == 'german'}{$blog_comments.title_DE}{else}{$blog_comments.title_EN}{/if} ({$blog_comments.comment_numbers})</b>
       </a>
           <p></p>
           <i>{$blog_comments.comment_time}</i>

   </li>

   {/foreach}

 </ul>

 </div>

 </td></tr>
 </table>