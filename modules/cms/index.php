<?php

  if ( $catL == '1' )

       $cms_content = "links";

  else 

       $cms_content = "$_GET[cat]";


  require_once('./lib/tpl_dbaccess.php');

  $tpl->register_resource("db", array("db_template_cms","db_timestamp","db_secure","db_trusted"));

  if ( $_GET["cat"] == "about" &&  $block["about"]["status"] == 1 || $_GET["cat"] == "ref" &&  $block["ref"]["status"] == 1 || $_GET["cat"] == "hiking" &&  $block["hiking"]["status"] == 1 || $_GET["cat"] == "imprint" &&  $block["imprint"]["status"] == 1 ) 
  
  {
       
       $tpl->display('db:index.tpl');

  }

  else  {

         $tpl->display('block_deactivated.tpl');

  }

  /******************************************/
