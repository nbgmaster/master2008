{$blocks_end}
          
<script type="text/javascript" src="{$root_dir}js/addfields.js"></script>
{$xajax_javascript}

<form method='post' name='form_design'>

<a name="design"></a>
{$tpl_main_start}
{$tpl_head_start}{$set_head_003}{$tpl_head_end}

<p id="layout_set_design" class="p_002">
<nobr>
{include file="admin/settings_design_fields.tpl"}
</nobr>
</p>

{php} $this->assign("submit_name", "submit_design"); {/php}
{include file="./formular/form_submit_img.tpl"}

{$tpl_main_end}

<form method='post' name='form_profile'>

<a name="profile"></a>
{$tpl_main_start}
{$tpl_head_start}{$set_head_001}{$tpl_head_end}

<p id="layout_set_profile" class="p_002">

<nobr>
{include file="admin/settings_profile_fields.tpl"}
</nobr>

</p>

{php} $this->assign("submit_name", "submit_profile"); {/php}
{include file="./formular/form_submit_img.tpl"}

{$tpl_main_end}

<form method='post' name='form_references'>

<a name="quicklinks"></a>

{$tpl_main_start}
{$tpl_head_start}{$set_head_002}{$tpl_head_end}

<p id="layout_set_ref" class="p_002">

<nobr>
{include file="admin/settings_quicklinks_fields.tpl"}
</nobr>

</p>

{php} $this->assign("submit_name", "submit_references"); {/php}
{include file="./formular/form_submit_img.tpl"}

{$tpl_main_end}

<form method='post' name='form_misc'>

<a name="misc"></a>

{$tpl_main_start}
{$tpl_head_start}{$set_head_004}{$tpl_head_end}

<table cellspacing="0" cellpadding="8" width="96%">

 <tr>

  <td><b>{$set_root}:</b></td>

  <td colspan="3"><input type="text" name="root_dir" value="{$root_dir}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_title_hp}:</b></td>

  <td colspan="3"><input type="text" name="title_hp" value="{$f_title_hp}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_title_hp_EN}:</b></td>

  <td colspan="3"><input type="text" name="title_hp_EN" value="{$f_title_hp_EN}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_main_title}:</b></td>

  <td colspan="3"><input type="text" name="main_title" value="{$f_main_title}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_main_title_EN}:</b></td>

  <td colspan="3"><input type="text" name="main_title_EN" value="{$f_main_title_EN}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td valign="top"><b>{$set_main_description}:</b></td>

  <td colspan="3"><textarea name="main_description" class="textarea_001">{$main_description2}</textarea></td>

</tr>

 <tr>

  <td valign="top"><b>{$set_main_description_EN}:</b></td>

  <td colspan="3"><textarea name="main_description_EN" class="textarea_001">{$main_description2_EN}</textarea></td>

</tr>

 <tr>

  <td valign="top"><b>{$set_keywords}:</b></td>

  <td colspan="3"><input type="text" name="keywords" value="{$keywords}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_mail}:</b></td>

  <td colspan="3"><input type="text" name="contact_mail" value="{$contact_mail}" class="inp_002" size="46"></td>

</tr>

<tr>

  <td width="40%"><b>{$set_pp_blog}:</b></td>

  <td width="10%"><input type="text" name="perpage_blog" value="{$perpage_blog}" class="inp_002" size="3"></td>

  <td width="40%"><b>{$set_pp_users}:</b></td>

  <td width="10%"><input type="text" name="perpage_users" value="{$perpage_users}" class="inp_002" size="3"></td>

 </tr>

<tr>

  <td width="40%"><b>{$set_pp_comments}:</b></td>

  <td width="10%"><input type="text" name="perpage_comments" value="{$perpage_comments}" class="inp_002" size="3"></td>

  <td width="40%"><b>{$set_time_ban}:</b></td>

  <td width="10%"><input type="text" name="time_ban" value="{$time_ban}" class="inp_002" size="3"></td>

 </tr>
 
 <tr>

  <td><b>{$set_pp_gallerys}:</b></td>

  <td><input type="text" name="perpage_gallery" value="{$perpage_gallery}" class="inp_002" size="3"></td>

  <td><b>{$set_pp_thumbs}:</b></td>

  <td><input type="text" name="perpage_thumbs" value="{$perpage_thumbs}" class="inp_002" size="3"></td>

 </tr>

 <tr>

  <td><b>{$set_img_w}:</b></td>

  <td><input type="text" name="width_images" value="{$width_images}" class="inp_002" size="3"></td>

  <td><b>{$set_thumbs_w}:</b></td>

  <td><input type="text" name="width_thumbs" value="{$width_thumbs}" class="inp_002" size="3"></td>

 </tr>

 <tr>

  <td><b>{$set_img_h}:</b></td>

  <td><input type="text" name="height_images_max" value="{$height_images_max}" class="inp_002" size="3"></td>

  <td><b>{$set_thumbs_h}:</b></td>

  <td><input type="text" name="height_thumbs_max" value="{$height_thumbs_max}" class="inp_002" size="3"></td>

 </tr>
 
  <tr>

  <td><b>{$set_visiters1}:</b></td>

  <td><input type="text" name="del_old_visiters" value="{$del_old_visiters}" class="inp_002" size="3"></td>

  <td><b>{$set_visiters2}:</b></td>

  <td><input type="text" name="time_new_visiter" value="{$time_new_visiter}" class="inp_002" size="3"></td>

 </tr>
  
 <tr>

  <td><b>{$set_rss1_title}:</b></td>

  <td colspan="3"><input type="text" name="rss_german_title" value="{$rss_german_title}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_rss1}:</b></td>

  <td colspan="3"><input type="text" name="rss_german_url" value="{$rss_german_url}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_rss2_title}:</b></td>

  <td colspan="3"><input type="text" name="rss_english_title" value="{$rss_english_title}" class="inp_002" size="46"></td>

</tr>

 <tr>

  <td><b>{$set_rss2}:</b></td>

  <td colspan="3"><input type="text" name="rss_english_url" value="{$rss_english_url}" class="inp_002" size="46"></td>

</tr>

  <tr>

  <td><b>{$set_rss3}:</b></td>

  <td><input type="text" name="rss_extern_totalentries" value="{$rss_extern_totalentries}" class="inp_002" size="3"></td>

  <td><b>{$set_rss4}:</b></td>

  <td><input type="text" name="rss_intern_totalentries" value="{$rss_intern_totalentries}" class="inp_002" size="3"></td>

 </tr>
  
  <tr>

  <td><b>{$set_rss5}:</b></td>

  <td><input type="text" name="rss_intern_left_totalentries" value="{$rss_intern_left_totalentries}" class="inp_002" size="3"></td>

  <td><b>{$set_rss6}:</b></td>

  <td><input type="text" name="rss_msg_length" value="{$rss_msg_length}" class="inp_002" size="3"></td>

 </tr>
  
  <tr>

  <td valign="top"><b>{$twitter_title_DE}:</b></td>

  <td colspan="3"><textarea name="twitter" class="textarea_001">{$twitter_msg}</textarea></td>

</tr>

  <tr>

  <td valign="top"><b>{$twitter_title_EN}:</b></td>

  <td colspan="3"><textarea name="twitter_EN" class="textarea_001">{$twitter_EN_msg}</textarea></td>

</tr>

</table>

{php} $this->assign("submit_name", "submit_misc"); {/php}
{include file="./formular/form_submit_img.tpl"}


{$tpl_main_end}
