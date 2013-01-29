
{$tpl_main_start}
{$tpl_table_lineheight}
<b>{$gal_head_01}, <a href="http://www.abicalypse2005.de" target="_blank" class="postedlink">abicalypse2005.de</a>{$gal_head_02}</b>
{$gal_head_03}

{$tpl_table_end}
{$tpl_main_end}
 
 {foreach from=$array key=gid item=gallery name=gallery}
 
 <a name="g{$gallery.thisid}"></a>

 <table cellspacing="0" cellpadding="0" width="96%" class="borderframe" style="height:100%;padding-bottom:4px">

  <tr>

   <td align="left" class="td_008" valign="top">

     <a href="{$root_dir}gallery/{$gallery.thisid}/">

     <img id="img" src="{$root_dir}gallery/{$gallery.folder}/images/{$gallery.preview1}" class="img_002"></a>

   </td>

   <td style="height:100%" align="center" valign="top">
   
  <table width="100%" cellspacing="0" cellpadding="8" style="height:100%">
  
   <tr>
  
   <td class="blog_msg" style="height:100%" valign="top">
   
   <table cellspacing="0" cellpadding="0" width="100%">
   <tr><td>
  
   <span class="blog_title">{$gallery.title}</span>
   
   {if $admin}
       
       &nbsp;
       
       <a href="{$href_editgal}{$gallery.thisid}/" title="{$editgallery}"><img src="{$dir_img}edit.jpg" border="0"></a>
       
       {if $Myadmin == 1}
        
            &nbsp;
        
            <form method="post" onsubmit="return confirm('{$confirm_delete}')" style="display:inline">
        
            <input type="image" value="del" title="{$delgallery}" src="{$dir_img}delete.gif" name="submit_del" id="submit" style="cursor:pointer">
        
            <input type="hidden" name="gid" value="{$gallery.thisid}">
 
            </form>
    
       {/if}
       
       {if $gallery.visibility == 0 OR $gallery.too_early}</td><td align="right"><img src="{$dir_img}invisible.gif" title="{$gid_invisible}">{/if}
     
   
   {/if}
   
   </td>
   </tr>
   </table>

   <table cellspacing="0" cellpadding="0" width="100%">
   
   <tr>
   
    <td class="td_013">
   
     <span class="blog_date">{$gallery.date_formatted}</span>
     
     <p>&nbsp;</p>
     
     </td>
     
    </tr>
     
   </table>

   <p class="p_004">{$gallery.description}</p>
   
    </td>

  </tr>

 </table>  

   </td>

  </tr>

 </table>

 {/foreach}

 
 {if $array_p}{include file="pagenavi_style2.tpl"}{/if}