
 <table width="100%">

 <form method="post">
 
<fieldset id="logon">

 <tr><td>

 <div class="navimenu" width="100%">

 <h2 class="navimenu-title">{$title_admin}</h2>

 <ul>

    {if $failure}

     <li><span class="logon_failure">{$logon_failed}</span></li>

   {/if}

 <li>

 <table>
 <tr><td class="td_004">
 <label for="username">{$left_user}:</label>
 </td><td>

 <input type="text" size="13" class="inp_001" name="username">

 </td></tr>
 </table>

 </li><li>

 <table>
 <tr><td class="td_004">
 <label for="password">{$left_pw}:</label>
 </td><td>

 <input type="password" size="13" class="inp_001" name="password">

 </td><td>
 <input type="submit" value="{$left_login}" size="4" class="sub_001" name="login">

 </td></tr>
 </table>

 </li>
 </ul>

 </div>

 </td></tr>
 
 </fieldset>
  
 </form>
 
 </table>
