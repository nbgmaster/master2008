<?php

  require_once("xajax/xajax_core/xajax.inc.php");

  require_once("smarty/Smarty.class.php");

  session_start();

  $tpl = new Smarty;
  
  define("ROOT_DIR", "http://www.richter-stefan.info/");
  
  $xajax = new xajax(ROOT_DIR."index.server.php");
  $xajax->register(XAJAX_FUNCTION, "move");
  $xajax->register(XAJAX_FUNCTION, "page");
  $xajax->register(XAJAX_FUNCTION, "delete");
  $xajax->register(XAJAX_FUNCTION, "edit_comment");

  require_once("dbCon.php");
