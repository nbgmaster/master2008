<table class="table_011">

 <tbody id="addFields_references">

 <tr>
 <td>&nbsp;</td>
 <td><b>{$set_references_col_01}</b></td>
 <td><b>{$set_references_col_02}</b></td>
 <td><b>{$set_references_col_04}</b></td>
 <td><b>{$set_profile_col_04}</b></td>
 </tr>

 {foreach from=$array_ref key=nid item=ref name=ref}

     <tr>
        <td>
        <img src="{$dir_img}sortDESCS.jpg" onclick="xajax_move('down', '{$tbl_ref}', '{$ref.position}', '')" class="img_001">
        <img src="{$dir_img}sortASCS.jpg"  onclick="xajax_move('up', '{$tbl_ref}', '{$ref.position}', '')" class="img_001">
        </td>
        <td>
        <input type="text" name="ref_link[]" value="{$ref.link}" class="inp_quicklinks">
        </td>
        <td>
        <input type="text" name="ref_description[]" value="{$ref.description}" class="inp_quicklinks">
        </td>
        <td>
        <input type="text" name="ref_description_EN[]" value="{$ref.description_EN}" class="inp_quicklinks">
        </td>
        <td>
        <input type="checkbox" name="ref_del[]" value="{$ref.id}" class="check_001">
        </td>
      </tr>

      <input type="hidden" name="ref_id[]" value="{$ref.id}">

  {/foreach}

  <tr>

        <td>&nbsp;</td>
        <td class="td_007">
        <input type="text" name="ref_new_link[]" value="" class="inp_quicklinks">
        </td>
        <td class="td_007">
        <input type="text" name="ref_new_description[]" value="{$set_references_col_03}" class="inp_quicklinks">
        </td>
        <td class="td_007">
        <input type="text" name="ref_new_description_EN[]" value="{$set_references_col_03}" class="inp_quicklinks">
        </td>
        <td class="td_007">
        <input type="button" onclick="addFields_references()" value="{$set_more}" size="4" class="sub_001">
        </td>

</tr>

</tbody>

</table>

