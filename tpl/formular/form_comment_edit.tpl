<form method="post" name="formE_{$valuec.id}" id="formE_{$valuec.id}" onsubmit="return false" style="display:inline">

<table width="100%" cellpadding="2" cellspacing="0">

<fieldset id="create_comment">

 <tr>
 
  <td valign="top" width="16%" align="left"><label for="name_{$valuec.id}" class="form_titles">{$f_name}:</label></td>
        
  <td><input type="text" maxlength="50" size="30" name="name_{$valuec.id}" value="{$valuec.name}" id="name_{$valuec.id}" class="inp_003"></td>
  
 </tr>

 <tr>
 
  <td valign="top"><label for="comment_{$valuec.id}" class="form_titles">{$f_msg_c}:</label></td>
        
  <td><textarea name="comment_{$valuec.id}" id="comment_{$valuec.id}" class="form_com_edit">{$valuec.comment_unformatted}</textarea></td>
  
 </tr>
  
 <tr>

  <td>&nbsp;</td> 
  <td>
  <input type="submit" onclick="xajax_edit_comment(xajax.getFormValues('formE_{$valuec.id}'), {$valuec.id}, {$blog_id}, {$page_id}, {$com_total})" value="{$submit_comform_edit}" class="sub_002">
  </td>

 </tr>
 
</fieldset>

</table>
 
 </form>
