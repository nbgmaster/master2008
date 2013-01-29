
     <tr>

      <td align="center">

      <div class="navimenu">

      <table cellspacing="0" cellpadding="0" width="100%" class="table_006">

      <tr><td>

      <span class="bold">{$attach_file}</span>

      </td></tr>
      </table>

      <table cellspacing="0" cellpadding="0" width="100%">

       <tr>

        <td>

        <ul>

        {if !$mainform.file1}

        <li><label for="file1" class="form_titles">{$attach_name} 1:</label> <input name="file1" type="file" size="50" class="inp_001"></li>

        {/if}

        {if $mainform.file1}

        <li><table cellspacing="0" cellpadding="2">

         <tr>

          <td>

          <input type="checkbox" name="del_attach1" value="1">

          </td>

          <td>

          <label for="del_attach1" class="form_titles">{$attach_del}: </label> {$mainform.filename1}

          </td>

         </tr>

         <input type="hidden" name="attach1" value="{$mainform.file1}">
         <input type="hidden" name="attachname1" value="{$mainform.filename1}">

        </table></li>

        {/if}

        {if !$mainform.file2}

        <li><label for="file2" class="form_titles">{$attach_name} 2:</label> <input name="file2" type="file" size="50" class="inp_001"></li>

        {/if}

        {if $mainform.file2}

        <li><table cellspacing="0" cellpadding="2">

         <tr>

          <td>

          <input type="checkbox" name="del_attach2" value="1">

          </td>

          <td>

          <label for="del_attach2" class="form_titles">{$attach_del}: </label> {$mainform.filename2}

          </td>

         </tr>

         <input type="hidden" name="attach2" value="{$mainform.file2}">
         <input type="hidden" name="attachname2" value="{$mainform.filename2}">

        </table></li>

        {/if}

        {if !$mainform.file3}

        <li><label for="file3" class="form_titles">{$attach_name} 3:</label> <input name="file3" type="file" size="50" class="inp_001"></li>

        {/if}

        {if $mainform.file3}

        <li><table cellspacing="0" cellpadding="2">

         <tr>

          <td>

          <input type="checkbox" name="del_attach3" value="1">

          </td>

          <td>

          <label for="del_attach3" class="form_titles">{$attach_del}: </label> {$mainform.filename3}

          </td>

         </tr>

         <input type="hidden" name="attach3" value="{$mainform.file3}">
         <input type="hidden" name="attachname3" value="{$mainform.filename3}">

        </table></li>

        {/if}

        <li><table cellpadding="1" cellspacing="0">

         <tr>

          <td><span class="form_titles">{$attach_format}:&nbsp;&nbsp;</span> </td><td>

          <img src="{$dir_img_file}{$img_jpg}" title="{$title_jpg}">
          &nbsp;
          <img src="{$dir_img_file}{$img_gif}" title="{$title_gif}">
          &nbsp;
          <img src="{$dir_img_file}{$img_doc}" title="{$title_doc}">
          &nbsp;
          <img src="{$dir_img_file}{$img_xls}" title="{$title_xls}">
          &nbsp;
          <img src="{$dir_img_file}{$img_ppt}" title="{$title_ppt}">
          &nbsp;
          <img src="{$dir_img_file}{$img_zip}" title="{$title_zip}">
          &nbsp;
          <img src="{$dir_img_file}{$img_rar}" title="{$title_rar}">
          &nbsp;
          <img src="{$dir_img_file}{$img_pdf}" title="{$title_pdf}">
          &nbsp;
          <img src="{$dir_img_file}{$img_txt}" title="{$title_txt}">

          </td>

         </tr>

        </table> </li>

        </ul>

        </td>

       </tr>

      </table>

      </td>

     </tr>
