<script type="text/javascript" src="{$root_dir}js/lightbox.js" language="JavaScript1.2"></script>
<link href="{$root_dir}media/css/lightbox-old.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="{$root_dir}js/toggle.js" type="text/JavaScript"></script>
{$xajax_javascript}
{if $Myadmin == 1}<script type="text/javascript" src="{$root_dir}js/edit_comment.js"></script>{/if}
        
<p class="p_006"></p>

<table cellspacing="0" cellpadding="0" width="96%" class="table_003">

 <tr>
 
  {if $array_p}<td class="blog_msg">{else}<td class="msg">{/if}
  
  {if $array_p}{include file="pagenavi.tpl"}<center><hr class="hr_001" size="1"></center>{/if}
        
    {foreach from=$array item=blog name=blog}

    <a name="b{$blog.thisid}"></a>
    <table cellspacing="0" cellpadding="8" width="98%" align="center">
      
      <tr>
    
       <td align="left">

         <table cellspacing="0" cellpadding="0" width="100%">
         <tr><td>
             
         <span class="blog_title">{if $lang == 'german'}{$blog.title}{else}{$blog.title_EN}{/if}</span>

         {if $admin}
             
             &nbsp;
                 
             <a href="{$href_editblog}{$blog.thisid}" title="{$blog_edit}"><img src="{$dir_img}edit.jpg" border="0"></a>
    
                {if $Myadmin == 1}
                
                &nbsp;
            
                <form method="post" name="form_A" onsubmit="return confirm('{$confirm_delete}')" style="display:inline">
         
                <input type="image" value="del" title="{$blog_del}" src="{$dir_img}delete.gif" name="submit_del" id="submit">
    
                <input type="hidden" name="nid" value="{$blog.thisid}">
                
                <input type="hidden" name="totalrows22" value="{$totalrows}">
                    
                </form>
            
                {/if}
                
             {if $blog.visibility == 0 OR $blog.too_early}</td><td align="right"><img src="{$dir_img}invisible.gif" title="{$bid_invisible}">{/if}
     
         {/if}
         
         </td>
         </tr></table>
       
         <p>&nbsp;</p>
         <span class="blog_date">{$blog.date_formatted}</span>
    
         <p>&nbsp;</p>
        
         <span class="blog_content">{if $lang == 'german'}{eval var=$blog.message}{else}{eval var=$blog.message_EN}{/if}</span>
                           
         {if $blog.attachment}   

         <p>&nbsp;</p>
                       
           <table cellspacing="0" cellpadding="0" width="100%">
                      
           <tr>
    
             <td valign="top" {*if $admin}width="50%"{/if*}>{include file="blog/attachment.tpl"}</td> 
            
           </tr>
           
           </table>
         
         {/if}   

         {if $blog.comments == 1}
                 
         <p>&nbsp;</p>   
        
         {include file="blog/comments.tpl"}
    
         {/if}
             
       </td>
    
      </tr>
    
    </table>
    
    {if !$smarty.foreach.blog.last}<hr class="hr_001" size="1">{/if}
    
    {/foreach}
    
   </td>

  </tr>

</table>