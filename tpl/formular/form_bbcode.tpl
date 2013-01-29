
      <table cellspacing="0" cellpadding="0">
 
       <tr>

        <td>

        &nbsp;<img src="{$dir_img_bbcode}{$img_bold}" title="{$title_bold}" onClick="insert('[B]', '[/B]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_italic}" title="{$title_italic}" onClick="insert('[I]', '[/I]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_underline}" title="{$title_underline}" onClick="insert('[U]', '[/U]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_center}" title="{$title_center}" onClick="insert('[CENTER]', '[/CENTER]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_block}" title="{$title_block}" onClick="insert('[BLOCK]', '[/BLOCK]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_url}" title="{$title_url}" onclick="namedlink(document.form,'URL')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_image}" title="{$title_image}" onclick="bbcode(document.form,'IMG','http://')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_quote}" title="{$title_quote}" onClick="quotethis(document.form,'QUOTE')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_list}" title="{$title_list}" onClick="insert('[LIST]', '[/LIST]', '', '', '')" class="bbcode">
        &nbsp;<img src="{$dir_img_bbcode}{$img_expand_bbcode}" title="{$title_expand_bbcode}" onClick="window.open('{$root_dir}html/bbcode_extensions.html','BBCode Extensions','width=500, height=250')" class="bbcode">

        </td>

        <td>

        &nbsp;&nbsp;&nbsp;&nbsp;
            
        <select onchange="insert('[SIZE', '[/SIZE]', this.options[this.selectedIndex].value, '', '')" class="sel_002">

        <option value="0">{$bbcode_size}</option>

        <option value="1">{$bbcode_size_small}</option>
        <option value="2">{$bbcode_size_middle}</option>
        <option value="3">{$bbcode_size_big}</option>
        <option value="4">{$bbcode_size_huge}</option>

        </select>
 
        &nbsp;&nbsp;&nbsp;

        <select onchange="insert('[COLOR', '[/COLOR]', this.options[this.selectedIndex].value, '', '')" class="sel_002">

        <option value="0">{$bbcode_color}</option>

        <option value="skyblue" style="color:skyblue">sky blue</option>
        <option value="royalblue" style="color:royalblue">royal blue</option>
        <option value="blue" style="color:blue">blue</option>
        <option value="darkblue" style="color:darkblue">dark-blue</option>
        <option value="orange" style="color:orange">orange</option>
        <option value="orangered" style="color:orangered">orange-red</option>
        <option value="crimson" style="color:crimson">crimson</option>
        <option value="red" style="color:red">red</option>
        <option value="firebrick" style="color:firebrick">firebrick</option>
        <option value="darkred" style="color:darkred">dark red</option>
        <option value="green" style="color:green">green</option>
        <option value="limegreen" style="color:limegreen">limegreen</option>
        <option value="seagreen" style="color:seagreen">sea-green</option>
        <option value="deeppink" style="color:deeppink">deeppink</option>
        <option value="tomato" style="color:tomato">tomato</option>
        <option value="coral" style="color:coral">coral</option>
        <option value="purple" style="color:purple">purple</option>
        <option value="indigo" style="color:indigo">indigo</option>
        <option value="burlywood" style="color:burlywood">burlywood</option>
        <option value="sandybrown" style="color:sandybrown">sandy brown</option>
        <option value="sienna" style="color:sienna">sienna</option>
        <option value="chocolate" style="color:chocolate">chocolate</option>
        <option value="teal" style="color:teal">teal</option>
        <option value="silver" style="color:silver">silver</option></select>

        </select>
            
        &nbsp;
            
        </td>

       </tr>

      </table>