
   <table cellspacing="0" cellpadding="0">

    <tr>

     <td>

     <a href="javascript:ToggleAdmin({$blog.thisid})">
 
     <img title="{$toogle_expand}" id="TImgAdmin_{$blog.thisid}" src="{$dir_img}/expand.gif" border="0"></a>

     </td>

     <td class="toogle">

     <a href="javascript:ToggleAdmin({$blog.thisid})">

     <b>{$toogle_admin}</b>

     </a>

     </td>

    </tr>

   </table>

   <div id="admin_{$blog.thisid}" style="display:none">

   <table cellspacing="0" cellpadding="6">

    <tr>

     <td width="6">&nbsp;</td>

     <td>
  
     <input type="button" value="{$blog_edit}" class="sub_001" onclick="location.href='{$href_editblog}{$blog.thisid}'" id="submit">

     {if $Myadmin == 1}

     <input type="submit" value="{$blog_del}" class="sub_001" name="submit" id="submit">

     {/if}

     <input type="hidden" name="nid" value="{$blog.thisid}">

     </td>

    </tr>

    </form>

   </table>

  </div>

