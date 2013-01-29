<?php

  if ( isset($submit) )  {

       /* Create Object :: UPDATE */

          require_once('./lib/modify.php');

          $blog = new ModifyEntry();

          $blog->table     = $tbl_blog;
          $blog->condition = " id = '$_POST[id]' ";

       /******************************************/


       /* Attachments :: Delete */

           if ( $del_attach1 == 1 )  {

                $changeF = " file1 = '', filename1 = '' ";  

                unlink("attachments/$_POST[attach1]"); 

           }

           if ( $del_attach2 == 1 )  {

                if ( $changeF ) $changeF .= ",";  

                $changeF .= " file2 = '', filename2 = '' ";   

                unlink("attachments/$_POST[attach2]"); 

           }

           if ( $del_attach3 == 1 )  {

                if ( $changeF ) $changeF .= ",";  

                $changeF .= " file3 = '', filename3 = '' ";            
 
                unlink("attachments/$_POST[attach3]"); 

           }

           if ( $changeF ) {

                $blog->changes = $changeF;
                $blog->update();

           }

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

               $changeF = " file1 = '$attachment1[0]', filename1 = '$attachment1[1]' ";              

          }

          if ( $filename2 )  {

               $blog->tempname  = $tempname2;
               $blog->filename  = $filename2;
               $attachment2     = $blog->attach();

               if ( $changeF ) $changeF .= ",";

               $changeF   .= " file2 = '$attachment2[0]', filename2 = '$attachment2[1]' ";              
 
          }


          if ( $filename3 )  {

               $blog->tempname  = $tempname3;
               $blog->filename  = $filename3;
               $attachment3     = $blog->attach();

               if ( $changeF ) $changeF .= ",";

               $changeF   .= " file3 = '$attachment3[0]', filename3 = '$attachment3[1]' ";              

          }

          if ( $changeF ) {

               $blog->changes = $changeF;
               $blog->update();

          }

       /******************************************/



       /* Update entry */
       
          $msg_de = mysql_real_escape_string($_POST[message]);
          $msg_en = mysql_real_escape_string($_POST[message_EN]);
       
          //date format: 0000-00-00 00:00:00                   
          $my_time = $_POST[d_year].'-'.$_POST[d_month].'-'.$_POST[d_day].' '.$_POST[d_hour].':'.$_POST[d_minute].':00';

          $blog->changes   = " author = '$str[1]', title_DE = '$_POST[title]', message_DE = '$msg_de', title_EN = '$_POST[title_EN]', message_EN = '$msg_en', date = '$my_time', visibility = '$_POST[visibility]', comments = '$_POST[comments_on]' ";
 
          $blog->update();

       /******************************************/


       /* Delete :: Object UPDATE */

          unset($blog);

       /******************************************/
       
       
       /* UPDATE :: RSS Feed */
       
          include('update_rss_blog.php');
          
       /******************************************/


       /* Load :: Updated Main Content */
       
          $GetPage = new SelectEntrys();
          $GetPage->cols        = 'date';
          $GetPage->table       = $tbl_blog;
          $GetPage->condition   = " id = '$_POST[id]' ";
          
          $Tdate = $GetPage->row();
          
          unset($GetPage);
          
          $GetPage = new CheckExist();
          $GetPage->tableE      = $tbl_blog;
          $GetPage->conditionE  = "date > '$Tdate' AND deleted = '0' ";
    
          $newer_entries = $GetPage->exist();
     
          unset($GetPage); 
             
          $page = $newer_entries / $set[0]['perpage_blog'];

          $page = floor($page);
          
          $page++; 

          header ("Location:".ROOT_DIR."blog/".$page."/".$_POST[id]."/#b".$_POST[id]);

       /******************************************/

  }

  else if ( isset ($preview) )  {

            include("modules/blog/output.php");

            include('modules/blog/preview.php');
  
            $tpl->assign('array', $array);
            $tpl->display("formular/form_main.tpl");
            $tpl->display('blog/preview.tpl');

  }

  else  {

      /* Create Object :: SELECT */

         $blog = new SelectEntrys();

      /******************************************/


      /* Print :: SELECT */

         $blog->cols      = "id, title_DE, message_DE, title_EN, message_EN, date, DATE_FORMAT(date,'%d. %m %Y') as date_formatted, file1, file2, file3, filename1, filename2, filename3, visibility, comments";
         $blog->table     = $tbl_blog;
         $blog->condition = " id = '$_GET[nid]' ";
         $blog->order     = '';
         $blog->limit     = "";
         $blog->module    = 'blog';
         $blog->template  = 'formular/form_main.tpl';

         $blog->row();
  
      /******************************************/
                  
                  
      /* Delete :: Object SELECT */

         unset($blog);

      /******************************************/

  }
