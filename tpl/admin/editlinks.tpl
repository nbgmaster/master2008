<script type="text/javascript" src="{$root_dir}js/addfields.js"></script>

<form method='post' name='form_links_c'>

<a name="links_c"></a>

{$tpl_main_start}

{$tpl_head_start}{$set_head_005}{$tpl_head_end}

{$xajax_javascript}

<p id="layout_links_c" class="p_002">
<nobr>
{include file="admin/links_c.tpl"}
</nobr>
</p>

{php} $this->assign("submit_name", "submit_links_c"); {/php}
{include file="./formular/form_submit_img.tpl"}

{$tpl_main_end}


{foreach from=$array_c key=cid item=links_c name=links_c}

    {assign var=this value=$links_c.id}
    
    <form method='post' name='form_links_l_{$this}'>
    
    <a name="links_l_{$this}"></a>
    
    {$tpl_main_start}{$tpl_head_start}{$links_c.german}{$tpl_head_end}
    
    <p id="layout_links_l_{$this}">
      <nobr>
      {include file="admin/links_l.tpl"}
      </nobr>
    </p>
    
    {php}$this->assign("submit_name", "submit_links_l"); {/php}
    {include file="./formular/form_submit_img.tpl"}

{$tpl_main_end}
    
{/foreach}
