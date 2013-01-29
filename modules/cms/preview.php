<?php

  require_once('./lib/replace.php');

  $message = stripslashes($_POST["message"]);

  $message = replaceBBcode($message, $set[0]["width_images"], 0);

  $tpl->assign('preview_msg', $message);

  $tpl->display('preview.tpl');
