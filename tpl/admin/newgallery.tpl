<script type="text/javascript" src="{$root_dir}js/loading.js"></script>
<script type="text/javascript" src="{$root_dir}js/gallery_new.js"></script>

{include file="gallery/loading.tpl"}

<div id="install">

<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">

    <div class="navimenu">
  
      <h2 class="navimenu-title">{$newgal_require}</h2>
      
      <table width="100%" class="table_013"><tr><td>
      
      <ul>
    
      <li>{$newgal_require1}</li>
      <li>{$newgal_require2}</li>
    
      </ul>
      
     </td></tr></table>
   
   </div>
   
   </td>
  
  </tr>
  
</table>

<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">
  
  <div class="navimenu">

  <h2 class="navimenu-title">{$newgal_guide}</h2>
  
  <table width="100%" class="table_013"><tr><td>

  <ul>

  <li>{$newgal_step1}</li>
  <li>{$newgal_mind1}</li>
  <li>{$newgal_step2}</li>
  <li>{$newgal_mind2}</li>
  <li>{$newgal_mind3}</li>
  <li>{$newgal_step3}</li>
  <li>{$newgal_mind4}</li>

  </ul>
  
  </td></tr></table>

  </div>

  </td>

 </tr>
 
</table>

<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">
   
  <div class="navimenu">
   
  <h2 class="navimenu-title">{$newgal_data}</h2>
  
  <table width="100%" class="table_013"><tr><td>

  <table width="100%">

  <form method="post" name="form" onsubmit="return checkForm(this);loading();">

   <tr>

    <td width="120">

    <b>{$f_title}:</b>

    </td>

    <td>

    <input type="text" name="title" maxlength="50" class="inp_002" style="width:173px">

    </td>

    <td width="120">

    <b>{$f_extension_title}:</b>

    </td>

    <td>

    <input type="text" name="title_EN" maxlength="50" class="inp_002" style="width:173px">

    </td>

   </tr>

   <tr>

    <td valign="top">

    <b>{$newgal_desc}:</b>

    </td>

    <td>
    
      <textarea name="description" class="form_desc"></textarea>

    </td>

    <td valign="top">

    <b>{$newgal_desc_EN}:</b>

    </td>

    <td>

      <textarea name="description_EN" class="form_desc"></textarea>

    </td>

   </tr>
         
   <tr>

    <td valign="top">

    <b>{$input_folder}:</b>

    </td>

    <td>

    <select name="folder">

    {html_options values=$subfolders output=$subfolders selected="1"}

    </select>

    </td>
            
    <td>
    <b>{$f_options_o1_gal}</b></td><td>
 
    <input type="radio" value="1" name="visibility" checked="checked">{$f_options_o1_yes} <input type="radio" value="0" name="visibility">{$f_options_o1_no}
       
    </td>

   </tr>
   
   <tr>

    <td valign="top">

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
   
   <tr>
   
   <td>&nbsp;</td>
   <td colspan="3">

    <p>&nbsp;</p>
    
    <div class="navimenu">

    <b>{$newgal_reason}</b>

    <ul>

    <li>{$newgal_reason1}</li>
    <li>{$newgal_reason2}</li>
    <li>{$newgal_reason3}</li>
    <li>{$newgal_reason4}</li>

    </ul>

    </div>
    
    </td>
    
    </tr>

  </table>
  
  <table cellpadding="3" class="form_submit" align="center">
    
     <tr>
    
      <td>
    
      <input type="submit" id="submitM" name="{$submit_name}" value="{$submit_mainform}" class="sub_002">
    
      </td>
    
     </tr>
     
     </fieldset>
    
     </form>
    
  </table>
  
  </td></tr></table>

  </div>

  </td>

 </tr>
 
</table>

</div>