<script type="text/javascript" src="{$root_dir}js/loading.js"></script>
<script type="text/javascript" src="{$root_dir}js/gallery_edit.js"></script>

{include file="gallery/loading.tpl"}

<div id="install">

{foreach from=$array key=gid item=gallery name=gallery}

<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">

  <div class="navimenu">

  <h2 class="navimenu-title">{$editgal_data}</h2>

  </div>

  <table width="100%" class="table_013">

  <form method="post" name="formE" onsubmit="return checkForm(this);">

   <tr>

    <td width="120">

    <b>{$f_title}:</b>

    </td>

    <td>

    <input type="text" name="title" value="{$gallery.title}" maxlength="60" class="inp_002" style="width:173px">

    </td>

    <td width="120">

    <b>{$f_extension_title}:</b>

    </td>

    <td>

    <input type="text" name="title_EN" value="{$gallery.title_EN}" maxlength="60" class="inp_002" style="width:173px">

    </td>

   </tr>

   <tr>

    <td valign="top">

    <b>{$newgal_desc}:</b>

    </td>

    <td>
    
      <textarea name="description" class="form_desc">{$gallery.description}</textarea>

    </td>

    <td valign="top">

    <b>{$newgal_desc_EN}:</b>

    </td>

    <td>

      <textarea name="description_EN" class="form_desc">{$gallery.description_EN}</textarea>

    </td>

   </tr>

   <tr>
  
    <td>

    <b>{$input_folder}:</b>

    </td>

    <td>

    <select name="folder">

    {html_options values=$subfolders output=$subfolders selected=$Tsubfolder}

    </select>

    </td>
    
    <td>
    <b>{$f_options_o1_gal}</b></td><td>
 
        {if $gallery.visibility == ''}
           {assign var="visibility" value=1}
        {/if}
        <input type="radio" value="1" name="visibility" {if $gallery.visibility == 1 || $visibility == 1}checked="checked"{/if}>{$f_options_o1_yes} <input type="radio" value="0" name="visibility"{if $gallery.visibility == 0 AND !$visibility}checked="checked"{/if}>{$f_options_o1_no}

        
    </td>

   </tr>
   
   <tr>

    <td>

    <b>{$f_options_o3}</b>

    </td>

    <td colspan="3">

    <select name="d_day">{html_options values=$d_days output=$d_days selected=$c_day}</select>
    <select name="d_month">{html_options values=$d_months output=$d_months selected=$c_month}</select>
    <select name="d_year">{html_options values=$d_years output=$d_years selected=$c_year}</select>
    <select name="d_hour">{html_options values=$d_hours output=$d_hours selected=$c_hour}</select>
    <select name="d_minute">{html_options values=$d_minutes output=$d_minutes selected=$c_minute}</select>

    </td>
    
   </tr>

  </table>
  
  <input type="hidden" name="gid" value="{$gallery.thisid}">

  <table cellpadding="3" class="form_submit" align="center">
    
     <tr>
    
      <td>
    
      <input type="submit" id="submitM" name="{$submit_name}" value="{$submit_mainform}" class="sub_002">
    
      </td>
    
     </tr>
     
     </fieldset>
    
     </form>
    
  </table>

  </td>

 </tr>

</table>

<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">
  
  <div class="navimenu">

  <h2 class="navimenu-title">{$editgal_act}</h2>

  <table cellspacing="0" cellpadding="3" width="100%" class="table_013">

   <tr>

    <td class="gal_options">
    
    <p>&nbsp;</p>

    <b>{$gallery_info1}</b>
    
    <p></p>
    
    <ul>

    <li>{$gallery_info2}</li>
    <li>{$gallery_info3}</li>

    {if !$folder_error}

    <li><b>{$gallery_info4}</b></li>

    {/if}

    </ul>

    </td>

   </tr>

  </table>

  </div>

  {if $folder_error}

    {include file="gallery/folder_error.tpl"}

  {/if}
   
{if !$folder_error}

  <table cellpadding="3" width="100%" class="form_submit">

  <form method="post" name="form2" onsubmit="return loading();"> 

   <tr>
  
    <td align="center">

    <input type="submit" id="submitM" name="submit2" class="sub_002" value="{$submit_mainform3}">

    </td>

   </tr>
    
  </table>

  <input type="hidden" name="gid" value="{$gallery.thisid}">

  </form>

{/if}

  </td>

 </tr>

</table> 

{/foreach}

</div>