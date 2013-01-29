<?php

       $tpl->assign('admin_head', $admin_head_editgal);

       $tpl->assign("img_height", $save_height);
       
       $tpl->assign('form_nopreview', true);
                 
       $tpl->assign("subfolders", $this->subfolders);

       if ( $logon_true == '1' && $str ) {

            $tpl->assign("admin", true);

       }

       $tpl->assign("Myadmin", $Myadmin);