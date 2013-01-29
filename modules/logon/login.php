<?php

  /* Crypt Password with MD5 Method */

     $pw_crypted = MD5($_POST[password]);

  /******************************************/


  /* Create Object :: EXIST */

     require_once('./lib/exist.php');

     $hits = new CheckExist();

  /******************************************/


  /* Check :: EXIST */

     $hits->tableE     = $tbl_users;
     $hits->conditionE = " UserName = '$_POST[username]' && UserPass = '$pw_crypted' ";

     $CheckData = $hits->exist();   

  /******************************************/


  /* Change Status :: Login successful or failed */

     if ( $CheckData == 1 )  {

          $hits->user = $_POST[username];
          $hits->pw   = $pw_crypted;

          $hits->tbl_users = $tbl_users;

          $hits->cookieset();

          header ("Location:".ROOT_DIR."admin/");

     }

     else  {

          $hits->user = '';
          $hits->pw   = '';

          $hits->cookieset();

          $tpl->assign('failure', true);

          $tpl->display("logon/login.tpl");

     }

     unset($hits);

  /******************************************/
