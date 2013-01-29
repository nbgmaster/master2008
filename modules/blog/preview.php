<?php

  require_once('./lib/replace.php');
  
  $tpl->assign("form_attach", true);
  $tpl->assign("form_options", true);  
  $tpl->assign("form_title", true);
            
  $msg    = replaceBBcode($_POST["message"], $set[0]["width_images"], 1);
  $msg_EN = replaceBBcode($_POST["message_EN"], $set[0]["width_images"], 1);
  
  $msg    = stripslashes($msg);
  $msg_EN = stripslashes($msg_EN);
  
  $c_day     = $_POST["d_day"];
  $c_month   = $_POST["d_month"];
  $c_year    = $_POST["d_year"];
  $c_hour    = $_POST["d_hour"];
  $c_minute  = $_POST["d_minute"];
  
  include('modules/admin/selectboxes_date.php');
                                     
  $tpl->assign('preview_title', $_POST["title"]);
  $tpl->assign('preview_title_EN', $_POST["title_EN"]);
  
  $tpl->assign('preview_msg', $msg);
  $tpl->assign('preview_msg_EN', $msg_EN);
  
  $tpl->assign("time_DE", convert_date($_POST["time"], 'DE'));
  $tpl->assign("time_EN", convert_date($_POST["time"], 'EN'));