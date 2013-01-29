<?php

  $tpl->assign("form_title", true);
  $tpl->assign("form_attach", true);
  $tpl->assign("form_options", true);
  $tpl->assign("mainform.comments", 1);
  $tpl->assign('admin_head', $admin_head_editblog);

  if ( isset($submit) )  {

       /* Create Object :: INSERT */

          require_once('./lib/modify.php');

          $blog = new ModifyEntry();

       /******************************************/


       /* Attachments :: Upload */

          $tempname1 = $_FILES["file1"]["tmp_name"]; 
          $filename1 = $_FILES["file1"]["name"]; 

          $tempname2 = $_FILES["file2"]["tmp_name"]; 
          $filename2 = $_FILES["file2"]["name"]; 

          $tempname3 = $_FILES["file3"]["tmp_name"]; 
          $filename3 = $_FILES["file3"]["name"]; 

          $blog->directory = 'attachments';

          if ( $filename1 )  {

               $blog->tempname  = $tempname1;
               $blog->filename  = $filename1;
               $attachment1     = $blog->attach();

          }

          if ( $filename2 )  {

               $blog->tempname  = $tempname2;
               $blog->filename  = $filename2;
               $attachment2     = $blog->attach();

          }

          if ( $filename3 )  {

               $blog->tempname  = $tempname3;
               $blog->filename  = $filename3;
               $attachment3     = $blog->attach();

          }

       /******************************************/


       /* Insert new entry */

          $msg_de = mysql_real_escape_string($_POST[message]);
          $msg_en = mysql_real_escape_string($_POST[message_EN]);
                 
          //date format: 0000-00-00 00:00:00                   
          $my_time = $_POST[d_year].'-'.$_POST[d_month].'-'.$_POST[d_day].' '.$_POST[d_hour].':'.$_POST[d_minute].':00';

          $blog->table  = $tbl_blog;
          $blog->cols   = 'author, title_DE, message_DE, title_EN, message_EN, date, file1, filename1, file2, filename2, file3, filename3, comments';
          $blog->values = " $str[1], '$_POST[title]', '$msg_de', '$_POST[title_EN]', '$msg_en', '$my_time', '$attachment1[0]', '$attachment1[1]', '$attachment2[0]', '$attachment2[1]', '$attachment3[0]', '$attachment3[1]', '$_POST[comments_on]' ";
 
          $blog->insert();

       /******************************************/


       /* Delete :: Object INSERT */

          unset($blog);

       /******************************************/
       
       
       /* UPDATE :: RSS Feed */
       
          include('update_rss_blog.php');

       /******************************************/
       

       /* Load :: Updated Main Content */

          header ("Location:".ROOT_DIR."");

       /******************************************/

  }

  else if ( isset ($preview) )  {

            include('modules/blog/preview.php');
            
            $array[] = array('title' => $_POST["title"], 'message' => stripslashes($_POST["message"]), 'title_EN' => $_POST["title_EN"], 'message_EN' => stripslashes($_POST["message_EN"]), 'time' => $c_date, 'date_formatted' => $_POST["time"], 'comments' => $_POST["comments_on"], 'visibility' => $_POST["visibility"]);
  
            $tpl->assign('array', $array);
  
            $tpl->display("formular/form_main.tpl");

            $tpl->display('blog/preview.tpl');
                        
  }

  else  {

      /* Load :: Input boxes */

         $c_day     = date("d",$timestamp);
         $c_month   = date("m",$timestamp);
         $c_year    = date("Y",$timestamp);
         $c_hour    = date("H",$timestamp);
         $c_minute  = date("i",$timestamp);

         $b_timestamp  = date("d. m Y",$timestamp);
         
         $array[] = array('date_formatted' => $b_timestamp);
                         
         $tpl->assign('array', $array);
  
         include('modules/admin/selectboxes_date.php');
    
         $tpl->display("formular/form_main.tpl");

      /******************************************/


  }
