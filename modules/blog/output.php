<?php

  global $array_com;
  
  if ( !isset($count) ) $count = 0;

  if ( isset ($preview) ) {

       $title     = $_POST["title"];
       $title_EN  = $_POST["title_EN"];
       
       $message     = stripslashes($_POST["message"]);
       $message_EN  = stripslashes($_POST["message_EN"]);
             
       $file1       = $_POST["attach1"];  $file2 = $_POST["attach2"];  $file3 = $_POST["attach3"];
       $filename1   = $_POST["attachname1"];  $filename2 = $_POST["attachname2"];  $filename3 = $_POST["attachname3"];
       
       $id     = $_POST["id"];
       $author = "$getUserData()";
       
       $show_comments = $_POST["comments_on"];
       $visibility = $_POST["visibility"];
       
       $result["date_formatted"] = $_POST['time'];
             
  }

  else  { 

       $title = $result["title_DE"];
       $title_EN = $result["title_EN"];
       
       $message = stripslashes($result["message_DE"]);
       $message_EN = stripslashes($result["message_EN"]);
       
       $file1   = $result["file1"];  $file2 = $result["file2"];  $file3 = $result["file3"];
       $filename1   = $result["filename1"];  $filename2 = $result["filename2"];  $filename3 = $result["filename3"];

       $this->timestamp = $result["date"];
       $this->cols      = 'UserName';

       $id     = $result["id"];
       $author = "$this->getUserData()";
       
       $visibility    = $result["visibility"];
       $show_comments = $result["comments"];
       
       //$time   = $this->getDate();
       $b_timestamp = $result["date"];
       
       if ( $this->replace )  {

            require_once('./lib/replace.php');

            $message    = replaceBBcode($message, $set[0]["width_images"], 1);
            $message_EN = replaceBBcode($message_EN, $set[0]["width_images"], 1);
       
       }

  }

  if ( !isset ( $preview ) )  {

        $attachment = 0;

        if ( $file1 || $file2 || $file3 )  {

             $attachment = 1;

        }

        $fileicon1 = substr( $filename1, strlen( $filename1 ) - 3 );
        $fileicon2 = substr( $filename2, strlen( $filename2 ) - 3 );
        $fileicon3 = substr( $filename3, strlen( $filename3 ) - 3 );

        $filenumbers = 0;

        if ( $file1 ) $filenumbers++;
        if ( $file2 ) $filenumbers++;
        if ( $file3 ) $filenumbers++;

  }  
  
  if ($module != 'admin') {   

      $result["date_formatted"] = convert_date($result["date_formatted"], '');

      /* Print :: SELECT :: Comments */
        
         $comments              = new SelectEntrys();
         $comments->cols        = "id, bid, time, name, comment, lang";
         $comments->table       = $tbl_blog_comments;
         $comments->condition   = "bid = '$id' AND deleted = '0'";
         $comments->order       = "time DESC";
         $comments->limit       = "0, " . $set[0]['perpage_comments'];
         $comments->multiSelect = 1;
     
         if ($comments->row()) $array_com[] = $comments->row(); 

         unset($comments);

      /******************************************/      
          
          $comments_exist = new CheckExist();
          $comments_exist->tableE      = $tbl_blog_comments;
          $comments_exist->conditionE  = "bid = '$id' AND deleted = '0'";
          
          $comments_total = $comments_exist->exist();
        
          /* Generate Pagenavi for comments */
                  
             require_once('./lib/pagenavi.php');        
             $naviObj = new pagenavi();
             
             $naviObj->tableE     = $tbl_blog_comments;      // required
             $naviObj->conditionE = "bid = '$id' AND deleted = '0'";
                                      
             $TotalRows = $comments_total;

             $max_pages = ceil($TotalRows / $set[0]["perpage_comments"]);
         
             $array_pages_c[$count]['bid'] = $id;
            
             //if (is_numeric($page) && $page <= $max_pages) {
        
                   if ( $TotalRows > $set[0]["perpage_comments"] )  {
        
                        $naviObj->totalrows = $TotalRows;

                        $naviObj->showperpage = $set[0]["perpage_comments"];
        
                        $array_pages_c[$count]['content'] = $naviObj->rowpages('1');  // global parameter, defined in config.php
        
                   } 
        
                   unset($naviObj);
                   
             //}   
        
             if ($max_pages <= 1)  $array_pages_c[$count]['content'] = '';
             
             $count++;
        
          /******************************************/
                          
          $toggleS_style   = 'none';
          $toggleS_img     = 'expand';
          $toggleS_title   = $toggle_expandC;
        
          $toggleA_style   = 'none';
          $toggleA_img     = 'expand';
          $toggleA_title   = $toggle_expand;
        
                 
          if ( !isset ($this->toogle) ) $this->toogle = 0;
          
          if ( $this->toogle == $id || !isset($counter) && $page == 1 ) { 
        
               if ($comments_total > 0) { 
                   $toggleS_style   = ''; 
                   $toggleS_img     = 'collapse';
                   $toggleS_title   = $toggle_collapseC;
               }
        
               if ($filenumbers > 0) { 
                   $toggleA_style   = '';
                   $toggleA_img     = 'collapse';
                   $toggleA_title   = $toggle_collapse;
               }
                      
          } 
          
          if ( isset ( $submitC ) ) {
          
               $toggleS_style   = ''; 
               $toggleS_img     = 'collapse';
               $toggleS_title   = $toggle_collapseC;
                             
          }
          
          $counter++;
                            
          if ( isset($save_pages) ) {
          
               $tpl->assign("array_p", $save_pages);
               $lastpage = end($save_pages);
               $tpl->assign("pagesT", $lastpage['page']);
               $tpl->assign("title_pagenavi", $blog_navi);
        
          }
              
          $tpl->assign("page", $page);
        
          /* Spam Ban still active? */
             
             $c_name = "ip_".$id;
          
             $spamban_D               = new CheckExist();
             $spamban_D->tableE       = $tbl_blog_spamban;
             $spamban_D->conditionE   = "bid = '$id' AND ip = '$_SERVER[REMOTE_ADDR]' ";

             $spamban = $spamban_D->exist();
             
             if ( isset ($_COOKIE[$c_name]) ) $spamban = 1;

          /**************************/
            
  } // end :: module != 'admin'
      
  if ( !isset ( $preview ) )  {
  
       //date format: 0000-00-00 00:00:00
       $c_year     = substr($b_timestamp,0,4); 
       $c_month    = substr($b_timestamp,5,2);
       $c_day      = substr($b_timestamp,8,2);
       $c_hour     = substr($b_timestamp,11,2);
       $c_minute   = substr($b_timestamp,14,2);
       
       $c_unix = mktime($c_hour,$c_minute,0,$c_month,$c_day,$c_year);    
    
       if ($c_unix < $timestamp) $too_early = 0;
       else $too_early = 1;
     
       include('modules/admin/selectboxes_date.php');
   
  }  
     
  $array[] = array('thisid'           => $id,
                         'author'     => $author,
                         'title'      => $title,
                         'message'    => $message,
                         'title_EN'   => $title_EN,
                         'message_EN' => $message_EN,
                         'time'       => $b_timestamp,
                         'date_formatted' => $result["date_formatted"],
                         'attachment' => $attachment,
                         'file1'      => $file1,
                         'file2'      => $file2,
                         'file3'      => $file3,
                         'filename1'  => $filename1,
                         'filename2'  => $filename2,
                         'filename3'  => $filename3,
                         'fileicon1'  => $fileicon1,
                         'fileicon2'  => $fileicon2,
                         'fileicon3'  => $fileicon3,
                         'filenumbers'=> $filenumbers,
                         'too_early'  => $too_early,
                         'visibility' => $visibility,
                         'comments'   => $show_comments,
                         'toggleS_style'  => $toggleS_style,
                         'toggleS_img'    => $toggleS_img,
                         'toggleS_title'  => $toggleS_title,
                         'toggleA_style'  => $toggleA_style,
                         'toggleA_img'    => $toggleA_img,
                         'toggleA_title'  => $toggleA_title,
                         'comments_total' => $comments_total,
                         'max_pages'      => $max_pages,
                         'spamban'        => $spamban
                        );
               
  if ( !isset ( $preview ) )  $this->array = $array;
 
