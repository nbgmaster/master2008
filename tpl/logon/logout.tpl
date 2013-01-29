<table width="100%">

 <form method="post" name="form_L">

 <tr>

  <td>

  <div class="navimenu" width="100%">

  <h2 class="navimenu-title">{$title_admin}</h2>

  <div align="right">

    <ul>
  
       <li><b>{$logon_greeting} {$loginname}</b></li>

       {if $Myadmin == 1}
       
       {if $module == 'admin' AND $do == 'settings'}{assign var="activity1" value='h'}{else}{assign var="activity1" value='n'}{/if}
       {if $module == 'admin' AND $do == 'newblog'}{assign var="activity2" value='h'}{else}{assign var="activity2" value='n'}{/if}
       {if $module == 'admin' AND $do == 'changecms' AND $cat == 'about'}{assign var="activity3" value='h'}{else}{assign var="activity3" value='n'}{/if}
       {if $module == 'admin' AND $do == 'changecms' AND $cat == 'ref'}{assign var="activity4" value='h'}{else}{assign var="activity4" value='n'}{/if}
       {if $module == 'admin' AND $do == 'newgallery'}{assign var="activity5" value='h'}{else}{assign var="activity5" value='n'}{/if}
       {if $module == 'admin' AND $do == 'editlinks'}{assign var="activity6" value='h'}{else}{assign var="activity6" value='n'}{/if}
       {if $module == 'admin' AND $do == 'changecms' AND $cat == 'hiking'}{assign var="activity7" value='h'}{else}{assign var="activity7" value='n'}{/if}
       {if $module == 'admin' AND $do == 'changecms' AND $cat == 'imprint'}{assign var="activity8" value='h'}{else}{assign var="activity8" value='n'}{/if}

       <li class="admin_{$activity1}">
       <a href="{$href_editset}" class="leftnavi_{$activity1}">{$set_edit}</a>
       </li>
       <li class="admin_{$activity2}">
       <a href="{$href_newblog}" class="leftnavi_{$activity2}">{$blog_new}</a>
       </li>
       <li class="admin_{$activity3}">
       <a href="{$href_editabout}" class="leftnavi_{$activity3}">{$about_edit}</a>
       </li>
       <li class="admin_{$activity4}">
       <a href="{$href_editref}" class="leftnavi_{$activity4}">{$ref_edit}</a>
       </li>
       <li class="admin_{$activity5}">
       <a href="{$href_newgal}" class="leftnavi_{$activity5}">{$new_gal}</a>
       </li>
       <li class="admin_{$activity6}">
       <a href="{$href_editlinks}" class="leftnavi_{$activity6}">{$links_edit}</a>
       </li>           
       <li class="admin_{$activity7}">
       <a href="{$href_edithiking}" class="leftnavi_{$activity7}">{$hiking_edit}</a>
       </li>
       <li class="admin_{$activity8}">
       <a href="{$href_editimp}" class="leftnavi_{$activity8}">{$imp_edit}</a>
       </li>
       
       {/if}

       <li><input type="submit" value="{$left_logout}" class="sub_001" name="logout"></li>

    </ul>

  </div>

  </td>

 </tr>

</form>

</table>

<div class="navimenu">
