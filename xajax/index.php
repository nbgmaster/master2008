<?php


  $country = file_get_contents('http://api.hostip.info/country.php?ip='.$_SERVER['REMOTE_ADDR']);
 
  if ($country != 'US') {   

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
         $xajax->register(XAJAX_FUNCTION, "show_details");
         //$xajax->configure('debug', true);    
         //$xajax->setFlag('debug',true); 
         $xajax->configure('javascript URI', ROOT_DIR.'xajax/'); 
    
         // $tpl->assign("xajax_javascript",$xajax->getJavascript(ROOT_DIR.'xajax/'));
         $xajax->printJavascript();
         
      /******************************************/

      /* Load :: Page Content */

         $tpl->display("mainframe.tpl");
              
         if ( $module != "" )  { 
         
           $error_page = "modules/".$module."/";
             
  
           if ( is_dir( $error_page ) ) include("modules/$module/index.php");
           else $tpl->display("block_deactivated.tpl");
         
         }
    
      /******************************************/
         
      /* Load :: Footer Content */
    
          $tpl->display("footer.tpl");
    
      /******************************************/

  }