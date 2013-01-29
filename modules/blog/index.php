<?php

   if ( $block["home"]["status"] == 1 )  {

          /* Load :: Page Navigation */

             require_once('./lib/pagenavi.php');

             $naviObj = new pagenavi();

             $naviObj->tableE     = $tbl_blog;      // required
             if ($Myadmin == 1) $naviObj->conditionE = " deleted = '0' ";
             else $naviObj->conditionE = " deleted = '0' AND visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
             
             $TotalRows = $naviObj->exist();
             
             $max_pages = ceil($TotalRows / $set[0]["perpage_blog"]);

             if (is_numeric($page) && $page <= $max_pages) {

                   if ( $TotalRows > $set[0]["perpage_blog"] )  {
      
                        $naviObj->totalrows = $TotalRows;
      
                        $titleG = $TotalRows." ".$blog_numbers;
      
                        $naviObj->title = $titleG;
      
                        $naviObj->showperpage = $set[0]["perpage_blog"];
      
                        $naviObj->link = ROOT_DIR.'blog/';    // required
        
                        $save_pages = $naviObj->rowpages($page);  // global parameter, defined in config.php
      
                   } 
      
                   unset($naviObj);
      
                /******************************************/
      
      
                /* Load :: blog Content */

                   include('show.php');
      
                /******************************************/
                
            }
            
            // error page
   
            else {
              $tpl->display("linespacer.tpl");
              $tpl->display("block_deactivated.tpl");
            }

  }

  else  {

             $tpl->display("block_deactivated.tpl");

  }
