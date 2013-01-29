<?php

  $message = $result[$_GET[cat]];

  if ( $this->replace )  {

       $message = replaceBBcode($message, $set[0]["width_images"], 0);

  }


  $Thead = "admin_head_edit".$_GET[cat];

  $tpl->assign('admin_head', $Thead);

  $tpl->assign('cms_site', true);
  
  $this->array[] = array('message' => $message);
