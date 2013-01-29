<?php

  if ( isset ($preview) ) {
  
     $msg_form = stripslashes($_POST["message"]);

     $array[] = array('message' => $msg_form);

     $tpl->assign('array', $array);
         
     $tpl->assign('cms_site', true);

     $tpl->display('formular/form_main.tpl');

  }

  else  {

      /* Create Object :: SELECT */

         $cms = new SelectEntrys();

         $cms->cols      = "$cms_content";
         $cms->table     = $tbl_cms;
         $cms->condition = " lang = '$lang_active' ";
         $cms->order     = '';
         $cms->limit     = "";
         $cms->module    = "cms";
         $cms->template  = 'formular/form_main.tpl';

         $cms->row();

         unset($cms);

      /******************************************/

  }
