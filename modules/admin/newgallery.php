<?php

  if ( isset($submit) )  { 

       //set_time_limit(0);
       ini_set('max_execution_time','9999999');
       ini_set("memory_limit","980M");

       /* Create Object :: INSERT */
       
          require_once('./lib/modify.php');
          
          $gallery = new ModifyEntry();

       /******************************************/


       /* Create new folders */ 
       
          if (is_dir("gallery/$_POST[folder]/images") == false) mkdir ("gallery/$_POST[folder]/images", 0777);
          if (is_dir("gallery/$_POST[folder]/thumbs") == false) mkdir ("gallery/$_POST[folder]/thumbs", 0777);

       /******************************************/


      /* Directorys of the images and thumbs */

         $dir_images = "gallery/$_POST[folder]/";
         $dir_images_new = "gallery/$_POST[folder]/images/";
         $dir_thumbs = "gallery/$_POST[folder]/thumbs/";

      /******************************************/


       /* Get images in main directory */

          $gallery->directory = $dir_images;
          $images = $gallery->listfolder('return');

       /******************************************/


      /* Resize images */

          $gallery->dir_target = $dir_images_new;
          $gallery->height_max = $set[0]["height_images_max"];
          $gallery->width      = $set[0]["width_images"];
          $gallery->pictures   = $images;
          $gallery->createpicture('image');          

       /******************************************/


       /* Get shooting time

          $picX = "$dir_images/$images[1]";

          $exifdata = exif_read_data($picX, 0, true);

          $fulldatetime = $exifdata['EXIF']['DateTimeOriginal'];

          if ( !$fulldatetime )  {
               
                $timeG = $timestamp;

          }

          else  {

                $tmp  = explode(" ",$fulldatetime);      
    
                $date = $tmp[0];
                $time = $tmp[1];                

                $date = explode(":",$date);    
                $time = explode(":",$time);             

                $timeG = mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);

          } 

      *******************************************/


      /* Create Thumbs */

          $gallery->dir_target = $dir_thumbs;
          $gallery->height_max = $set[0]["height_thumbs_max"];
          $gallery->width = $set[0]["width_thumbs"];;
          $gallery->pictures = $images;
          $gallery->createpicture('thumb');

       /******************************************/


       /* Insert new entry */ 

          //date format: 0000-00-00 00:00:00                   
          $my_time = $_POST[d_year].'-'.$_POST[d_month].'-'.$_POST[d_day].' '.$_POST[d_hour].':'.$_POST[d_minute].':00';
          
          $gallery->table  = $tbl_gallery;
          $gallery->cols   = 'title, title_EN, description, description_EN, folder, date, visibility';
          $gallery->values = " '$_POST[title]', '$_POST[title_EN]', '$_POST[description]', '$_POST[description_EN]', '$_POST[folder]', '$my_time', '$_POST[visibility]' ";
 
          $gallery->insert();

       /******************************************/
       
       
       /* UPDATE :: RSS Feed */
       
          include('update_rss_gallery.php');
          
       /******************************************/


       /* Delete :: Object INSERT */

          unset($gallery);

       /******************************************/


       /* Load :: Updated Main Content */

          header ("Location:".ROOT_DIR."gallery.html");

       /******************************************/

  } 

  else  {

       /* Get new subfolders */

          $subfolders = new readdirectory();
          $subfolders->directory = "gallery/";
          $results = $subfolders->listfolder('return');

          unset($subfolders);

       /* Check correct file formats */

          $folder = new readdirectory();
          $folder->results = $results;
          $subfolders = $folder->checkformat('true');

          unset($folder);

       /******************************/


       /* Create Select Boxes :: Record Date */

          $c_day     = date("d",$timestamp);
          $c_month   = date("m",$timestamp);
          $c_year    = date("Y",$timestamp);
          $c_hour    = date("H",$timestamp);
          $c_minute  = date("i",$timestamp);
                                    

          include("modules/admin/selectboxes_date.php");

       /******************************/


       /* Load :: Input boxes */

          array_unshift($subfolders, $newgallery_select); 

          $tpl->assign('date', $c_date);

          $tpl->assign('subfolders', $subfolders);

          $tpl->assign('admin_head', $admin_head_newgal);
                  
          $tpl->assign('form_nopreview', true);

          $tpl->display("admin/newgallery.tpl");

       /******************************************/


  }
