<table cellspacing="0" cellpadding="0" width="100%">

<tr>
          
<td valign="top" width="50%">

    <a name="cc{$blog.thisid}"></a>
                   
    <table cellspacing="0" cellpadding="0">
  
     <tr>
  
      <td>
  
      {if $blog.comments_total > 0}<a href="javascript:ToggleCommentsS({$blog.thisid})">{/if}
  
      <img title="{if $blog.comments_total > 0}{$blog.toggleS_title}{/if}" id="TImgCommentS_{$blog.thisid}" src="{$dir_img}{$blog.toggleS_img}.gif" border="0">
      
      {if $blog.comments_total > 0}</a>{/if}
   
      </td>
  
      <td class="toggle">
  
      {if $blog.comments_total > 0}<a href="javascript:ToggleCommentsS({$blog.thisid})">{/if}
  
      <b>{$commentsS_title} (<p id="p_num_{$blog.thisid}" class="inline">{$blog.comments_total}</p>)</b>
  
      {if $blog.comments_total > 0}</a>{/if}
  
      </td>
  
     </tr>
  
    </table>
          
</td> 
          
<td align="right" valign="top" width="50%">
                  
    <table cellspacing="0" cellpadding="0">
  
     <tr>
  
      <td>{$toogle_collapseD}
  
      <a href="javascript:ToggleCommentsW({$blog.thisid})">
  
      <img title="{if $error_id == $blog.thisid}{$toogle_collapseD}{else}{$toggle_expandD}{/if}" id="TImgCommentW_{$blog.thisid}" src="{$dir_img}{if $error_id == $blog.thisid}collapse{else}expand{/if}.gif" border="0"></a>
   
      </td>
  
      <td class="toggle">
  
      <a href="javascript:ToggleCommentsW({$blog.thisid})">
  
      <b>{$commentsW_title}</b>
  
      </a>
  
      </td>
  
     </tr>
  
    </table>
            
</td>

</tr>
            
</table>
         
    <div id="commentW_{$blog.thisid}" {if $error_id != $blog.thisid}style="display:none"{/if}>
  
        <table cellspacing="0" cellpadding="6" width="100%">
      
         <tr>
    
          <td align="left">

          {if $blog.spamban == '0'}
      
          {include file="formular/form_comment.tpl"}
          
          {else}
            <p>&nbsp;</p>
            <b>{$spam_01}</b>
            <p>&nbsp;</p>
            {$spam_02}
          {/if}
      
          </td>
      
         </tr>
      
        </table>
  
    </div>
    
    <div id="commentS_{$blog.thisid}" style="display:{$blog.toggleS_style}">
    
        <a name="c{$blog.thisid}"></a>
        
        {if $blog.comments_total > $com_perpage}
        
            <p id="p_page_{$blog.thisid}">
            
                {foreach name=array_pages_c item=inner_pages from=$array_pages_c}
                
                    {foreach key=pagekey item=valuep from=$inner_pages}
                    
                        {if $stopthis == 1}
                            {assign var="pages_c" value=$valuep}
                            
                            <p id="p_cpages_{$blog.thisid}" class="p_002">
            
                            <nobr>
                            {include file="pagenavi_ajax.tpl"}
                            </nobr>
            
                            </p>
                            
                            {assign var="stopthis" value="0"}  
                            {break}
                        {/if}
                             
                        {if $pagekey == 'bid' AND $valuep == $blog.thisid}
                            {assign var="stopthis" value="1"}
                        {/if}
                        
                    {/foreach}
                      
                {/foreach}
                
            </p>

        {else}<p>&nbsp;</p>{/if}
        
        <table cellspacing="0" cellpadding="0" width="100%" align="center">
      
         <tr>
      
          <td align="center">
    
           <p id="p_comments_{$blog.thisid}" class="p_002">
              <nobr>
              {include file="blog/comments_show.tpl"}
              </nobr>
           </p>

          </td>
      
         </tr>
      
        </table>

        {if $blog.comments_total > $com_perpage}
        
            <p id="p_page2_{$blog.thisid}">
        
            {foreach name=array_pages_c item=inner_pages from=$array_pages_c}
                
                    {foreach key=pagekey item=valuep from=$inner_pages}
                    
                        {if $stopthis == 1}
                            {assign var="pages_c" value=$valuep}
                            
                            <p id="p_cpages2_{$blog.thisid}" class="p_002">
            
                            <nobr>
                            {include file="pagenavi_ajax.tpl"}
                            </nobr>
            
                            </p>
                            
                            {assign var="stopthis" value="0"}  
                            {break}
                        {/if}
                             
                        {if $pagekey == 'bid' AND $valuep == $blog.thisid}
                            {assign var="stopthis" value="1"}
                        {/if}
                        
                    {/foreach}
                      
            {/foreach}
            
            </p>

        {/if}
                
    </div>