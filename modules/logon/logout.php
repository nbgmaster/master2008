<?php

  /* Create Object :: EXIST */

     $hits = new CheckExist();

  /******************************************/

 
  /* Logout :: Delete Cookie */

     $hits->user = '';
     $hits->pw   = '';

     $hits->cookieset();
 
     $tpl->display("logon/login.tpl");

     header ("Location:".ROOT_DIR."admin/");

     unset($hits);

  /******************************************/