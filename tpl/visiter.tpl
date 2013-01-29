 <table width="100%">
 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$title_visiter}</h2>

 <ul>

   <li><div style="float:left"><b>{$v_today}</b></div><div align="right" {if $browser == 'IE'}style="display:inline;width:100%"{/if}>{$visiters_today}&nbsp;</div></li>
   <li><div style="float:left"><b>{$v_yesterday}</b></div><div align="right" {if $browser == 'IE'}style="display:inline;width:100%"{/if}>{$visiters_yesterday}&nbsp;</div></li>
   <li><div style="float:left"><b>{$v_total}</b></div><div align="right" {if $browser == 'IE'}style="display:inline;width:100%"{/if}>{$visiters_total}&nbsp;</div></li>
      
 </ul>

 </div>

 </td></tr>
 </table>