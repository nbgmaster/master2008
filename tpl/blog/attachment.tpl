
  <table cellspacing="0" cellpadding="0">

   <tr>

    <td>

    <a href="javascript:ToggleAttachments({$blog.thisid})">

    <img title="{$blog.toggleA_title}" id="TImgAttach_{$blog.thisid}" src="{$dir_img}/{$blog.toggleA_img}.gif" border="0"></a>
 
    </td>

    <td class="toggle">

    <a href="javascript:ToggleAttachments({$blog.thisid})">

    <b>{$attach_data} ({$blog.filenumbers})</b>

    </a>

    </td>

   </tr>

  </table>

  <div id="attach_{$blog.thisid}" style="display:{$blog.toggleA_style}">

  <table cellspacing="0" cellpadding="6">

   <tr>

    <td width="6">&nbsp;</td>

    <td>

    {if $blog.filename1}

    <img src="{$dir_img_file}{$blog.fileicon1}.gif">
    <a href="{$root_dir}blog/attachment/{$blog.file1}">{$blog.filename1}</a>
    &nbsp;

    {/if}

    {if $blog.filename2}

    <img src="{$dir_img_file}{$blog.fileicon2}.gif">
    <a href="{$root_dir}blog/attachment/{$blog.file2}">{$blog.filename2}</a>
    &nbsp;

    {/if}

    {if $blog.filename3}

    <img src="{$dir_img_file}{$blog.fileicon3}.gif">
    <a href="{$root_dir}blog/attachment/{$blog.file3}">{$blog.filename3}</a>
 
    {/if}

    </td>

   </tr>

  </table>

  </div>
