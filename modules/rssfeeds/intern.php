<?php

  /* Load :: Database connection */

     require_once("../../dbCon.php");

  /******************************************/

              
  /* Get Setting Values */

     include('../../settings/tables.php');
     require_once('../../lib/select.php');
     
     $settings = new SelectEntrys();

     $settings->cols      = 'root_dir';
     $settings->table     = $tbl_settings;
     $settings->condition = " id = '1' ";
     $settings->multiSelect = 1;

     $set = $settings->row();

     unset($settings);
     
     define("ROOT_DIR", $set[0]["root_dir"]);

  /******************************************/


  /* Initialize and Load :: Choosen Language */
  
        if ( !$_COOKIE["lang"] )  {
        
             switch ( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ) {
                      case 'de': $lang_browser = "DE"; break;
                      case 'en': $lang_browser = "EN"; break; 
                      default:   $lang_browser = "DE";
             }
             
        }
  
        if ( $_COOKIE["lang"] == '2' || $lang_browser == 'DE' ) $lang = "DE";

        else if ( $_COOKIE["lang"] == '3' || $lang_browser == 'EN' ) $lang = "EN";

  /******************************************/
    
  
  /* print :: XML file */
  
       if ($_GET['m'] == 'blog') {
           if ($lang != "") $xml_content = file_get_contents("../../media/rss/blog_$lang.xml");
           else $xml_content = file_get_contents("../../media/rss/blog_DE.xml");
       }
       if ($_GET['m'] == 'gallery') {
           if ($lang != "") $xml_content = file_get_contents("../../media/rss/gallery_$lang.xml");
           else $xml_content = file_get_contents("../../media/rss/gallery_DE.xml");
       }
       
       print_r($xml_content);
    
  /******************************************/