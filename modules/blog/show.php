<?php

  global $array_com;
  
  require_once('./lib/modify.php');
          
  if ( !empty($_POST['submit_del']) && $logon_true == '1' && $str )  { 

       /* Create Object :: DELETE */

          $blog = new ModifyEntry();

       /******************************************/


       /* Delete possible attachments too */
       /*** FUNCTION DEACTIVATED

          $attach = new SelectEntrys();

          $attach->table     = $tbl_blog;
          $attach->condition = " id = '$_POST[nid]' ";
          $attach->order     = '';
          $attach->limit     = "1";
          $attach->module    = '';
          $attach->template  = '';

          $attach->cols = 'file1';
          $file1 = $attach->row();  

          $attach->cols = 'file2';
          $file2 = $attach->row();   

          $attach->cols = 'file3';
          $file3 = $attach->row(); 

          if ( $file1 ) unlink("attachments/$file1"); 
          if ( $file2 ) unlink("attachments/$file2"); 
          if ( $file3 ) unlink("attachments/$file3"); 

          unset($attach);

       /******************************************/


       /* Delete entry */
       
          $blog            = new ModifyEntry();
          $blog->table     = $tbl_blog;
          $blog->changes   = " deleted = '1' ";
          $blog->condition   = " id = '$_POST[nid]' ";
 
          $blog->update();

          unset($blog);

       /******************************************/


      /* Get total rows */
         $blog     = new CheckExist();
         $blog->tableE     = $tbl_blog;
         $blog->conditionE = " deleted = '0' ";

         $TotalRows = $blog->exist();

         unset($blog);
 
      /******************************************/


       /* Load :: Updated Main Content */
       
          if (!isset ($_GET['page']) ) $page_current = '1';
          else $page_current = $_GET['page'];

          $max_pages = ceil($TotalRows / $set[0]["perpage_blog"]);

          if ($max_pages > 1 && $page_current <= $max_pages) $page_url = 'blog/'.$page_current.'/';
          else if ($max_pages > 1 && $page_current > $max_pages) $page_url = 'blog/'.$max_pages.'/';
          else $page_url = '';
     
          header ("Location:".ROOT_DIR.$page_url);

       /******************************************/

  }
  
  // Insert Comment

  else if ( isset ( $submitC ) ) {
  
       /* Get Page URL */
          
          if (!isset ($_GET['page']) ) $page_current = '1';
          else $page_current = $_GET['page'];

          $page_url = 'blog/'.$page_current.'/'.$_POST['bid'].'/#c'.$_POST[bid];

       /******************************************/
       
       
       /* Verify security code */
               
          require_once ('modules/securimage/securimage.php');
      
          $securimage = new Securimage();
      
          if ($securimage->check($_POST['captcha_code']) === false) {
                    
              /* Print :: SELECT */
        
                 $blog            = new SelectEntrys();
                 $blog->cols      = "id, author, title_DE, message_DE, title_EN, message_EN, date, DATE_FORMAT(date,'%d. %m %Y') as date_formatted, file1, filename1, file2, filename2, file3, filename3, visibility, comments";
                 $blog->table     = $tbl_blog;
                 if ($Myadmin == 1) $blog->condition = " deleted = '0' ";
                 else $blog->condition = " deleted = '0' AND visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
                 $blog->order     = 'date DESC';
        
                 $blog->limit     = "$begin, " . $set[0]['perpage_blog'];
                 $blog->module    = 'blog';
                 $blog->template  = 'blog/show.tpl';
                 
                 if ($_GET['bid']) $blog->toogle = $_GET['bid'];
                 
                 $blog->replace   = 'true';
        
                 $blog->row();
         
        
                 unset($blog);
        
              /******************************************/
 
          }
          
       /******************************************/

          else  {
  
             /* Create Object :: INSERT */
      
                $blog = new ModifyEntry();
      
             /******************************************/
         
           
             /* Insert new entry */
             
               if ( empty($_POST[name]) ) $_POST[name] = $name_guest;
               
                $_POST["comment"]=strip_tags($_POST["comment"]);
             
                $blog->table  = $tbl_blog_comments;
                $blog->cols   = 'bid, name, comment, lang, ip';
                $blog->values = " '$_POST[bid]', '$_POST[name]', '$_POST[comment]', '$lang_active', '$_SERVER[REMOTE_ADDR]' ";
       
                $blog->insert();
        
             /******************************************/
             
             
             /* Prevent Spam :: Save IP and set cookie */   
             
                if ($set[0]["time_ban"] > 0) {
             
                    $blog->table     = $tbl_blog_spamban;
                    $blog->cols   = 'ip, bid';
                    $blog->values = " '$_SERVER[REMOTE_ADDR]', '$_POST[bid]' ";
           
                    $blog->insert();
                    
                    $spam = new CheckExist();
                    $c_name = "ip_".$_POST[bid];
                    $c_content = $_SERVER['REMOTE_ADDR'];
                    $c_time = time()+60*$set[0]["time_ban"];
                    $spam->cookieIP($c_name, $c_content, $c_time, '/');
                   
                    unset($spam);
                
                }
      
             /******************************************/
             
             
             /* Load :: Updated Main Content */
                     
                header ("Location:".ROOT_DIR.$page_url);
      
             /******************************************/  

       }          
  
  } 
  
  else {

      /* Delete :: Old blocked IPs */
        
          $blog = new ModifyEntry(); 
          $blog->table     = $tbl_blog_spamban;
          $differ = $timestamp - (60 * $set[0]['time_ban']);
          $blog->condition = " UNIX_TIMESTAMP(time) < $differ ";
          $blog->delete();
          
          unset($blog);
                             
      /******************************************/


      /* Print :: SELECT */

         $blog            = new SelectEntrys();
         $blog->cols      = "id, author, title_DE, message_DE, title_EN, message_EN, date, DATE_FORMAT(date,'%d. %m %Y') as date_formatted, file1, filename1, file2, filename2, file3, filename3, visibility, comments";
         $blog->table     = $tbl_blog;
         if ($Myadmin == 1) $blog->condition = " deleted = '0' ";
         else $blog->condition = " deleted = '0' AND visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
         $blog->order     = 'date DESC';

         $blog->limit     = "$begin, " . $set[0]['perpage_blog'];
         $blog->module    = 'blog';
         $blog->template  = 'blog/show.tpl';
         
         if ($_GET['bid']) $blog->toogle = $_GET['bid'];
         
         $blog->replace   = 'true';

         $blog->row();
 
      /******************************************/


      /* Delete :: Object SELECT */

         unset($blog);

      /******************************************/

  }
