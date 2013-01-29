<?php

  /* Create Select Boxes :: Record Date */

     $c_day    = date("d",$s_time);
     $c_month  = date("m",$s_time);
     $c_year   = date("Y",$s_time);
     $c_yearB  = date("Y",$timestamp);

     for ( $r1 = 1; $r1 <= 31; $r1++ )  {

           $day[] = $r1;

     }

     for ( $r2 = 1; $r2 <= 12; $r2++ )  {

           $month[] = $r2;

     }

     $min_year = $c_yearB - 5;

     for ( $r3 = $min_year; $r3 <= $c_yearB; $r3++ )  {

           $year[] = $r3;

     }
 
  /******************************/


  /* Show Select Boxes :: Record Date */

     $tpl->assign('c_day', $c_day);
     $tpl->assign('c_month', $c_month);
     $tpl->assign('c_year', $c_year);

     $tpl->assign('value_day', $day);
     $tpl->assign('record_day', $day);

     $tpl->assign('value_month', $month);
     $tpl->assign('record_month', $month);

     $tpl->assign('value_year', $year);
     $tpl->assign('record_year', $year);

  /******************************/