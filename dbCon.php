<?php

  /* Create Object :: CONNECT */

     require_once('lib/dbCon.php');

     $DBcon = new EstablishDBConnection();

     $DBcon->dbserver = 'localhost';
     $DBcon->dbuser   = 'root';
     $DBcon->dbpass   = '';
     $DBcon->dbname   = 'master08';

     $DBcon->connectDB();

  /******************************************/
