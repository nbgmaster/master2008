 <table width="100%">
 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$set_head_002}</h2>

 <ul style="line-height:1.6em;">

   {foreach from=$array_ref key=pid item=ref name=ref}

   <li style="padding-top:2px;padding-bottom:2px;padding-right:2px">
   
   <a href="{$ref.link}" target="_blank" class="leftnavi">{*$ref.description|substr:0:32*}{$ref.description}</a>
   
   </li>

   {/foreach}

 </ul>

 </div>

 </td></tr>
 </table>
