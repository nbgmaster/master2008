 <td valign="top" class="rightframe" align="center">

 {if $module != ''}{include file="breadcrumb.tpl"}{/if}

 {if $module == ''}

<table cellspacing="0" cellpadding="0" width="96%" class="table_003">

 <tr>
 
   <td class="blog_msg">
   
   <table cellspacing="0" cellpadding="8" width="98%" align="center">
      
     <tr>
    
      <td align="left">

      <table cellspacing="0" cellpadding="0" width="100%">

       <tr>
  
         <td class="td_009"></td>
 
         <td class="td_006" valign="top">
        
         <div class="title_home">{$main_title}</div>
        
         {$main_description}
       
         </td>
         
         <td width="56" align="right">
        
         <a href="{$root_dir}blog/feed/"><img src="{$dir_img}blog.jpg" border="0"></a>
        
         </td>
 
      </tr>
      
 </table>

 </td></tr>
 </table>
 
 </td></tr>
 </table>
 
 {if $rss_block_status == '0'}<p>&nbsp;</p>{/if}

 {/if} 