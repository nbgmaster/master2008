<?php

  $tpl->assign("Myadmin", $Myadmin);

  /* LOGIN ACTION */

     if ( isset($login) )  {

          include('modules/logon/login.php');

     }

  /******************/


  /* LOGOUT ACTION */

     else if ( isset($logout) )   { 

         include('modules/logon/logout.php');

     }

  /******************/


  /* NO STARTING ACTION */

     else  {

         if ( $logon_true == '1' && $str ) {

              /* Get UserName */
          
                 $name = new SelectEntrys();
          
                 $name->cols      = 'UserName';
                 $name->table     = $tbl_users;
                 $name->condition = " UserID = '$str[1]' ";
                 $name->order     = '';
                 $name->limit     = "1";
                 $name->module    = '';
                 $name->template  = '';
          
                 $loginname = $name->row();
          
                 unset($name);
          
              /******************************************/


              /* Load :: Logoutbox */

                 $tpl->assign('loginname', $loginname);

                 $tpl->display("logon/logout.tpl");

              /******************************************/

         }

         else if ( $module == 'admin' ) {

              /* Load :: Loginbox */

                 $tpl->display("logon/login.tpl");

              /******************************************/

         }

     }

  /******************/