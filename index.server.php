<?php

  include("settings/index.common.php");
     
  /******************************************/
  
  function edit_comment( $aFormValues, $cid, $bid, $pageid, $TotalRows ) {
  
     $objResponse = new xajaxResponse();  
       
     include('settings/config.php');     
     include('settings/tables.php');
     include('settings/template.php');
     require_once('lib/modify.php');    
     require_once('lib/select.php');
     
     $name_str    = 'name_'.$cid;
     $comment_str = 'comment_'.$cid;

     $nam = utf8_decode($aFormValues[$name_str]);
     $com = utf8_decode($aFormValues[$comment_str]);
                         
     $comment = new ModifyEntry();    
     $comment->table     = $tbl_blog_comments;
     $comment->changes   = " name = '$nam', comment = '$com'";
     $comment->condition = " id = '$cid' ";

     $comment->update();

     unset($comment);

     $objResponse->loadcommands(page($tbl_blog_comments,$bid,$pageid,$TotalRows));
          
     return $objResponse;  
               
  }
    
  function delete( $table, $bid, $cid, $pageid, $TotalRows ) {
  
     $objResponse = new xajaxResponse();  
                            
     include('settings/config.php');     
     include('settings/tables.php');
     include('settings/template.php');
     require_once('lib/modify.php');          

     if ( $table == $tbl_blog_comments )  { 
     
          $comment = new ModifyEntry();
          $comment->table     = $tbl_blog_comments;
          $comment->changes   = " deleted = '1' ";
          $comment->condition = " id = '$cid' ";
 
          $comment->update();

          unset($comment);
 
     }
     
     $TotalRows = $TotalRows - 1;
     
     $max_pages = ceil($TotalRows / $set[0]["perpage_comments"]);
     
     if ($pageid > $max_pages) $pageid = $pageid - 1;
        
     $p_name = "p_num_".$bid;
    
     $objResponse->assign($p_name,"innerHTML",$TotalRows);

     if ($max_pages == 0) {
    
         $p_main = "p_comments_".$bid; 
         $p_out  = "p_page_".$bid; 
         $p_out2 = "p_page2_".$bid; 

         $objResponse->remove($p_main);
         $objResponse->remove($p_out);
         $objResponse->remove($p_out2);
                                   
     } 

    else $objResponse->loadcommands(page($table,$bid,$pageid,$TotalRows));

    return $objResponse;  
     
  }
  
  function page( $table, $bid, $pageid, $TotalRows ) {

     global $tpl; 

     $objResponse = new xajaxResponse();  
                            
     include('settings/config.php');     
     include('settings/tables.php');
     include('settings/template.php');
     require_once('lib/select.php');
     require_once('lib/pagenavi.php');
     
     if ( $table == $tbl_blog_comments )  {

          $max_pages = ceil($TotalRows / $set[0]["perpage_comments"]);
          
          if ( is_numeric($pageid) == false) {

               if ($pageid == 'first') $pageid = 1;
               if ($pageid == 'last')  $pageid = $max_pages;

          } 
          

          $begin_c = ( $pageid - 1 ) * $set[0]["perpage_comments"];

           /* Print :: SELECT :: Comments */
                        
               $comments              = new SelectEntrys();
               $comments->cols        = 'id, bid, time, name, comment, lang';
               $comments->table       = $tbl_blog_comments;
               $comments->condition   = "bid = '$bid' AND deleted = '0'";
               $comments->order       = "time DESC";
               $comments->limit       = "$begin_c, " . $set[0]['perpage_comments'];
               $comments->multiSelect = 1;
               //$comments->br          = 1;           
               $array_com[] = $comments->row(); 
      
               unset($comments);
      
           /******************************************/   
      
      
           /* Modify Comment Array */
            
              foreach ($array_com as $array_com2)  {
            
                 for ( $b = 0; $b < count($array_com2); $b++)  {    
                  
                       //replace url links                
                       $array_com2[$b]['comment'] = str_replace("www.","http://www.",$array_com2[$b]['comment']);
                       $array_com2[$b]['comment'] = str_replace("http://http://","http://",$array_com2[$b]['comment']);
                       //$array_com2[$b]['comment'] = preg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\" class='postedlink' target='_blank'>\\0</a>", $array_com2[$b]['comment']);    
              
                       //avoid layout damage
                       $array_com2[$b]['comment'] = wordwrap($array_com2[$b]['comment'], 60, " ", 1);
                                           
                       //decoding
                       $array_com2[$b]['comment'] = utf8_encode( $array_com2[$b]['comment']);

                       //line breaks
                       $array_com2[$b]['comment_unformatted'] = $array_com2[$b]['comment'];
                       $array_com2[$b]['comment'] = nl2br($array_com2[$b]['comment']);
                                                                              
                }
            
                $array_com3[] = $array_com2;
            
              } 
                         
           /******************************************/   

 
          /* Generate Pagenavi for comments */
            
             $naviObj = new pagenavi();
        
             $naviObj->tableE     = $tbl_blog_comments;      // required
             $naviObj->conditionE = "bid = '$bid' AND deleted = '0'";
         
             if (is_numeric($pageid) && $pageid <= $max_pages) { 

                   if ( $TotalRows > $set[0]["perpage_comments"] )  {
        
                        $naviObj->totalrows = $TotalRows;

                        $naviObj->showperpage = $set[0]["perpage_comments"];
        
                        $pages_c = $naviObj->rowpages($pageid);  // global parameter, defined in config.php
        
                   } 
        
                   unset($naviObj);
                   
             }
                             
             if ($TotalRows == $set[0]['perpage_comments']) {

                  $p_in   = "p_cpages_".$bid; 
                  $p_in2  = "p_cpages2_".$bid;          
                  $p_out  = "p_page_".$bid; 
                  $p_out2 = "p_page2_".$bid; 
          
                  $objResponse->remove($p_in);
                  $objResponse->remove($p_in2);

                  $objResponse->assign($p_out,"innerHTML",'&nbsp;');
                  $objResponse->assign($p_out2,"innerHTML",'&nbsp;');
                                 
            }
        
          /******************************************/


          /* Generate output */

           $tpl->assign('array_com', $array_com3); 
           $tpl->assign('xajax_bid', $bid); 
           $tpl->assign('pages_c', $pages_c);
           $tpl->assign('blog_id', $bid);
           $tpl->assign('com_total', $TotalRows);
           $tpl->assign('page_id', $pageid);
           $tpl->assign('Myadmin', $Myadmin);
                      
           $html  = $tpl->fetch("blog/comments_show.tpl");

           $html2 = $tpl->fetch("pagenavi_ajax.tpl");
           
           $p_name  = "p_comments_".$bid;
           $p_name2 = "p_cpages_".$bid;
           $p_name3 = "p_cpages2_".$bid;

           $objResponse->assign($p_name,"innerHTML",$html);
           
           if ($TotalRows > $set[0]['perpage_comments']) $objResponse->assign($p_name2,"innerHTML",$html2);
           if ($TotalRows > $set[0]['perpage_comments']) $objResponse->assign($p_name3,"innerHTML",$html2);
           
          /******************************************/
                                
      }
 
      return $objResponse;
                       
  }

  
  function move( $direction, $table, $position, $cid ) {

     global $tpl;

     $objResponse = new xajaxResponse();

  /* Distinguish between up and down movement */

     if ( $direction == "up" ) {

          $delimiter = "<"; $order = "DESC";
          //$modify1 = "position = position-1";
          //$modify2 = "position = position+1";

     }

     else {

          $delimiter = ">"; $order = "ASC";
          //$modify1 = "position = position+1";
          //$modify2 = "position = position-1";
     }

  /***********************************/


  /* Let's move */

     require_once('lib/select.php');
     require_once('lib/modify.php');

     $select = new SelectEntrys();

     $select->table      = $table;
     $select->cols       = 'position';
     $select->condition  = " position $delimiter '$position' ";
     if ($cid)  $select->condition   .= " AND cid = '$cid' ";    
     $select->order      = "position $order"; 
     $select->limit      = '1';
     $select->module     = '';
     $select->template   = '';

     $position_less      = $select->row();

     $select->cols       = 'id';
     $position_less_id   = $select->row();

     $update = new ModifyEntry();
     $update->table     = $table;
          
     if ($position > 1 && $direction == "up" || $position_less > 0 && $direction == "down")  {

          $update->condition = " position = '$position' ";
          if ($cid)  $update->condition   .= " AND cid = '$cid' ";
          $update->changes   = " position = '$position_less' ";
          $update->update();

          $update->condition = " id = '$position_less_id' ";
          if ($cid)  $update->condition   .= " AND cid = '$cid' "; 
          $update->changes   = " position = '$position' ";     
          $update->update();

     }

     unset($select);
     unset($update);

  /***********************************/


  /* Get data in new order */
  
     require_once('settings/config.php');    
     require_once('settings/tables.php');
     require_once('settings/template.php');

     if ( $table == $tbl_profile )  {

             $profile = new SelectEntrys();

             $profile->cols      = 'id, german, english, value, value_EN, position';
             $profile->table     = $table;
             $profile->order     = 'position';
             $profile->multiSelect = '1';

             $tpl->assign('array_profile', $profile->row());

             unset($profile);

             $html = $tpl->fetch("shortprofile_content.tpl");
             $objResponse->assign("layout_navi_profile","innerHTML",$html);

             $html = $tpl->fetch("admin/settings_profile_fields.tpl");
             $objResponse->assign("layout_set_profile","innerHTML",$html);

     }

     if ( $table == $tbl_ref )  {

             $ref = new SelectEntrys();

             $ref->cols      = 'id, link, description, description_EN, position';
             $ref->table     = $table;
             $ref->order     = 'position';
             $ref->multiSelect = '1';

             $tpl->assign('array_ref', $ref->row());

             unset($ref);

             $html = $tpl->fetch("quicklinks_content.tpl");
             $objResponse->assign("layout_navi_ref","innerHTML",$html);

             $html = $tpl->fetch("admin/settings_quicklinks_fields.tpl");
             $objResponse->assign("layout_set_ref","innerHTML",$html);

     }

     if ( $table == $tbl_design )  {

             $design = new SelectEntrys();

             $design->cols      = 'id, german, english, hexcode, imgfolder, position';
             $design->table     = $table;
             $design->order     = 'position';
             $design->multiSelect = '1';

             $tpl->assign('array_design', $design->row());

             unset($design);

             $html = $tpl->fetch("set_design.tpl");
             $objResponse->assign("layout_navi_design","innerHTML",$html);

             $html = $tpl->fetch("admin/settings_design_fields.tpl");
             $objResponse->assign("layout_set_design","innerHTML",$html);

             $objResponse->includeScript("js/change_settings.js");
             $objResponse->call("reload_tpl");

     }

     if ( $table == $tbl_links_c )  {
     
             $links_c = new SelectEntrys();
    
             $links_c->cols      = ' id, german, english, position, visibility ';
             $links_c->table     = $tbl_links_c;
             $links_c->order     = "position";
             $links_c->multiSelect = '1';
    
             $array_c = $links_c->row();
    
             unset($links_c);
    
             $tpl->assign('array_c', $array_c);

             $html = $tpl->fetch("admin/links_c.tpl");
             $objResponse->assign("layout_links_c","innerHTML",$html);

     }

     if ( $table == $tbl_links )  {

             $links_l = new SelectEntrys();

             $links_l->cols      = 'id, cid, link, description, description_EN, position, visibility';
             $links_l->table     = $table;
             $links_l->condition = "cid = '$cid' ";  // due to performance concerns
             $links_l->order     = 'cid, position';
             $links_l->multiSelect = '1';
             
             $array_l = $links_l->row();
             
             foreach( $array_l as $array1 => $array2)  {
    
                      $array[$array2["cid"]][$array2["id"]] = array( 'id'            => $array2["id"],
                                                                    'cid'            => $array2["cid"],
                                                                    'link'           => $array2["link"],
                                                                    'description'    => $array2["description"],
                                                                    'description_EN' => $array2["description_EN"],
                                                                    'position'       => $array2["position"],
                                                                    'visibility'     => $array2["visibility"]
                                                                   );
    
             }  
        
             $tpl->assign("this", $cid);
             $tpl->assign("array", $array);

             unset($links_l);

             $html = $tpl->fetch("admin/links_l.tpl");
             $p_name = "layout_links_l_".$cid;
             $objResponse->assign($p_name,"innerHTML",$html);

     }
     
     return $objResponse;

  /***********************************/

  }

  $xajax->processRequest();

  unset($xajax);
  unset($objResponse);
