 <table width="100%">
 <tr><td align="left">

 <div class="navimenu">

 <h2 class="navimenu-title">{$left_settings}</h2>

 <ul>
 <li>

 <table>
 <tr><td class="td_005">
 {$left_design}:
 </td><td>
<table cellspacing="0" cellpading="0"><tr><td>
 <p id="layout_navi_design" class="p_001">

 {include file="set_design.tpl"}

 </p>
</td></tr></table>
</td></tr></table>

</li><li>

 <table>
 <tr><td class="td_005">
 {$left_lang}:
 </td><td>

<table cellspacing="0" cellpading="0"><tr><td>
<select onChange="change_lang(this.selectedIndex)" id="change_lang" class="sel_001">

<option{if $lang == 'german'} selected="selected"{/if}>{$lang_name_1}</option>
<option{if $lang == 'english'} selected="selected"{/if}>{$lang_name_2}</option>

</select>
</div>
</td><td class="lang_flags">
<img src="{$dir_img}flag_german.jpg" onclick="change_lang(0)" class="img_flag" title="{$title_flag1}">&nbsp;
<img src="{$dir_img}flag_english.jpg" onclick="change_lang(1)" class="img_flag" title="{$title_flag2}">
</td></tr></table>
</span>
</div>
</td></tr>
</table>

</li>
</ul>

</div>

<script type="text/javascript" src="{$dir_js}change_settings.js"></script>

</td></tr>
</table>
