<script type="text/javascript" src="{$root_dir}js/change_link_category.js"></script>

{$tpl_main_start}

<table width="100%" class="table_007" cellspacing="0" cellpadding="1">

  <tr>
   
    <td align="left" class="td_014">
    
    <b>{$links_categories_title}</b>
    
    </td>
    
    <td align="right">

        <select class="sel_002" onChange="change_link_category(this.value)">

            <option value="0" {if $cid_active == 0}selected=selected{/if}>{$links_categories_option01}</option>
        
            {foreach from=$array_c_names key=cid item=cat name=cat}
        
            <option value="{$cat.id}" id="{$cat.id}" {if $cid_active == $cat.id}selected=selected{/if}>{if $lang == 'german'}{$cat.german}{else}{$cat.english}{/if}</option>
        
            {/foreach}
    
        </select>

        &nbsp;
        
     </td>
     
  </tr>
  
</table>

<center><hr class="hr_001" size="1"></center>

<table width="100%" cellspacing="0" cellpadding="6">

  <tr>

    {counter start=0 assign="count"} 
    {foreach from=$array_c key=cid item=links_c name=links_c}

    <td valign="top" align="center" class="td_007">

    <table>
     
      <tr>
      
        <td class="links_cat_title">&nbsp;{if $lang == 'german'}{$links_c.german}{else}{$links_c.english}{/if}</td>
        
      </tr>
      
      <tr>
      
        <td align="center">

        <div class="navimenu_l" width="100%" align="center">

            <p>&nbsp;</p>
    
            {assign var=this value=$links_c.id}
    
            {foreach from=$array.$this key=lid item=links name=links}
     <a href="{$links.link}" title="{$links.link}" target="_blank" class="linksection">
                <table width="600" cellpadding="3">
                
                  <tr>
                  
                   <td class="links_td">
                   
                   
                   <a href="{$links.link}" title="{$links.link}" target="_blank" class="linksection" style="display:block;">
                   {$img_raquo} 
                   {if $lang == 'german'}{$links.description}{else}{$links.description_EN}{/if}
                   </a>
  
                   </td>

                  </tr>
                  
                </table></a>
    
            {/foreach}

        </div>

        </td>
        
      </tr>
  
    </table>

    </td>

   </tr>
   
   <tr>

   {/foreach}

 {$tpl_main_end}
   
 <p class="p_006"></p>

{$tpl_main_end}
