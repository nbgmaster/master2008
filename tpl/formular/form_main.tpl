<script type="text/javascript" src="{$root_dir}js/bbcode.js"></script>
<script type="text/javascript" src="{$root_dir}js/bbcode2.js"></script>
<script type="text/javascript" src="{$root_dir}js/form_main.js"></script>

{foreach from=$array key=id item=mainform name=mainform}

<table cellspacing="0" cellpadding="0" width="100%" class="table_015">

<form method="post" name="form" enctype="multipart/form-data" onsubmit="return checkForm(this)">

<fieldset id="create_entry">

 <tr>

  <td>
   
  <table width="100%" cellpadding="0">
               
   <tr>

    <td align="center">  

      {if $form_title}

      <table cellspacing="0" cellpadding="0" width="100%" class="table_014">

       <tr>

        <td>
         <input type="hidden" maxlength="50" name="error_fix" id="error_fix"  value="">

         <label for="title" class="form_titles">&nbsp;{$f_title}:</label>

         <input type="text" maxlength="50" name="title" id="title" class="inp_002" value="{$mainform.title}" style="width:238px">

      {/if}

      {if $form_extension == 1}

          <label for="title_EN" class="form_titles">&nbsp;{$f_extension_title}:</label>
        
          <input type="text" maxlength="50" name="title_EN" id="title_EN" class="inp_002" value="{$mainform.title_EN}" style="width:238px">

      {/if}
      
      {if $form_title}
            
      </td>

      </tr>

      </table>

      <br>
      
      {/if}

      <table width="98%" cellspacing="0" cellpadding="0">

       <tr>
 
        <td align="left">

        {include file="formular/form_bbcode.tpl"}

        </td>

       </tr>
   
       <tr>
           
        <td align="center">
        
        <table cellspacing="0" cellpadding="0" width="100%" class="table_006">

         <tr><td>

          <span class="bold">{if $do == 'changecms' AND $lang == 'english'}{$f_extension_msg}{else}{$f_msg}{/if}</span>

         </td></tr>
      
        </table>

        </td>
        
       </tr>
     
       <tr>
       
        <td>
       
        <label for="message"></label>
        <textarea name="message" id="message" class="form_msg{if $cms_site}_cms{/if}">{$mainform.message}</textarea>

        </td>

       </tr>
       
       {if $form_extension == 1}
            
            <tr>
     
            <td align="left" class="td_013">
    
            {include file="formular/form_bbcode2.tpl"}
    
            </td>
    
           </tr>
     
           <tr>
               
            <td align="center">
            
            <table cellspacing="0" cellpadding="0" width="100%" class="table_006">
    
             <tr><td>
    
              <span class="bold">{$f_extension_msg}</span>
    
             </td></tr>
          
            </table>
     
            </td>
            
            </tr>

            <tr>
            
            <td>  
             
            <label for="message_EN"></label>    
            <textarea name="message_EN" id="message_EN" class="form_msg">{$mainform.message_EN}</textarea>
    
            </td>
    
           </tr>
       
       {/if}

       {if $form_attach}

           {include file="formular/form_attach.tpl"}

       {/if}

       {if $form_options}

          {include file="formular/form_options.tpl"}

       {/if}
       
      </table> 

      <input type="hidden" name="id" value="{$mainform.thisid}">
      <input type="hidden" name="time" value="{$mainform.date_formatted}">
      
      </td>

     </tr>

   </table>

  </td>

 </tr>

</table>

{include file="formular/form_submit.tpl"}

{/foreach}
