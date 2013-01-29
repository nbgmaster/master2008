<?php

   if ( $block["links"]["status"] == 1 )  {

        include("output.php");

        if ($_GET['cid'] > 0 && $links_total > 0 || !isset($_GET['cid']) ) $tpl->display("links/index.tpl");
        
        else $tpl->display("block_deactivated.tpl");

    /******************************************/

  }

  else  $tpl->display("block_deactivated.tpl");
