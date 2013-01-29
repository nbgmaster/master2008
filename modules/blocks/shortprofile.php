<?php

         $profile = new SelectEntrys();

         $profile->cols      = 'german, english, value, value_EN';
         $profile->table     = $tbl_profile;
         $profile->order     = 'position';
         $profile->multiSelect = '1';

         $profile->row();

         $tpl->assign('array_profile', $profile->row());

         unset($profile);

         $tpl->display("shortprofile.tpl");

