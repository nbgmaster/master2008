<?php

  if ( $Myadmin == 1 )  {

        require_once('./lib/modify.php');
        
        if ( isset($submit_blocks) || isset($submit_blocks_x) )  {

            /* Update block on/off settings */

               $blocks_edit = new ModifyEntry();
               $blocks_edit->table = $tbl_blocks;

               $blocks_edit->changes   = " status = '0' ";
               $blocks_edit->update();

               foreach( $_POST["block_status"] as $array1 => $array2)  {

                         $blocks_edit->condition = " id = '$array1' ";
                         $blocks_edit->changes   = " status = '1' ";
                         $blocks_edit->update();

               }

               unset($blocks);

               $anker = "#blocks";

            /******************************************/

        }

        else if ( isset ($submit_misc) || isset($submit_misc_x) )  {

            /* Update misc entries */

               $up_set = new ModifyEntry();

               $up_set->table     = $tbl_settings;
               $up_set->changes   = " root_dir = '$_POST[root_dir]', title_hp = '$_POST[title_hp]', title_hp_EN = '$_POST[title_hp_EN]', main_title = '$_POST[main_title]', main_title_EN = '$_POST[main_title_EN]', main_description = '$_POST[main_description]', main_description_EN = '$_POST[main_description_EN]', keywords = '$_POST[keywords]', contact_mail = '$_POST[contact_mail]', perpage_blog = '$_POST[perpage_blog]', perpage_comments = '$_POST[perpage_comments]', perpage_gallery = '$_POST[perpage_gallery]', perpage_thumbs = '$_POST[perpage_thumbs]', perpage_users = '$_POST[perpage_users]', width_images = '$_POST[width_images]', height_images_max = '$_POST[height_images_max]', width_thumbs = '$_POST[width_thumbs]', height_thumbs_max = '$_POST[height_thumbs_max]', rss_german_url = '$_POST[rss_german_url]', rss_german_title = '$_POST[rss_german_title]', rss_english_title = '$_POST[rss_english_title]', rss_english_url = '$_POST[rss_english_url]', rss_extern_totalentries = '$_POST[rss_extern_totalentries]', rss_intern_totalentries = '$_POST[rss_intern_totalentries]', rss_msg_length = '$_POST[rss_msg_length]', rss_intern_left_totalentries = '$_POST[rss_intern_left_totalentries]', time_ban = '$_POST[time_ban]', del_old_visiters = '$_POST[del_old_visiters]', time_new_visiter = '$_POST[time_new_visiter]', twitter = '$_POST[twitter]', twitter_EN = '$_POST[twitter_EN]' ";
               if ($_POST['twitter'] != $set[0]["twitter"] || $_POST['twitter_EN'] != $set[0]["twitter_EN"]) $up_set->changes .= ", twitter_time = '$timestamp' ";
              
               $up_set->condition = " id = '1' ";

               $up_set->update();
               
               $set[0]['rss_intern_totalentries'] = $_POST['rss_intern_totalentries'];
               $set[0]['rss_msg_length'] = $_POST['rss_msg_length'];
                 
               $set[0]['perpage_blog'] = $_POST['perpage_blog'];
               include('update_rss_blog.php');

               $set[0]['perpage_gallery'] = $_POST['perpage_gallery'];
               include('update_rss_gallery.php');
               
            /******************************************/


            /* Delete :: Object INSERT */

               unset($up_set);

               $anker = "#misc";

            /******************************************/

        }

     /* Load :: Other modifications */

        else if ( isset ($submit_profile) || isset($submit_profile_x) )       { include("set_profile.php");     $anker = "#profile"; }
        else if ( isset ($submit_references) || isset($submit_references_x) ) { include("set_quicklinks.php");  $anker = "#quicklinks"; }
        else if ( isset ($submit_design) || isset($submit_design_x) )         { include("set_design.php");      $anker = "#design"; }

     /******************************************/


     /* Load :: Updated Main Content */

        if ( isset ($submit_blocks) || isset($submit_blocks_x) || isset ($submit_misc) || isset($submit_misc_x) || isset ($submit_profile) || isset($submit_profile_x) || isset ($submit_references) || isset($submit_references_x) || isset ($submit_design) || isset($submit_design_x) ) {

             header ("Location:".ROOT_DIR."admin/settings/$anker");

        }

     /******************************************/

       else  {  

         /* General settings */

            $tpl->assign("form_nopreview", "1");

            $tpl->assign("f_title_hp", $set[0]["title_hp"]);
            $tpl->assign("f_title_hp_EN", $set[0]["title_hp_EN"]);
            $tpl->assign("f_main_title", $set[0]["main_title"]);
            $tpl->assign("f_main_title_EN", $set[0]["main_title_EN"]);
            $tpl->assign("keywords", $set[0]["keywords"]);
            $tpl->assign("contact_mail", $set[0]["contact_mail"]);
            $tpl->assign("perpage_blog", $set[0]["perpage_blog"]);
            $tpl->assign("perpage_comments", $set[0]["perpage_comments"]);
            $tpl->assign("perpage_gallery", $set[0]["perpage_gallery"]);
            $tpl->assign("perpage_thumbs", $set[0]["perpage_thumbs"]);
            $tpl->assign("perpage_users", $set[0]["perpage_users"]);
            $tpl->assign("width_images", $set[0]["width_images"]);
            $tpl->assign("height_images_max", $set[0]["height_images_max"]);
            $tpl->assign("height_thumbs_max", $set[0]["height_thumbs_max"]);
            $tpl->assign("width_thumbs", $set[0]["width_thumbs"]);
            $tpl->assign("rss_german_title", $set[0]["rss_german_title"]);
            $tpl->assign("rss_german_url", $set[0]["rss_german_url"]);
            $tpl->assign("rss_english_title", $set[0]["rss_english_title"]);
            $tpl->assign("rss_english_url", $set[0]["rss_english_url"]);
            $tpl->assign("time_ban", $set[0]["time_ban"]);          
            $tpl->assign("del_old_visiters", $set[0]["del_old_visiters"]);
            $tpl->assign("time_new_visiter", $set[0]["time_new_visiter"]);
            $tpl->assign("twitter_msg", $set[0]["twitter"]);
            $tpl->assign("twitter_EN_msg", $set[0]["twitter_EN"]);
            $tpl->assign("rss_intern_totalentries", $set[0]["rss_intern_totalentries"]);
            $tpl->assign("rss_extern_totalentries", $set[0]["rss_extern_totalentries"]);
            $tpl->assign("rss_intern_left_totalentries", $set[0]["rss_intern_left_totalentries"]);
            $tpl->assign("rss_msg_length", $set[0]["rss_msg_length"]);           
      
         /******************************************/


         /* Select :: Complete Data */

            require_once('./lib/tpl_dbaccess.php');

            $tpl->register_resource("db", array("db_template_blocks","db_timestamp","db_secure","db_trusted"));

            $profile = new SelectEntrys();

            $profile->cols      = 'id, german, english, value, value_EN, position';
            $profile->table     = $tbl_profile;
            $profile->order     = 'position';
            $profile->multiSelect = '1';

            $tpl->assign('array_profile', $profile->row());

            unset($profile);


            $ref = new SelectEntrys();

            $ref->cols      = 'id, link, description, description_EN, position';
            $ref->table     = $tbl_ref;
            $ref->order     = 'position';
            $ref->multiSelect = '1';

            $tpl->assign('array_ref', $ref->row());

            unset($ref);


            $design = new SelectEntrys();

            $design->cols      = 'id, german, english, hexcode, imgfolder, position';
            $design->table     = $tbl_design;
            $design->order     = 'position';
            $design->multiSelect = '1';

            $tpl->assign('array_design', $design->row());

            unset($design);
            

            $tpl->display('db:index.tpl');
            
            $tpl->assign('blocks_end', $tpl_main_end);

            $tpl->assign('submit_name', "submit_blocks");
            $tpl->display("formular/form_submit_img.tpl");
            $tpl->display("admin/settings.tpl");
            
       }

  }
