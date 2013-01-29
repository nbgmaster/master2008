
<select onChange="change_tpl(this.value)" id="change_tpl" class="sel_001">

{foreach from=$array_design item=design name=design}

<option value="{$design.imgfolder}" id="{$design.imgfolder}">{$design.$lang}</option>

{/foreach}

</select>
