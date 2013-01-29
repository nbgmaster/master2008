<?php

  //$country = file_get_contents('http://api.hostip.info/country.php?ip='.$_SERVER['REMOTE_ADDR']);
 
//  if ($country != 'US') {   

      /* Load :: Configuration settings */
    
         include('settings/config.php');
    
      /******************************************/
    
    
      /* Download Attachment */
    
         if ( isset($_GET['fid']) )  {
    
              require_once('lib/download.php');
    
              download ($_GET['fid'], 'attachments', 'blog');
    
         }
         
      /******************************************/
    
    
      /* Load :: Header Content */
    
         $tpl->display("header.tpl");
         
         include('php/js_root_dir.php');
    
      /******************************************/
                       
      
      /* XAJAX :: Register Object AND Functions */
    
         $xajax = new xajax(ROOT_DIR."index.server.php");
         //$xajax->registerFunction("page");
         
         $xajax->register(XAJAX_FUNCTION, "move");
         $xajax->register(XAJAX_FUNCTION, "page");
         $xajax->register(XAJAX_FUNCTION, "delete");
         $xajax->register(XAJAX_FUNCTION, "edit_comment");
         //$xajax->configure('debug', true);    
         //$xajax->setFlag('debug',true); 
         $xajax->configure('javascript URI', ROOT_DIR.'xajax/'); 
    
         // $tpl->assign("xajax_javascript",$xajax->getJavascript(ROOT_DIR.'xajax/'));
         $xajax->printJavascript();
         
      /******************************************/
                
    
      /* Load :: Left Frame Content */
    
                 $tpl->display("div_top.tpl");  // Styling correction
    
              /* Twitter message */
                  
                 if ( $block["twitter"]["status"] == 1 )  {
    
                      $tpl->display("twitter.tpl");  
                       
                 }
    
              /************/
                  
              
              /* Settings :: Design AND Language */
    
                 if ( $block["settings"]["status"] == 1 )  {
    
                      include("modules/blocks/settings.php");
    
                 }
    
              /************/
    
    
              /* Loginbox */
    
                 include("modules/logon/index.php");
    
              /************/
    
    
              /* Current Profile */
    
                 if ( $block["shortprofile"]["status"] == 1 )  {
    
                     include("modules/blocks/shortprofile.php");
    
                 }
    
              /************/
    
                   
              /* Blog messages */
    
                 if ( $block["blog"]["status"] == 1 )  {
              
                       if ($lang_active == "DE") $rss_url = ROOT_DIR.'media/rss/blog_DE.xml';
                       if ($lang_active == "EN") $rss_url = ROOT_DIR.'media/rss/blog_EN.xml';
                       
                       $max_number = $set[0]['rss_intern_left_totalentries'];                                          
                       include("modules/rssfeeds/extern.php");
                       
                       $tpl->assign("rss_title", $rss_blog); 
                       $tpl->assign("blank", false);
                       $tpl->display("rssfeed_intern.tpl");
                       
                 }
    
              /************/
              
    
              /* Blog messages */
                              
                 if ( $block["blog_comments"]["status"] == 1 )  {  
                 
                      include("modules/blocks/blog_comments.php");             
    
                 }
                 
              /************/
               
    
              /* RSS Feeds */
    
                 if ( $block["rss"]["status"] == 1 )  {
                 
                      if ($lang_active == "DE") { 
                          $rss_url = $set[0]["rss_german_url"];              
                          $tpl->assign("rss_title", $set[0]["rss_german_title"]); 
                      }
                      if ($lang_active == "EN") {
                          $rss_url = $set[0]["rss_english_url"];
                          $tpl->assign("rss_title", $set[0]["rss_english_title"]);
                      }
        
                      $max_number = $set[0]['rss_extern_totalentries'];                  
                      include("modules/rssfeeds/extern.php");
                      
                      $tpl->assign("blank", true);
               
                      $tpl->display("rssfeed_extern.tpl");
    
                 }
    
              /************/
    
                                              
              /* Quicklinks */
    
                 if ( $block["quicklinks"]["status"] == 1 )  {
                     
                      include("modules/blocks/quicklinks.php");
    
                 }
    
              /************/
    
    
              /* Visiter Stats */
    
                 if ( $block["visiter"]["status"] == 1 )  {
    
                      $tpl->display("visiter.tpl"); 
    
                 }
    
              /************/
                                
              
                 $tpl->display("div_bottom.tpl");  // Styling correction
    
      /******************************************/
    
    
      /* Load :: Page Content */
    
         $tpl->display("rightframe.tpl");
         
         $error_page = "modules/".$module."/";
         
         if ( is_dir( $error_page ) ) include("modules/$module/index.php");
         else $tpl->display("block_deactivated.tpl");
    
      /******************************************/
         
      /* Load :: Footer Content */
    
         $tpl->display("footer.tpl");
    
      /******************************************/

//  }