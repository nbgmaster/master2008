<?php

       $dir_thumbs = "gallery/$result[folder]/thumbs/";


       /* Load imagenames into array */ 

          if ( !$do && is_dir ( $dir_thumbs ) )  {

               $gallery = new readdirectory();

               $gallery->directory = $dir_thumbs;

               $pictures = $gallery->listfolder('return');

               $a = 1;
               $b = 1;
               $count = 1;
  
               while ( $a > 0 )  { 

                       $keys1 = array_rand($pictures, 1);
                       $img1  = "$dir_thumbs/$pictures[$keys1]";

                       $imgsize1 = getimagesize($img1); 

                       if ($imgsize1[1] <= 90) $a = 0;
                       
                       $save_height = $imgsize1[1];
                       
                       if ($count > count($pictures)) break;
                       
                       $count++;

               }

               /*while ( $b > 0 )  { 

                       $keys2 = array_rand($pictures, 1);
                       $img2  = "$dir_thumbs/$pictures[$keys2]";
   
                       $imgsize2 = getimagesize($img2); 

                       if ($imgsize2[1] <= 90) $b = 0;

               }*/

               unset($gallery);

          }
 
       /******************************************/
       
       $result["date_formatted"] = convert_date($result["date_formatted"], '');
        
       if ($module != 'admin' && $lang_active == 'EN') $result[title]       = $result[title_EN];
       if ($module != 'admin' && $lang_active == 'EN') $result[description] = $result[description_EN];
 
       if ($module != 'admin') $result[description] = nl2br($result[description]);
      
            
       if ( isset($save_pages) ) { 
      
           $tpl->assign("array_p", $save_pages);
           $lastpage = end($save_pages);
           $tpl->assign("pagesT", $lastpage['page']);
           $tpl->assign("title_pagenavi", $gal_navi);
    
       }
   
       $tpl->assign("page", $page);
       
       $b_timestamp = $result["date"];
       
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
       
       require_once('./lib/replace.php');
       
       if ($module != 'admin') {

           $result['description']       = replaceBBcode($result['description'], $set[0]["width_images"], 0);
           $result['description_EN']    = replaceBBcode($result['description_EN'], $set[0]["width_images"], 0);
       
       }
              
       $this->array[] = array('thisid'          => $result[id],
                              'title'           => $result[title], 
                              'title_EN'        => $result[title_EN], 
                              'description'     => $result[description], 
                              'description_EN'  => $result[description_EN], 
                              'folder'          => $result[folder], 
                              'date_formatted'  => $result[date_formatted], 
                              'too_early'       => $too_early,
                              'visibility'      => $result[visibility],
                              'preview1'        => $pictures[$keys1],
                              'preview2'        => $pictures[$keys2]
                              );
                              
       $tpl->assign("Tsubfolder", $result[folder]);

