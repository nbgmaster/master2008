<?php

       /* Create Object :: UPDATE */

          require_once('./lib/modify.php');

          $cms = new ModifyEntry();

       /******************************************/


       /* Update entry */
       
          $msg_cms = mysql_real_escape_string($_POST[message]);
          
          $cms->table     = $tbl_cms;
          $cms->changes   = " $cms_content = '$msg_cms' ";
          $cms->condition = " lang = '$lang_active' ";
 
          $cms->update();

       /******************************************/


       /* Delete :: Object INSERT */

          unset($cms);

       /******************************************/


       /* Load :: Updated Main Content */

          if ( $cms_content == 'links' )

               header ("Location:".ROOT_DIR."admin/changecms/".$cms_content."/");

          else
               header ("Location:".ROOT_DIR."cms/".$cms_content."/");

       /******************************************/
