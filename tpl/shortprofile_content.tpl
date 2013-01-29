 <table width="100%">
 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$set_head_001}</h2>

 <ul>

   {foreach from=$array_profile key=pid item=profile name=profile}

   <li><b>{$profile.$lang}:</b> {if $lang == 'german'}{$profile.value}{else}{$profile.value_EN}{/if}</li>

   {/foreach}

 </ul>

 </div>

 </td></tr>
 </table>

