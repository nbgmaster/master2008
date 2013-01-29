<?php

         $design = new SelectEntrys();

         $design->cols      = 'german, english, hexcode, imgfolder';
         $design->table     = $tbl_design;
         $design->order     = 'position';
         $design->multiSelect = '1';

         $design->row();

         $tpl->assign('array_design', $design->row());

         unset($design);

         $tpl->display("settings.tpl");

