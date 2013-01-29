{foreach name=array_com item=inner_com from=$array_com}

   {foreach key=comkey item=valuec from=$inner_com name=valuec}

        {if $valuec.bid == $blog.thisid OR $valuec.bid == $xajax_bid}

          <table width="100%" cellpadding="1" class="table_010" {if $browser != 'IE' AND !$smarty.foreach.valuec.last OR $browser == 'IE'}style="margin-bottom:12px"{/if}>
           <tr>
            <td class="img_com"><img src="{$dir_img}comment.gif"></td>
            <td class="blog_title_c">
            <b>{$valuec.name} {$com_name}:</b>
            </td>
            <td align="right" class="blog_date_c">{$valuec.time}</td>
          </tr><tr>
            <td valign="top" align="center" style="padding-top:14px;padding-bottom:4px;">{*<img src="{$dir_img}flag_{if $valuec.lang == 'DE'}german{else}english{/if}.jpg" class="img_flag2">*}</td>
            <td colspan="2" class="blog_content" valign="top">
            {if $Myadmin == 1}
                <table width="100%" cellspacing="0" cellpadding="0"><tr>
                <td class="blog_content" valign="top">{$valuec.comment}</td>
                <td align="right" width="24" valign="bottom">
                
                {if $blog}
                   {assign var="blog_id" value=$blog.thisid}
                   {assign var="com_total" value=$blog.comments_total}
                   {assign var="page_id" value='1'}
                {/if}
                      
                <a onclick="edit_comment('commentE_{$valuec.id}')" class="pagenavi" title="{$title_edit_com}" style="cursor:pointer">
                <img src="{$dir_img}edit.jpg">
                </a>
                <p>&nbsp;</p>
                <a onclick="if(confirm('{$confirm_delete}')) xajax_delete('blog_comments', '{$blog_id}', '{$valuec.id}', '{$page_id}', '{$com_total}')" class="pagenavi" title="{$title_del_com}" style="cursor:pointer">
                <img src="{$dir_img}delete.gif">
                </a>
                </td></tr></table>
            {else}
                {$valuec.comment}
            {/if}
                                 
            {if $Myadmin == 1}
 
                <div id="commentE_{$valuec.id}" style="display:none;">
   
                    <table cellspacing="0" cellpadding="0" width="100%">
                  
                     <tr>
                
                      <td align="left">

                      {include file="formular/form_comment_edit.tpl"}
                  
                      </td>
                  
                     </tr>
                  
                    </table>
                    
                </div>
            
            {/if}
            
            </td>
          </tr>
        </table>

        {/if}
        
    {/foreach}

{/foreach}