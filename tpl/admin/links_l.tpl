<table class="table_011">

 <tbody id="addFields_links_l_{$this}">

 <tr>
 <td>&nbsp;</td>
 <td><b>{$links_col_01}</b></td>
 <td><b>{$links_col_02}</b></td>
 <td><b>{$links_col_03}</b></td>
 <td><b>{$set_profile_col_07}</b></td>
 <td><b>{$set_profile_col_04}</b></td>
 </tr>

{foreach from=$array.$this key=lid item=links_l name=links_l}

      <tr>
        <td>
        <img src="{$dir_img}sortDESCS.jpg" onclick="xajax_move('down', '{$tbl_links}', '{$links_l.position}', '{$links_l.cid}')" class="img_001">
        <img src="{$dir_img}sortASCS.jpg"  onclick="xajax_move('up', '{$tbl_links}', '{$links_l.position}', '{$links_l.cid}')" class="img_001">
        </td>
        <td>
        <input type="text" name="links_l_link[]" value="{$links_l.link}" class="inp_design">
        </td>
        <td>
        <input type="text" name="links_l_description[]" value="{$links_l.description}" class="inp_links_l">
        </td>
        <td>
        <input type="text" name="links_l_description_EN[]" value="{$links_l.description_EN}" class="inp_links_l">
        </td>
        <td>
        <input type="checkbox" name="links_l_visibility[{$links_l.id}]" value="{$links_l.id}" class="check_001" {if $links_l.visibility == '1'}checked{/if}>
        </td>
        <td>
        <input type="checkbox" name="links_l_del[]" value="{$links_l.id}" class="check_001">
        </td>
      </tr>

      <input type="hidden" name="links_l_id[]" value="{$links_l.id}">
      <input type="hidden" name="links_l_cid[]" value="{$this}">

{/foreach}


  <tr>

        <td>&nbsp;</td>
        <td class="td_007">
        <input type="text" name="links_l_new_link[]" class="inp_design">
        </td>
        <td class="td_007">
        <input type="text" name="links_l_new_description[]" value="{$set_profile_col_05}" class="inp_links_l">
        </td>
        <td class="td_007">
        <input type="text" name="links_l_new_description_EN[]" value="{$set_profile_col_06}" class="inp_links_l">
        </td>
        <input type="hidden" name="links_l_new_cid[]" value="{$this}">
        <td class="td_007">
        <input type="button" onclick="addFields_links_l('{$this}')" value="{$set_more}" size="4" class="sub_001">
        </td>

</tr>

</tbody>

</table>