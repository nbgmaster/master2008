<table class="table_011">

 <tbody id="addFields_profile">

 <tr>
 <td>&nbsp;</td>
 <td><b>{$set_profile_col_01}</b></td>
 <td><b>{$set_profile_col_02}</b></td>
 <td><b>{$set_profile_col_03a}</b></td>
 <td><b>{$set_profile_col_03b}</b></td>
 <td><b>{$set_profile_col_04}</b></td>
 </tr>

 {foreach from=$array_profile key=nid item=profile name=profile}

     <tr>
        <td>
        <img src="{$dir_img}sortDESCS.jpg" onclick="xajax_move('down', '{$tbl_profile}', '{$profile.position}', '')" class="img_001">
        <img src="{$dir_img}sortASCS.jpg"  onclick="xajax_move('up', '{$tbl_profile}', '{$profile.position}', '')" class="img_001">
        </td>
        <td>
        <input type="text" name="profile_german[]" value="{$profile.german}" class="inp_design">
        </td>
        <td>
        <input type="text" name="profile_english[]" value="{$profile.english}" class="inp_design">
        </td>
        <td>
        <input type="text" name="profile_value[]" value="{$profile.value}" class="inp_design">
        </td>
        <td>
        <input type="text" name="profile_value_EN[]" value="{$profile.value_EN}" class="inp_design">
        </td> 
        <td>
        <input type="checkbox" name="profile_del[]" value="{$profile.id}" class="check_001">
        </td>
      </tr>

      <input type="hidden" name="profile_id[]" value="{$profile.id}">

  {/foreach}

  <tr>

        <td>&nbsp;</td>
        <td class="td_007">
        <input type="text" name="profile_new_german[]" value="{$set_profile_col_05}" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="profile_new_english[]" value="{$set_profile_col_06}" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="profile_new_value[]" value="" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="profile_new_value_EN[]" value="" class="inp_design">
        </td>
        <td class="td_007">
        <input type="button" onclick="addFields_profile()" value="{$set_more}" size="4" class="sub_001">
        </td>

</tr>

</tbody>

</table>
