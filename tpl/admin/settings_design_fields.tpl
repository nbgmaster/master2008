<table class="table_011">

 <tbody id="addFields_design">

 <tr>
 <td>&nbsp;</td>
 <td><b>{$set_profile_col_01}</b></td>
 <td><b>{$set_profile_col_02}</b></td>
 <td><b>{$set_design_col_01}</b></td>
 <td><b>{$set_design_col_02}</b></td>
 <td><b>{$set_profile_col_04}</b></td>
 </tr>

 {foreach from=$array_design key=nid item=design name=design}

     <tr>
        <td>
        <img src="{$dir_img}sortDESCS.jpg" onclick="xajax_move('down', '{$tbl_design}', '{$design.position}', '')" class="img_001">
        <img src="{$dir_img}sortASCS.jpg"  onclick="xajax_move('up', '{$tbl_design}', '{$design.position}', '')" class="img_001">
        </td>
        <td>
        <input type="text" name="design_german[]" value="{$design.german}" class="inp_design">
        </td>
        <td>
        <input type="text" name="design_english[]" value="{$design.english}" class="inp_design">
        </td>
        <td>
        <input type="text" name="design_hexcode[]" value="{$design.hexcode}" class="inp_design">
        </td>
        <td>
        <input type="text" name="design_imgfolder[]" value="{$design.imgfolder}" class="inp_design">
        </td>
        <td>
        <input type="checkbox" name="design_del[]" value="{$design.id}" class="check_001">
        </td>
      </tr>

      <input type="hidden" name="design_id[]" value="{$design.id}">

  {/foreach}

  <tr>

        <td>&nbsp;</td>
        <td class="td_007">
        <input type="text" name="design_new_german[]" value="{$set_design_col_03}" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="design_new_english[]" value="{$set_design_col_04}" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="design_new_hexcode[]" value="" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="design_new_imgfolder[]" value="" class="inp_design">
        </td>
        <td class="td_007">
        <input type="button" onclick="addFields_design()" value="{$set_more}" size="4" class="sub_001">
        </td>

</tr>

</tbody>

</table>
