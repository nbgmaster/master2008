
     <tr>

      <td align="center">

      <div class="navimenu">

      <table cellspacing="0" cellpadding="0" width="100%" class="table_006">

      <tr><td>

      <span class="bold">{$f_options_title}</span>

      </td></tr>
      </table>

      <table cellspacing="0" cellpadding="0" width="100%">

       <tr>

        <td>
        
        <ul>

        <li><b>{$f_options_o1}</b>
        {if $mainform.visibility == ''}
           {assign var="visibility" value=1}
        {/if}
        <input type="radio" value="1" name="visibility" {if $mainform.visibility == 1 || $visibility == 1}checked="checked"{/if}>{$f_options_o1_yes} <input type="radio" value="0" name="visibility"{if $mainform.visibility == 0 AND !$visibility}checked="checked"{/if}>{$f_options_o1_no}
        </li>
        
        </ul>
        
        </td>

       </tr>
       
       <tr>

       <tr>

        <td>
        
        <ul>

        <li><b>{$f_options_o3}</b>

        <select name="d_day">{html_options values=$d_days output=$d_days selected=$c_day}</select>
        <select name="d_month">{html_options values=$d_months output=$d_months selected=$c_month}</select>
        <select name="d_year">{html_options values=$d_years output=$d_years selected=$c_year}</select>
        <select name="d_hour">{html_options values=$d_hours output=$d_hours selected=$c_hour}</select>
        <select name="d_minute">{html_options values=$d_minutes output=$d_minutes selected=$c_minute}</select>
                        
        </li>
        
        </ul>
        
        </td>

       </tr>
       
       <tr>
       
        <td>
        
        <ul>

        <li><b>{$f_options_o2}</b>
        {if $mainform.comments == ''}
           {assign var="default_on" value=1}
        {/if}
        <input type="radio" value="1" name="comments_on" {if $mainform.comments == 1 || $default_on == 1}checked="checked"{/if}>{$f_options_o2_yes} <input type="radio" value="0" name="comments_on"{if $mainform.comments == 0 AND !$default_on}checked="checked"{/if}>{$f_options_o2_no}
        </li>
        
        </ul>
        
        </td>

       </tr>
       
      </table>

      </td>

     </tr>
