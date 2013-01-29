<table class="table_011">

 <tbody id="addFields_links_c">

 <tr>
 <td>&nbsp;</td>
 <td><b>{$set_profile_col_01}</b></td>
 <td><b>{$set_profile_col_02}</b></td>
 <td><b>{$set_profile_col_07}</b></td>
 <td><b>{$set_profile_col_04}</b></td>
 </tr>

 {foreach from=$array_c key=cid item=links_c name=links_c}

     <tr>
        <td>
        <img src="{$dir_img}sortDESCS.jpg" onclick="xajax_move('down', '{$tbl_links_c}', '{$links_c.position}', '')" class="img_001">
        <img src="{$dir_img}sortASCS.jpg"  onclick="xajax_move('up', '{$tbl_links_c}', '{$links_c.position}', '')" class="img_001">
        </td>
        <td>
        <input type="text" name="links_c_german[]" value="{$links_c.german}" class="inp_links_c">
        </td>
        <td>
        <input type="text" name="links_c_english[]" value="{$links_c.english}" class="inp_links_c">
        </td>
        <td>
        <input type="checkbox" name="links_c_visibility[{$links_c.id}]" value="{$links_c.id}" class="check_001" {if $links_c.visibility == '1'}checked{/if}>
        </td>
        <td>

        <input type="checkbox" name="links_c_del[]" value="{$links_c.id}" class="check_001">
        </td>
      </tr>

      <input type="hidden" name="links_c_id[]" value="{$links_c.id}">

  {/foreach}

  <tr>

        <td>&nbsp;</td>
        <td class="td_007">
        <input type="text" name="links_c_new_german[]" value="{$set_profile_col_05}" class="inp_links_c">
        </td>
        <td class="td_007">
        <input type="text" name="links_c_new_english[]" class="inp_links_c">
        </td>
        <td class="td_007">
        <input type="button" onclick="addFields_links_c()" value="{$set_more}" size="4" class="sub_001">
        </td>

</tr>

</tbody>

</table>
