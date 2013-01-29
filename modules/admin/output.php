<?php

       $this->userid = $str[1];

       $this->array[] = array('thisid'    => $result[UserID],
                              'username'  => $result[UserName],
                              'password'  => 'XXXXX',   
                              'email'     => $result[UserMail],
                              'firstname' => $result[firstname], 
                              'lastname'  => $result[lastname],
                              'statusS'   => $result[status],
                              'adminS'    => $result[admin]
                             );

       $tpl->assign('value', array(0,1));
       $tpl->assign('status', array($statusB,$statusA));
 
       $tpl->assign('value2', array(0,1));
       $tpl->assign('admin', array($rightsB,$rightsA));

       $tpl->assign('admin_head', $admin_head_edituser);

       $tpl->assign('Myadmin', $this->Myadmin);