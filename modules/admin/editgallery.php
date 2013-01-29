<?php

  if ( isset($submit) )  {  // Edit title or folder

       /* Create Object :: UPDATE */

          require_once('./lib/modify.php');
          
          $gallery = new ModifyEntry();

       /******************************************/

       /* Update entry */

          //date format: 0000-00-00 00:00:00                   
          $my_time = $_POST[d_year].'-'.$_POST[d_month].'-'.$_POST[d_day].' '.$_POST[d_hour].':'.$_POST[d_minute].':00';

          $gallery->table     = $tbl_gallery;
          $gallery->changes   = " title = '$_POST[title]', title_EN = '$_POST[title_EN]', description = '$_POST[description]', description_EN = '$_POST[description_EN]', folder = '$_POST[folder]', date = '$my_time', visibility = '$_POST[visibility]' ";
          $gallery->condition = " id = '$_POST[gid]' ";
 
          $gallery->update();

       /******************************************/
       
       
       /* UPDATE :: RSS Feed */
       
          include('update_rss_gallery.php');
          
       /******************************************/


       /* Delete :: Object INSERT */

          unset($gallery);

       /******************************************/


       /* Load :: Updated Main Content */
       
          $GetPage = new SelectEntrys();
          $GetPage->cols        = 'date';
          $GetPage->table       = $tbl_gallery;
          $GetPage->condition   = " id = '$_POST[gid]' ";
          
          $Tdate = $GetPage->row();
          
          unset($GetPage);
          
          $GetPage = new CheckExist();
          $GetPage->tableE      = $tbl_gallery;
          $GetPage->conditionE  = "date > '$Tdate' ";
    
          $newer_entries = $GetPage->exist();
     
          unset($GetPage); 
             
          $page = $newer_entries / $set[0]['perpage_gallery'];

          $page = floor($page);
          
          $page++; 

          header ("Location:".ROOT_DIR."gallery/page/".$page."/#g".$_POST[gid]);

       /******************************************/

  }

  else if ( isset($submit2) )  {  // Update images and thumbs

       //set_time_limit(0);
       ini_set('max_execution_time','9999999');
       ini_set("memory_limit","980M");

       /* Get Folder Name by GID */

          $gallery = new SelectEntrys();
          $gallery->cols      = 'folder';
          $gallery->table     = $tbl_gallery;
          $gallery->condition = " id = '$_POST[gid]' ";
          $gallery->order     = '';
          $gallery->limit     = "1";
          $gallery->module    = '';
          $gallery->template  = '';

          $results[] = $gallery->row(); 

          unset($gallery);

       /******************************************/


       /* Create Object :: Readdirectory */

          $thumbs = new readdirectory();

       /******************************************/

      /* Directorys of the images and thumbs */

         $dir_images = "gallery/$results[0]/";
         $dir_images_new = "gallery/$results[0]/images/";
         $dir_thumbs = "gallery/$results[0]/thumbs/";

      /******************************************/

       /* Create new folders if they do not exist */ 
         
         if (is_dir("gallery/$results[0]/images") == false) mkdir ("gallery/$results[0]/images", 0777);
         if (is_dir("gallery/$results[0]/thumbs") == false) mkdir ("gallery/$results[0]/thumbs", 0777);

      /******************************************/
      
       /* Clear images and thumbs directory */ 

          $thumbs->directory = $dir_images_new;
          $thumbs->listfolder('clear');
          
          $thumbs->directory = $dir_thumbs;
          $thumbs->listfolder('clear');

       /******************************************/


       /* Get images in main directory */

          $thumbs->directory = $dir_images;
          $images = $thumbs->listfolder('return');

       /******************************************/


      /* Create images */

          $thumbs->dir_target = $dir_images_new;
          $thumbs->width = $set[0]["width_images"];
          $thumbs->height_max = $set[0]["height_images_max"];
          $thumbs->pictures = $images;
          $thumbs->createpicture('image');

       /******************************************/


      /* Create Thumbs */

          $thumbs->dir_target = $dir_thumbs;
          $thumbs->width = $set[0]["width_thumbs"];
          $thumbs->height_max = $set[0]["height_thumbs_max"];
          $thumbs->pictures = $images;
          $thumbs->createpicture('thumb');

       /******************************************/


       /* Delete :: Object INSERT */

          unset($thumbs);

       /******************************************/


       /* Load :: Updated Main Content */

          header ("Location:".ROOT_DIR."gallery/".$_POST['gid']);

       /******************************************/

  }

  else  {

         $results = Array();
         $Tfolder = Array();

      /* Create Object :: SELECT */

         $gallery = new SelectEntrys();

      /******************************************/


      /* Print :: SELECT */

         $gallery->cols      = 'folder';
         $gallery->table     = $tbl_gallery;
         $gallery->condition = " id = '$_GET[gid]' ";
         $gallery->order     = '';
         $gallery->limit     = "1";
         $gallery->module    = '';
         $gallery->template  = '';

         $Tfolder[] = $gallery->row();

         unset($gallery);
  
      /******************************************/


      /* Get new subfolders */

         $subfolders = new readdirectory();
         $subfolders->directory = "gallery/";
         $results = $subfolders->listfolder('return');

         unset($subfolders);
 
      /******************************************/


      /* Check correct file formats */

         $dir_folder = "gallery/$Tfolder[0]/";

         if ( is_dir( $dir_folder ) )  { 
  
              $folder = new readdirectory();
              $folder->results = $Tfolder;
              $subfolder = $folder->checkformat('');

              if ( count($subfolder) == 0 )  {

                   $extended = 'true';

              }

              unset($folder);

         } 

         else  {

              $no_folder = $editgallery_select1." &laquo;".$Tfolder[0]."&raquo; ".$editgallery_select2;

              array_unshift($results, $no_folder); 

              $extended = 'true';

         }

      /*****************************/


      /* Print :: SELECT */

         $gallery = new SelectEntrys();
   
         $gallery->cols       = 'id, title, title_EN, description, description_EN, folder, date, visibility';
         $gallery->table      = $tbl_gallery;
         $gallery->condition  = " id = '$_GET[gid]' ";
         $gallery->order      = '';
         $gallery->limit      = "1";
         $gallery->module     = 'gallery';
         $gallery->template   = 'admin/editgallery.tpl';

         $gallery->subfolders = $results;

         $gallery->extended   = $extended;

         $gallery->row();
  
      /******************************************/


      /* Delete :: Object SELECT */

         unset($gallery);

      /******************************************/

  }