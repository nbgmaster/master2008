<?php

  require_once('./lib/modify.php');

  if ( isset($submit_links_c) || isset($submit_links_c_x)  )  {

        include('editlinks_c.php');

        $anker = "#links_c";

  }

  else if ( isset($submit_links_l) || isset($submit_links_l_x) )  {

        include('editlinks_l.php');

        $anker = "#links_l_".$_POST["ankerID"];

  }

  if ( isset($submit_links_c) || isset($submit_links_c_x) || isset($submit_links_l) || isset($submit_links_l_x) )  {

     /* Load :: Updated Main Content */

        header ("Location:".ROOT_DIR."admin/editlinks/$anker");

     /******************************************/


  }

  else  {

        include("./modules/links/output.php");
        
        $tpl->display("admin/editlinks.tpl");

  }

