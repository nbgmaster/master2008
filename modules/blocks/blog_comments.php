<?php

         $b_comments = new SelectEntrys();

         $b_comments->cols      = 'bid, COUNT(id), MAX(time)';
         $b_comments->table     = $tbl_blog_comments;
         $b_comments->order     = 'MAX(time) DESC';
         $b_comments->group     = 'bid';
         $b_comments->condition = "deleted = '0'";
         $b_comments->limit     = '5';
         $b_comments->multiSelect = '1';

         $array_blog_comments = $b_comments->row();

         unset($b_comments);

         if ( $array_blog_comments !="" && isset ($array_blog_comments) && count($array_blog_comments) > 0 )  {

               for($b=0;$b<count($array_blog_comments);$b++) {
      
                 $bid = $array_blog_comments[$b]['bid'];
                 $single_array[] = $array_blog_comments[$b]['bid'];
      
                 $array_comments[$b]['bid'] = $array_blog_comments[$b]['bid'];           
                 $array_comments[$b]['comment_numbers'] = $array_blog_comments[$b]['COUNT(id)'];
                 $array_comments[$b]['comment_time'] = convert_date_comments($array_blog_comments[$b]['MAXtime']);  
                 $array_comments[$b]['comment_time'] = substr($array_comments[$b]['comment_time'], 0, strlen($array_comments[$b]['comment_time'])-8);  
                             
               }
      
               $string_bids = implode(",", $single_array);
      
               $b_title = new SelectEntrys();
      
               $b_title->cols        = 'id, title_DE, title_EN, date';
               $b_title->table       = $tbl_blog;
               $b_title->condition   = "id IN ($string_bids)";
               $b_title->multiSelect = '1';
      
               $array_b_titles = $b_title->row();
            
               for($b=0;$b<count($array_b_titles);$b++) {
      
                   $date = $array_b_titles[$b]['date'];
               
                   $get_page             = new CheckExist();
                   $get_page->tableE     = $tbl_blog;
                   $get_page->conditionE = " date > '$date' "; 
                   $_page = $get_page->exist();
                   
                   unset($get_page);
      
                   $bid = $array_b_titles[$b]['id'];         
                 
                   $final_page = floor($_page / $set[0]['perpage_blog']) + 1; 
      
                   $array_b[$bid]['title_DE'] = $array_b_titles[$b]['title_DE'];
                   $array_b[$bid]['title_EN'] = $array_b_titles[$b]['title_EN']; 
                   $array_b[$bid]['link'] = 'blog/'.$final_page.'/'.$bid.'/#c'.$bid;
                                
               }
      
               for($b=0;$b<count($array_comments);$b++) {
      
                   $bid = $array_comments[$b]['bid'];
                
                   $array_comments[$b]['title_DE'] = $array_b[$bid]['title_DE'];
                   $array_comments[$b]['title_EN'] = $array_b[$bid]['title_DE'];
                   $array_comments[$b]['link'] = $array_b[$bid]['link'];
      
               }
      
               $tpl->assign('array_blog_comments', $array_comments);
      
               $tpl->display("blog_comments.tpl");
               
        }

