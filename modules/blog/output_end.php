<?php

 global $xajax;
 
  if ($module != 'admin') {

  /* Modify Comment Array */
  
      if (count ($array_com) > 0) {
      
          foreach ($array_com as $array_com2)  {
        
             for ( $b = 0; $b < count($array_com2); $b++)  {  
    
                   //convert date
                   $array_com2[$b]['time'] = convert_date_comments($array_com2[$b]['time']);

                   //replace url links
                                       
                   $array_com2[$b]['comment'] = str_replace("www.","http://www.",$array_com2[$b]['comment']);
                   $array_com2[$b]['comment'] = str_replace("http://http://","http://",$array_com2[$b]['comment']);
                   $array_com2[$b]['comment'] = eregi_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" class='postedlink' target='_blank'>\\0</a>", $array_com2[$b]['comment']);    
                                                
                   //avoid layout damage
                   $array_com2[$b]['comment'] = wordwrap($array_com2[$b]['comment'], 60, " ", 1);
    
                   //line breaks
                   $array_com2[$b]['comment_unformatted'] = $array_com2[$b]['comment'];
                   $array_com2[$b]['comment'] = nl2br($array_com2[$b]['comment']);
                   
            }
        
            $array_com3[] = $array_com2;
        
          } 
      
      }
      
  /******************************************/
      
  }
               
  $tpl->assign("totalrows", $TotalRows);
  $tpl->assign("com_perpage", $set[0]['perpage_comments']);
  $tpl->assign('array_com', $array_com3); 
  $tpl->assign('array_pages_c', $array_pages_c); 
  $tpl->assign("form_title", true);
  $tpl->assign("form_attach", true);
  $tpl->assign("form_options", true);
     
  $tpl->assign('admin_head', $admin_head_editblog);
  
  if ( isset ( $submitC ) ) {
  
       $tpl->assign("error_id", $_POST['bid']); 
       $tpl->assign("name_c_s", $_POST['name']); 
       $tpl->assign("comment_c_s", $_POST['comment']); 
         
  }
  
  else $tpl->assign("error_id", '0'); 

  $tpl->assign("Myadmin", $Myadmin);

  if ( $logon_true == '1' && $str ) {

       $tpl->assign("admin", true);

  }