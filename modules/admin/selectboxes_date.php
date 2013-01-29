<?php

         for ($d=1;$d<=31;$d++)                { if ($d < 10) $d_days[$d]    = '0'; $d_days[$d]    .= $d;  }
         for ($e=1;$e<=12;$e++)                { if ($e < 10) $d_months[$e]  = '0'; $d_months[$e]  .= $e;  }
         for ($f=$Fyear-50;$f<=$Fyear+10;$f++) { if ($f < 10) $d_years[$f]   = '0'; $d_years[$f]   .= $f;  }       
         for ($g=0;$g<=23;$g++)                { if ($g < 10) $d_hours[$g]   = '0'; $d_hours[$g]   .= $g;  }
         for ($h=0;$h<=59;$h++)                { if ($h < 10) $d_minutes[$h] = '0'; $d_minutes[$h] .= $h;  }
                                    
         $tpl->assign('c_day', $c_day);
         $tpl->assign('c_month', $c_month);
         $tpl->assign('c_year', $c_year);
         $tpl->assign('c_hour', $c_hour);
         $tpl->assign('c_minute', $c_minute);
         $tpl->assign('d_days', $d_days);
         $tpl->assign('d_months', $d_months);
         $tpl->assign('d_years', $d_years);
         $tpl->assign('d_hours', $d_hours);
         $tpl->assign('d_minutes', $d_minutes);