<?php

  if ( $logon_true == '1' && $str && $Myadmin == '1' && isset ($_GET['do']) )  {

       include("modules/admin/$do.php");

  }
