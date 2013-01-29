<<?php

         $ref = new SelectEntrys();

         $ref->cols      = 'link, description';
         $ref->table     = $tbl_ref;
         $ref->order     = 'position';
         $ref->multiSelect = '1';

         $ref->row();

         $tpl->assign('array_ref', $ref->row());

         unset($ref);

         $tpl->display("quicklinks.tpl");

