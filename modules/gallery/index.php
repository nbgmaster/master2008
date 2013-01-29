<?php

  if ( $block["gallery"]["status"] == 1 )  {
      
        require_once('./lib/pagenavi.php');
        require_once('./lib/select.php');
      
        /* Create Object :: SELECT */
      
           $gallery = new SelectEntrys();
      
        /******************************************/
      
        if ( $_GET[gid] )  {
      
            /* Print :: SELECT */
      
               $gallery->cols      = 'folder';
               $gallery->table     = $tbl_gallery;
               $gallery->condition = " id = '$_GET[gid] ' ";
               $gallery->order     = '';
               $gallery->limit     = "";
               $gallery->module    = '';
               $gallery->template  = '';
      
               $folder = $gallery->row();

               $gallery->cols      = 'title';
      
               $title = $gallery->row();
               $tpl->assign('titleG', $title);   
      
            /******************************************/
            
            if ($folder != '')  {
            
                /* Directorys of the images and thumbs */
          
                   $dir_images = "gallery/$folder/images/";
                   $dir_thumbs = "gallery/$folder/thumbs/";
          
                /******************************************/
          
          
                /* Load imagenames into array and sort it */
          
                   $gallery->directory = $dir_thumbs;
                   $pictures = $gallery->listfolder('return');
          
                   sort($pictures);
                   natsort($pictures);
          
                /******************************************/
          
          
                /* Load :: Page Navigation */
           
                   $naviObj = new pagenavi();
          
                   $TotalRows = count ($pictures);
                   
                   $max_pages = ceil($TotalRows / $set[0]["perpage_thumbs"]);

                   if (is_numeric($page) && $page <= $max_pages) { 
                           
                           if ( $TotalRows > $set[0]["perpage_thumbs"] )  { 
                         
                                $naviObj->totalrows = $TotalRows;
                  
                                $naviObj->showperpage = $set[0]["perpage_thumbs"];
                  
                                $naviObj->title = $title;
                  
                                $naviObj->link = ROOT_DIR."gallery/".$_GET[gid]."/";    // required
                    
                                $save_pages = $naviObj->rowpages($page); // global parameter, defined in config.php
                                
                           }
            
                           unset($naviObj); 
                  
                        /******************************************/
                  
                  
                        /* Show only the pictures for the particular side */
                  
                            $t = 0;
                  
                            $pager = $page - 1;
                  
                            $begin = $pager * $set[0]["perpage_thumbs"];
                            $end   = $begin + $set[0]["perpage_thumbs"];
                  
                            foreach ( $pictures as $whichtoshow )  {
                  
                                      if ( $t >= $begin ) $pictures2[$t] = $whichtoshow;
                  
                                      $t++;
                  
                                      if ( $t == $end ) break;
                  
                            }
                  
                            $pictures = $pictures2;
                  
                        /******************************************/
                        
                    }
                    
                    // error page
                    else $tpl->display("block_deactivated.tpl");
            
            }
            
            // error page
            else $tpl->display("block_deactivated.tpl");
      
        }
      
        if ( $_GET[gid] && !$_GET[pid] )  {

            if ($folder != ''&& $page <= $max_pages)  {
            
               $gallery = new SelectEntrys();             
               $gallery->cols      = "visibility, UNIX_TIMESTAMP(date) ";
               $gallery->table     = $tbl_gallery;
               $gallery->condition = " id = '$_GET[gid] ' ";
               $gallery->multiSelect = 1;
               $gal_settings = $gallery->row();

               $time_u = "UNIX_TIMESTAMP(date)";

               if (($gal_settings[0]["visibility"] == 1 AND $gal_settings[0][$time_u] < $timestamp) || $Myadmin == 1) {
              
                    /* Display Thumbs */
                    
                       if ( isset($save_pages) ) {
          
                            $tpl->assign("array_p", $save_pages);
                            $lastpage = end($save_pages);
                            $tpl->assign("pagesT", $lastpage['page']);
                            $tpl->assign("title_pagenavi", $gal_navi);
                
                       }
                    
                    /******************************************/
                    
                    /* Display Thumbs */
                             
                       $tpl->assign('gid', $_GET[gid]); 
                       $tpl->assign('directory', $dir_thumbs);
                       $tpl->assign('directoryI', $dir_images);    
                       $tpl->assign('page', $page);  
                       $tpl->assign('array', $pictures);  
              
                       $tpl->display('gallery/thumbs.tpl');
                   
                    /******************************************/
              
              
                    /* Delete :: Object SELECT */
              
                       unset($gallery);
              
                    /******************************************/
                
                }
                
                else $tpl->display('block_deactivated.tpl');
            
            }
      
        }
      
        else if ( $_GET[gid] && $_GET[pid] )  {
      
               /* Display selected picture */
      
                  $pictureid = $_GET[pid] - 1;
      
                  $picture = $pictures[$pictureid]; 
      
                  $destination = $dir_images.$picture;
      
                  $tpl->assign('picture', $destination);  
      
                  $tpl->display('gallery/showpicture.tpl');
      
        }
      
        else if ( !empty($_POST['submit_del']) && $logon_true == '1' && $str )  {
      
             /* Create Object :: DELETE */
             
                require_once('./lib/modify.php');
                
                $gallery = new ModifyEntry();
      
             /******************************************/
      
      
             /* Create Object :: SELECT */
      
                $getfolder = new SelectEntrys();
      
             /******************************************/
      
      
             /* Create Object :: Readdirectory */
      
                $thumbs = new readdirectory();
      
             /******************************************/
      
      
             /* Print :: SELECT */
      
                $getfolder->cols      = 'folder';
                $getfolder->table     = $tbl_gallery;
                $getfolder->condition = " id = '$_POST[gid]' ";
                $getfolder->order     = '';
                $getfolder->limit     = "1";
                $getfolder->module    = '';
                $getfolder->template  = '';
      
                $folder = $getfolder->row();
        
             /******************************************/
      
      
             /* Delete :: Object SELECT */
       
                unset($getfolder);
      
             /******************************************/
      
      
             /* Directory of the images and thumbs */
             
                $dir_images = "gallery/$folder/images/";      
                $dir_thumbs = "gallery/$folder/thumbs/";
      
             /******************************************/
      
             /* Clear images directory */ 
      
                $thumbs->directory = $dir_images;
                $thumbs->listfolder('clear');
      
                rmdir("gallery/$folder/images"); 
      
             /******************************************/
                   
             /* Clear thumbs directory */ 
      
                $thumbs->directory = $dir_thumbs;
                $thumbs->listfolder('clear');
      
                rmdir("gallery/$folder/thumbs"); 
      
             /******************************************/
      
      
             /* Delete entry */
      
                $gallery->table     = $tbl_gallery;
                $gallery->condition = " id = '$_POST[gid]' ";
      
                $gallery->delete();
      
             /******************************************/
      
      
             /* Delete :: Object INSERT */
      
                unset($gallery);
      
             /******************************************/
      
      
             /* Get total rows */
             
                $gallery     = new CheckExist();
                $gallery->tableE     = $tbl_gallery;
                $gallery->conditionE = "";
      
                $TotalRows = $gallery->exist();
      
                unset($gallery);
 
             /******************************************/
      
      
             /* Load :: Updated Main Content */
             
                if (!isset ($_GET['page']) ) $page_current = '1';
                else $page_current = $_GET['page'];
 
                $max_pages = ceil($TotalRows / $set[0]["perpage_gallery"]);

                if ($max_pages > 1 && $page_current <= $max_pages) $page_url = 'gallery/page/'.$page_current.'/';
                else if ($max_pages > 1 && $page_current > $max_pages) $page_url = 'gallery/page/'.$max_pages.'/';
                else $page_url = 'gallery/';
     
                header ("Location:".ROOT_DIR.$page_url);

             /******************************************/
      
        }
      
        else  {
      
             /* Load :: Page Navigation */
      
                $naviObj = new pagenavi();
      
                $naviObj->tableE     = $tbl_gallery;      // required
                if ($Myadmin == 1)  $naviObj->conditionE = "";
                else $naviObj->conditionE = " visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
      
                $TotalRows = $naviObj->exist(); 
                 
                $max_pages = ceil($TotalRows / $set[0]["perpage_gallery"]);

                if (is_numeric($page) && $page <= $max_pages) {
      
                        if ( $TotalRows > $set[0]["perpage_gallery"] )  { 
              
                             $naviObj->totalrows = $TotalRows;
              
                             $titleG = $TotalRows." ".$gal_numbers;
              
                             //$naviObj->title = '';
              
                             $naviObj->showperpage = $set[0]["perpage_gallery"];
              
                             $naviObj->link = ROOT_DIR."gallery/page/";    // required
                
                             $save_pages = $naviObj->rowpages($page);  // global parameter, defined in config.php
              
                        }
              
                        unset($naviObj); 
              
                    /******************************************/
              
     
                    /* Print :: SELECT */

                       $gallery->cols      = "id, title, title_EN, description, description_EN, folder, date, DATE_FORMAT(date,'%d. %m %Y') as date_formatted, visibility";
                       $gallery->table     = $tbl_gallery;
                       if ($Myadmin == 1)  $gallery->condition = '';
                       else $gallery->condition = " visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
                       $gallery->order     = 'date DESC, id DESC';
                       $gallery->limit     = $begin.", ".$set[0]["perpage_gallery"];
                       $gallery->module    = 'gallery';
                       $gallery->template  = 'gallery/index.tpl';
              
                       $gallery->row();
              
                    /******************************************/
              
              
                    /* Delete :: Object SELECT */
              
                       unset($gallery);
              
                    /******************************************/
                    
                }
                
                // error page
                else $tpl->display("block_deactivated.tpl");
      
        }
  
  }
  
  else  {

             $tpl->display("block_deactivated.tpl");

  }

