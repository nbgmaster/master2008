<?php

  /* Initialize :: Language Data */

        $deactivated_notice_00 = "Page information";
        $deactivated_notice_01 = "This page is currently not denotable.";
        $deactivated_notice_02 = "It can have one of the following reasons:";
        $deactivated_notice_03 = "The page is currently under construction.";
        $deactivated_notice_04 = "The page is currently revised.";
        $deactivated_notice_05 = "The page is not existing (anymore). (invalid link)";

     /* Get Date & time values */

        $getmonth = array(1=>"January",
                          2=>"February",
                          3=>"March",
                          4=>"April",
                          5=>"May",
                          6=>"June",
                          7=>"July",
                          8=>"August",
                          9=>"September",
                          10=>"October",
                          11=>"November",
                          12=>"December");
                          
     /******************************************/


     /* Navigation :: Linknames */

        $navi_names["admin"]     = "Administration";
        $navi_names["home"]      = "Home";
        $navi_names["about"]     = "About me";
        $navi_names["ref"]       = "References";
        $navi_names["gallery"]   = "Gallery";
        $navi_names["links"]     = "Links";
        $navi_names["hiking"]    = "Hiking";
        $navi_names["imprint"]   = "Imprint";

        $navi_names2["newblog"]      = "Write new blog entry";
        $navi_names2["newgallery"]   = "Create new gallery";
        $navi_names2["editgallery"]  = "Edit gallery";
        $navi_names2["delgallery"]   = "Delete gallery";
        $navi_names2["editblog"]     = "Blog";
        $navi_names2["editlinks"]    = "Edit links";

        $navi_names2["about_edit"]     = "Edit about me";
        $navi_names2["ref_edit"]       = "Edit references";
        $navi_names2["hiking_edit"]    = "Edit hiking";
        $navi_names2["imprint_edit"]   = "Edit imprint";
        $navi_names2["settings"]       = "Edit settings";
        
        $navi_names3["editblog"]     = "Edit blog entry";
        if ($module == 'admin') $navi_names3["thumbs"]       = "Edit gallery";
           
        if ($module == 'gallery' && $_GET[gid] && !$_GET[pid])
        $navi_names2["thumbs"] = $gal_titles[0]["title_EN"]; 
        else $navi_names2["thumbs"] = "Gallery";

     /******************************************/


     /* Template :: Names */

        $tpl->assign('tpl_name_1', 'Blue');
        $tpl->assign('tpl_name_2', 'Orange');
        $tpl->assign('tpl_name_3', 'Green');
        $tpl->assign('tpl_name_4', 'Gold');
        $tpl->assign('tpl_name_5', 'Red');

     /******************************************/


     /* Language :: Names */

        $tpl->assign('lang_name_1', 'German');
        $tpl->assign('lang_name_2', 'English');
        $tpl->assign('title_flag1', 'Click here to display the website in German');
        $tpl->assign('title_flag2', 'Click here to display the website in English');
        
     /******************************************/


     /* Left Frame */

        $tpl->assign('left_settings', 'Settings');
        $tpl->assign('left_design', 'Design');
        $tpl->assign('left_lang', 'Language');
        $tpl->assign('left_admin', 'Administration');
        $tpl->assign('left_user', 'Username');
        $tpl->assign('left_pw', 'Password');

        $tpl->assign('left_login', 'GO');
        $tpl->assign('left_logout', 'Logout');

        $tpl->assign('logon_failed', "Login failed!");
        $tpl->assign('logon_greeting', 'Hello');
        $tpl->assign('twitter_title', 'Status message');
        $twitter_preposition = "ago";
        $tpl->assign('title_visiter', 'Visitors');
 
        $tpl->assign('v_today', 'Today:');
        $tpl->assign('v_yesterday', 'Yesterday:');
        $tpl->assign('v_total', 'Total:');
                                
        $tpl->assign("blog_comments_l", "Blog (comments)"); 
        $tpl->assign("left_blog_comments_head", "Blog :: Newest comments"); 
        $tpl->assign("comments", "Comment(s)"); 
                                        
     /******************************************/


     /* Blog */

        $tpl->assign('blog_new', $navi_names2["newblog"]);
        $tpl->assign('gal_new', $navi_names2["newgal"]);  
        $tpl->assign('blog_edit', 'Edit entry');
        $tpl->assign('blog_del', 'Delete entry');
        $tpl->assign('confirm_delete', 'Really remove this entry?');
        $tpl->assign('toogle_admin', 'Adminoptions');
        
        $img_enlarge_title = "Show picture in original size in a new window";

     /******************************************/
     
     
     /* Page Navi */

        $tpl->assign('sides_total', 'of');     
        $tpl->assign('sides', 'Pages');     
        $blog_navi = 'Blog :: Page navigation';
        $gal_navi  = 'Gallery :: Page navigation';


     /* Formular Main */

         $tpl->assign('preview_mainform', 'Preview');
         $tpl->assign('submit_mainform', 'Submit entry');
         $tpl->assign('f_title', 'Title');
         $tpl->assign('f_extension_title', 'English title');
         $tpl->assign('f_msg', 'German version');       
         $tpl->assign('f_extension_msg', 'English version');     
         $tpl->assign('input_folder', 'Image directory');   
         $tpl->assign('f_options_o1_gal', 'Display gallery:');          

     /******************************************/


     /* Formular Main */
     
        $tpl->assign('f_options_title', 'Options');     
        $tpl->assign('f_options_o1', 'Display news:'); 
        $tpl->assign('f_options_o1_yes', 'Yes'); 
        $tpl->assign('f_options_o1_no', 'No'); 
        $tpl->assign('f_options_o2', 'Activate comments:'); 
        $tpl->assign('f_options_o2_yes', 'Yes'); 
        $tpl->assign('f_options_o2_no', 'No'); 
        $tpl->assign('f_options_o3', 'Start date:'); 
        $tpl->assign('bid_invisible', 'This blog entry is currently not visible for visiters');
         
     /******************************************/
     
    
     /* Formular Comments */

         $tpl->assign('commentsS_title', 'Display comments');
         $tpl->assign('commentsW_title', 'Write comment');     
         $tpl->assign('submit_comform', 'Submit new comment');
         $tpl->assign('submit_comform_edit', 'Edit comment');
         $tpl->assign('f_name', 'Name');
         $tpl->assign('f_msg_c', 'Comment');
         $tpl->assign('com_name', 'wrote');         
         $tpl->assign('title_edit_com', 'Edit this comment');   
         $tpl->assign('title_del_com', 'Delete this comment');

         $tpl->assign('spam_01', 'Sorry, you commented only recently to this blog entry.');
         $tpl->assign('spam_02', 'Please try it again at a later date. ');
         
         $tpl->assign('f_code', 'Code');
         $tpl->assign('f_codeB', 'Generate new code');
         $tpl->assign('error_code', 'Sorry, the code you have entered was not valid.');
         
         $name_guest = 'Guest';
                                
     /******************************************/


     /* Toogle title */

        $toggle_expand = "Click here to fade in attachments";
        $toggle_expandB = "Click here to fade in admin options";        
        $toggle_expandC = "Click here to fade in comments";
        $toggle_expandD = "Click here to fade in submit form";
        $toggle_collapse = "Click here to fade out attachments";
        $toggle_collapseB = "Click here to fade out admin options";
        $toggle_collapseC = "Click here to fade out comments";
        $toggle_collapseD = "Click here to fade out submit form";
        
        $tpl->assign('toggle_expand', $toggle_expand);
        $tpl->assign('toggle_expandB', $toggle_expandB);
        $tpl->assign('toggle_expandC', $toggle_expandC);
        $tpl->assign('toggle_expandD', $toggle_expandD);
        $tpl->assign('toggle_collapse', $toggle_collapse);
        $tpl->assign('toggle_collapseB', $toggle_collapseB);
        $tpl->assign('toggle_collapseC', $toggle_collapseC);
        $tpl->assign('toggle_collapseD', $toggle_collapseD);
        
        $tpl->assign('toggle_admin', "Adminoptions");

     /******************************************/
     
     /* Title boxes :: BBCode */

        $mainform_info = "Highlight desired text and then choose a particular formatting.";

        $tpl->assign('mainform_info', $mainform_info);

        $tpl->assign('title_bold', 'bold text');
        $tpl->assign('title_italic', 'italic text');
        $tpl->assign('title_underline', 'underlined text');
        $tpl->assign('title_center', 'centered text');
        $tpl->assign('title_block', 'handprinted text');
        $tpl->assign('title_url', 'Insert Hyperlink');
        $tpl->assign('title_image', 'Insert Image');
        $tpl->assign('title_quote', 'Insert Quotation');
        $tpl->assign('title_list', 'Insert List');
        $tpl->assign('title_expand', 'Show extended bbcode functions');
        
        $tpl->assign('bbcode_size', 'Textsize');
        $tpl->assign('bbcode_size_small', 'small');
        $tpl->assign('bbcode_size_middle', 'middle');
        $tpl->assign('bbcode_size_big', 'big');
        $tpl->assign('bbcode_size_huge', 'huge');
        $tpl->assign('bbcode_color', 'Textcolor');

     /******************************************/


     /* Title boxes :: Filecons */

        $tpl->assign('title_jpg', 'JPG-Image');
        $tpl->assign('title_gif', 'GIF & PNG - Image');
        $tpl->assign('title_doc', 'Word-File');
        $tpl->assign('title_xls', 'Excel-File');
        $tpl->assign('title_ppt', 'Powerpoint-File');
        $tpl->assign('title_zip', 'ZIP-Archive');
        $tpl->assign('title_rar', 'RAR-Archive');
        $tpl->assign('title_pdf', 'PDF-File');
        $tpl->assign('title_txt', 'Textfile');

     /******************************************/


     /* Attachment */

        $tpl->assign('attach_file', 'Optional: Attach File');
        $tpl->assign('attach_maxsize', 'Maximal Filesize:');
        $tpl->assign('attach_del', 'Optional: Remove attached files (Enable Checkbox)');
        $tpl->assign('attach_format', 'Permitted Fileformats');
        $tpl->assign('attach_data', 'This entry contains file attachments');
        $tpl->assign('attach_name', 'File attachment');
        $tpl->assign('attach_del', 'delete');
        
     /******************************************/


     /* Administration :: Settings */

        $set_head_000 = "Enable / Disable blocks";

        $tpl->assign('set_head_000', $set_head_000);

        $tpl->assign('set_head_001', "Current Profile");

        $tpl->assign('set_profile_col_01', "German");
        $tpl->assign('set_profile_col_02', "English");
        $tpl->assign('set_profile_col_03', "Value");
        $tpl->assign('set_profile_col_04', "Delete");
        $tpl->assign('set_profile_col_05', "New entry (DE)");
        $tpl->assign('set_profile_col_06', "New entry (EN)");
        $tpl->assign('set_profile_col_07', "Display");
        
        $tpl->assign('set_head_002', "Interesting articles in the WWW");
        $tpl->assign('set_head_002b', "Interesting articles");
        $tpl->assign('set_references_col_01', "Link");
        $tpl->assign('set_references_col_02', "Description (DE)");
        $tpl->assign('set_references_col_03', "New link");
        $tpl->assign('set_references_col_04', "Description (EN)");

        $tpl->assign('set_head_003', "Design");
        $tpl->assign('set_design_col_01', "Color code (Hex)");
        $tpl->assign('set_design_col_02', "Image folder");
        $tpl->assign('set_design_col_03', "Neues Design");
        $tpl->assign('set_design_col_04', "New Design");

        $tpl->assign('set_head_004', "Miscellaneous");

        $tpl->assign("set_root", "Main directory");
        $tpl->assign('set_title_hp', "Homepage title (DE)");
        $tpl->assign('set_title_hp_EN', "Homepage title (EN)");
        $tpl->assign('set_main_title', "Front page :: Title (DE)");
        $tpl->assign('set_main_title_EN', "Front page :: Title (EN)");
        $tpl->assign('set_main_description', "Front page :: Description (DE)");
        $tpl->assign('set_main_description_EN', "Front page :: Description (EN)");
        $tpl->assign('set_keywords', "Keywords (Search engine)");
        $tpl->assign('set_mail', "Email adress");
        $tpl->assign('set_rss1_title', "RSS external :: Title (DE)");
        $tpl->assign('set_rss1', "RSS external :: URL (DE)");
        $tpl->assign('set_rss2_title', "RSS external :: Title (EN)");
        $tpl->assign('set_rss2', "RSS external :: URL (EN)");
        $tpl->assign('set_rss3', "RSS external :: Max. number");
        $tpl->assign('set_rss4', "RSS internal :: Max. number");
        $tpl->assign('set_rss5', "RSS internal (left) :: Max. number");   
        $tpl->assign('set_rss6', "RSS internal :: Msg max. chars");   
        $tpl->assign('set_pp_blog', "Blog entrys per page");
        $tpl->assign('set_pp_users', "Users per page");
        $tpl->assign('set_pp_comments', "Comments per page");
        $tpl->assign('set_time_ban', "Time ban comments (minutes)");
        $tpl->assign('set_pp_gallerys', "Gallerys per page");
        $tpl->assign('set_pp_thumbs', "Thumbs per page");
        $tpl->assign('set_img_w', "Gallery: Images max. width");
        $tpl->assign('set_thumbs_w', "Gallery: Thumbs max. width");
        $tpl->assign('set_img_h', "Gallery: Images max. height");
        $tpl->assign('set_thumbs_h', "Gallery: Thumbs max. height");
        $tpl->assign('set_img_h', "Gallery: Images max. height");
        $tpl->assign('set_thumbs_h', "Gallery: Thumbs max. height");
        $tpl->assign('set_visiters1', "Visiters: delete after X min");
        $tpl->assign('set_visiters2', "Visiters: new count after X min");                        
        $tpl->assign('set_more', "More");
        
        $tpl->assign('twitter_title_DE', 'Statusnachricht (DE)');
        $tpl->assign('twitter_title_EN', 'Statusnachricht (EN)');

     /******************************************/


     /* Administration :: Links */

        $tpl->assign('set_head_005', "Categories");
        $tpl->assign('links_col_01', "Link");
        $tpl->assign('links_col_02', "Description (DE)");
        $tpl->assign('links_col_03', "Description (EN)");
        
     /******************************************/
     

    /* Gallery :: Main + Loading */
    
        $gal_numbers = "Galleries available"; 

        $tpl->assign('loading_a', 'Please wait!!');
        $tpl->assign('loading_b', 'Installation process is running!');
        $tpl->assign('loading_c', 'This procedure could take a few minutes!');
        $tpl->assign('loading_d', 'Exit this page under no circumstances!');

        $tpl->assign('gid_invisible', 'This gallery is currently not visible for visiters');

        $tpl->assign('gal_head_01', 'Please find more pictures on the website of my former school age-group');
        $tpl->assign('gal_head_02', '.');
        $tpl->assign('gal_head_03', 'However, you need to register there.');
        
     /******************************************/


     /* Gallery :: Install */


        $tpl->assign('newgal_require', "Requirements");
        $tpl->assign('newgal_require1', "You need <b>FTP Access</b> to upload your images on the server.");
        $tpl->assign('newgal_require2', "You get the <b>Access data</b> to connect on the server either from the webmaster or a board member.");

        $tpl->assign('newgal_step1', "<b>Step 1:</b> Create a new <b>subfolder within the directory &laquo; gallery/ &raquo;</b>.");
        $tpl->assign('newgal_step2', "<b>Step 2:</b> Upload all images into your newly-created folder.");
        $tpl->assign('newgal_step3', "<b>Step 3:</b> At the bottom, type in title plus record date and choose the name of your new subfolder.");

        $tpl->assign('newgal_mind1', "<b>Hint:</b> The folder name mustn't contain special characters or umlauts!");
        $tpl->assign('newgal_mind2', "<b>Hint:</b> The image names also mustn't contain special characters or umlauts!");
        $tpl->assign('newgal_mind3', "<b>Hint:</b> Only allowed are the following image formats: <b>JPG, GIF und PNG</b> (JPG recommended)");

        $tpl->assign('newgal_mind4', "<b>Hint:</b> 
                                      To warrant a <b>fast and error-free installation</b>, the width of your uploaded pictures should not
                                      exceed <b>1000 pixel</b>. 
                                      With the program <a href=\"http://xnview.com\" target=\"_blank\"><b>xnView</b></a>
                                      you can easily downsize a lot of images at the same time.");

        $tpl->assign('newgal_guide', "Instruction");
        $tpl->assign('newgal_data', "Neccessary Data");
        $tpl->assign('newgal_desc', "Description");
        $tpl->assign('newgal_desc_EN', "English Description");
        
        $newgallery_select = "Choose a folder";

        $tpl->assign('newgal_reason', "If there does not appear your desired folder, possbile reasons are:");

        $tpl->assign('newgal_reason1', "There are invalid files in the destination folder (only  JPG, GIF, PNG allowed).");
        $tpl->assign('newgal_reason2', "There are already further subfolders in your destination folder.");
        $tpl->assign('newgal_reason3', "The folder doesn't exist.");
        $tpl->assign('newgal_reason4', "The Gallery in your desired folder is already installed.");                   

     /******************************************/ 


     /* Gallery :: Edit */ 
     
        $tpl->assign('editgal_data', "Option 1: Change Information");
        $tpl->assign('editgal_act', "Option 2: Update Gallery completely");

        $gallery_info1 = "This option has to performed if:";
        $gallery_info2 = "After the successful installation of the gallery, new pictures were added,";
        $gallery_info3 = "new pictures were removed or existing pictures were replaced by new ones.";
        $gallery_info4 = "To update this gallery, click on the bottom button!";

        $tpl->assign('gallery_info1', $gallery_info1);
        $tpl->assign('gallery_info2', $gallery_info2);
        $tpl->assign('gallery_info3', $gallery_info3);
        $tpl->assign('gallery_info4', $gallery_info4);

        $editgallery_select1 = "Folder";
        $editgallery_select2 = "does not exist any longer.";

        $tpl->assign('editgal_failure', "Sorry, Update not possible, potential reasons are:");

        $tpl->assign('failure1', 'The folder');
        $tpl->assign('failure1B', 'does not exist any longer.');
        $tpl->assign('failure2', 'contains invalid files (only JPG, GIF, PNG allowed).');

        $tpl->assign('submit_mainform3', 'Update this gallery now');

     /******************************************/ 


     /* RSS Feeds */ 

        $tpl->assign('feed_blog_img_DE', utf8_encode('Blog (Webseite)'));
        $tpl->assign('feed_blog_name_DE', utf8_encode('blog.nbg-master.de - RSS Feed'));
        $tpl->assign('feed_blog_description_DE', utf8_encode("Die ".$set[0]['rss_intern_totalentries']." neuesten Blognachrichten"));

        $tpl->assign('feed_blog_img_EN', utf8_encode('blog (website)'));          
        $tpl->assign('feed_blog_name_EN', utf8_encode('blog.nbg-master.de - RSS Feed'));
        $tpl->assign('feed_blog_description_EN', utf8_encode("The ".$set[0]['rss_intern_totalentries']." newest blog messages"));

        $tpl->assign('feed_gallery_img_DE', utf8_encode('Galerie (Webseite)'));      
        $tpl->assign('feed_gallery_name_DE', utf8_encode('gallery.nbg-master.de - RSS Feed'));
        $tpl->assign('feed_gallery_description_DE', utf8_encode("Die ".$set[0]['rss_intern_totalentries']." neuesten Galerien"));

        $tpl->assign('feed_gallery_img_EN', utf8_encode('gallery (website)'));           
        $tpl->assign('feed_gallery_name_EN', utf8_encode('gallery.nbg-master.de - RSS Feed'));
        $tpl->assign('feed_gallery_description_EN', utf8_encode("The ".$set[0]['rss_intern_totalentries']." newest galleries"));
 
        $rss_blog = "Blog :: Newest messages"; 
        $tpl->assign("rss_blog", "Blog (newest)"); 
                
     /******************************************/ 
      
            
     /* Links Section */ 
 
        $tpl->assign("links_categories_title", "Links :: Category"); 
        $tpl->assign("links_categories_option01", "View all");       
                     
     /******************************************/                  