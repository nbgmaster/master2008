<?php

  /* Initialize :: Language Data */

        $deactivated_notice_00 = "Seiteninformation";
        $deactivated_notice_01 = "Diese Seite ist momentan nicht anzeigbar.";
        $deactivated_notice_02 = "Dies kann folgende Gr&uuml;nde haben:";
        $deactivated_notice_03 = "Die Seite befindet sich noch im Aufbau.";
        $deactivated_notice_04 = "Die Seite wird gerade &uuml;berarbeitet.";
        $deactivated_notice_05 = "Die Seite existiert nicht (mehr). (ung&Uuml;ltiger Link)";


     /* Get Date & time values */

        $getmonth = array(1=>"Januar",
                          2=>"Februar",
                          3=>"M&auml;rz",
                          4=>"April",
                          5=>"Mai",
                          6=>"Juni",
                          7=>"Juli",
                          8=>"August",
                          9=>"September",
                          10=>"Oktober",
                          11=>"November",
                          12=>"Dezember");
                          
     /******************************************/


     /* Navigation :: Linknames */

        $navi_names["admin"]     = "Administration";
        $navi_names["home"]      = "Home";
        $navi_names["about"]     = "&Uuml;ber mich";
        $navi_names["ref"]       = "Referenzen";
        $navi_names["gallery"]   = "Galerie";
        $navi_names["links"]     = "Links";
        $navi_names["hiking"]    = "Bergwandern";
        $navi_names["imprint"]   = "Impressum";

        $navi_names2["newblog"]      = "Neuen Blogeintrag schreiben";
        $navi_names2["newgallery"]   = "Neue Galerie anlegen";
        $navi_names2["editgallery"]  = "Galerie bearbeiten";
        $navi_names2["delgallery"]   = "Galerie l&ouml;schen";
        $navi_names2["editblog"]     = "Blog";
        $navi_names2["editlinks"]    = "Links bearbeiten";

        $navi_names2["about_edit"]     = "&Uuml;ber mich bearbeiten";
        $navi_names2["ref_edit"]       = "Referenzen bearbeiten";
        $navi_names2["hiking_edit"]   = "Bergwandern bearbeiten";
        $navi_names2["imprint_edit"]   = "Impressum bearbeiten";
        $navi_names2["settings"]       = "Einstellungen bearbeiten";
        
        $navi_names3["editblog"]     = "Blogeintrag editieren";
        if ($module == 'admin') $navi_names3["thumbs"]       = "Galerie editieren";
           
        if ($module == 'gallery' && $_GET[gid] && !$_GET[pid])
        $navi_names2["thumbs"] = $gal_titles[0]["title"];
        else $navi_names2["thumbs"] = "Galerie";
           
     /******************************************/


     /* Template :: Names */

        $tpl->assign('tpl_name_1', 'Blau');
        $tpl->assign('tpl_name_2', 'Orange');
        $tpl->assign('tpl_name_3', 'Gruuml;n');
        $tpl->assign('tpl_name_4', 'Gold');
        $tpl->assign('tpl_name_5', 'Rot');

     /******************************************/


     /* Language :: Names */

        $tpl->assign('lang_name_1', 'Deutsch');
        $tpl->assign('lang_name_2', 'Englisch');
        $tpl->assign('title_flag1', 'Hompageinhalte in deutscher Sprache darstellen');
        $tpl->assign('title_flag2', 'Hompageinhalte in englischer Sprache darstellen');
        $tpl->assign('lang_name_2', 'Englisch');
        
     /******************************************/


     /* Left Frame */

        $tpl->assign('left_settings', 'Einstellungen');
        $tpl->assign('left_design', 'Design');
        $tpl->assign('left_lang', 'Sprache');
        $tpl->assign('left_admin', 'Administration');
        $tpl->assign('left_user', 'Username');
        $tpl->assign('left_pw', 'Passwort');

        $tpl->assign('left_login', 'GO');
        $tpl->assign('left_logout', 'Ausloggen');

        $tpl->assign('logon_failed', "Login fehlgeschlagen!");
        $tpl->assign('logon_greeting', 'Hallo');
        $tpl->assign('twitter_title', 'Statusnachricht');
        $twitter_preposition = "vor";
        $tpl->assign('title_visiter', 'Besucher');
        
        $tpl->assign('v_today', 'Heute:');
        $tpl->assign('v_yesterday', 'Gestern:');
        $tpl->assign('v_total', 'Gesamt:');
        
        $tpl->assign("blog_comments_l", "Blog (Kommentare)"); 
        $tpl->assign("left_blog_comments_head", "Blog :: Neueste Kommentare"); 
        $tpl->assign("comments", "Kommentar(e)"); 
                 
     /******************************************/


     /* Blog */

        $tpl->assign('blog_new', $navi_names2["newblog"]);
        $tpl->assign('gal_new', $navi_names2["newgal"]);  
        $tpl->assign('blog_edit', 'Eintrag editieren');
        $tpl->assign('blog_del', 'Eintrag l&ouml;schen');
        $tpl->assign('confirm_delete', 'Diesen Eintrag wirklich l&ouml;schen?');

        $img_enlarge_title = "Bild in Originalgr&ouml;ße im neuen Fenster &ouml;ffnen";
        
     /******************************************/
     
     
     /* Page Navi */

        $tpl->assign('sides_total', 'von');     
        $tpl->assign('sides', 'Seiten');     
        $blog_navi = 'Blog :: Seitennavigation';
        $gal_navi  = 'Galerie :: Seitennavigation';


     /* Formular Main */

         $tpl->assign('preview_mainform', 'Vorschau');
         $tpl->assign('submit_mainform', 'Eintrag abschicken');
         $tpl->assign('f_title', 'Titel');
         $tpl->assign('f_extension_title', 'Englischer Titel');
         $tpl->assign('f_msg', 'Deutsche Fassung');       
         $tpl->assign('f_extension_msg', 'Englische Fassung');     
         $tpl->assign('input_folder', 'Bilderverzeichnis');   
         $tpl->assign('f_options_o1_gal', 'Galerie anzeigen:');          

     /******************************************/


     /* Formular Main */
     
        $tpl->assign('f_options_title', 'Optionen');     
        $tpl->assign('f_options_o1', 'News anzeigen:'); 
        $tpl->assign('f_options_o1_yes', 'Ja'); 
        $tpl->assign('f_options_o1_no', 'Nein'); 
        $tpl->assign('f_options_o2', 'Kommentare aktivieren:'); 
        $tpl->assign('f_options_o2_yes', 'Ja'); 
        $tpl->assign('f_options_o2_no', 'Nein'); 
        $tpl->assign('f_options_o3', 'Startdatum:'); 
        $tpl->assign('bid_invisible', 'Dieser Blogeintrag ist f&uuml;r Besucher derzeit nicht sichtbar');
         
     /******************************************/
     
    
     /* Formular Comments */

         $tpl->assign('commentsS_title', 'Kommentare anzeigen');
         $tpl->assign('commentsW_title', 'Kommentar schreiben');     
         $tpl->assign('submit_comform', 'Neuen Kommentar eintragen');
         $tpl->assign('submit_comform_edit', 'Kommentar &auml;ndern');
         $tpl->assign('f_name', 'Name');
         $tpl->assign('f_msg_c', 'Kommentar');
         $tpl->assign('com_name', 'hat geschrieben');         
         $tpl->assign('title_edit_com', 'Diesen Kommentar editieren');   
         $tpl->assign('title_del_com', 'Diesen Kommentar l&ouml;schen');

         $tpl->assign('spam_01', 'Sorry, Sie haben erst vor kurzem einen Kommentar zu diesem Blogeintrag geschrieben.');
         $tpl->assign('spam_02', 'Bitte versuchen Sie es zu einem sp&auml;teren Zeitpunkt noch einmal. ');

         $tpl->assign('f_code', 'Code');
         $tpl->assign('f_codeB', 'Neuen Code generieren');
         $tpl->assign('error_code', 'Sorry, der eingegebene Code war ung&uuml;ltig.');
                  
         $name_guest = 'Gast';
                                
     /******************************************/


     /* Toogle title */

        $toggle_expand = "Hier klicken um Anh&auml;nge einzublenden";
        $toggle_expandB = "Hier klicken um Adminoptionen einzublenden";
        $toggle_expandC = "Hier klicken um Kommentare einzublenden";
        $toggle_expandD = "Hier klicken um Formular einzublenden";

        $toggle_collapse = "Hier klicken um Anh&auml;nge auszublenden";
        $toggle_collapseB = "Hier klicken um Adminoptionen auszublenden";
        $toggle_collapseC = "Hier klicken um Kommentare auszublenden";
        $toggle_collapseD = "Hier klicken um Formular auszublenden";
        
        $tpl->assign('toggle_expand', $toggle_expand);
        $tpl->assign('toggle_expandB', $toggle_expandB);
        $tpl->assign('toggle_expandC', $toggle_expandC);
        $tpl->assign('toggle_expandD', $toggle_expandD);
        $tpl->assign('toggle_collapse', $toggle_collapse);
        $tpl->assign('toggle_collapseB', $toggle_collapseB);
        $tpl->assign('toggle_collapseC', $toggle_collapseC);
        $tpl->assign('toggle_collapseD', $toggle_collapseD);
        
        $tpl->assign('toggle_admin', "Adminoptionen");

     /******************************************/
     
     /* Title boxes :: BBCode */

        $mainform_info = "Markiere den gewuuml;nschten Text und w&auml;hle anschließend die gewuuml;nschte Formatierung aus.";

        $tpl->assign('mainform_info', $mainform_info);

        $tpl->assign('title_bold', 'fettgedruckter Text');
        $tpl->assign('title_italic', 'kursiver Text');
        $tpl->assign('title_underline', 'unterstrichener Text');
        $tpl->assign('title_center', 'zentrierter Text');
        $tpl->assign('title_block', 'Text in Blockschrift');
        $tpl->assign('title_url', 'Hyperlink einf&uuml;gen');
        $tpl->assign('title_image', 'Bild einf&uuml;gen');
        $tpl->assign('title_quote', 'Zitat einf&uuml;gen');
        $tpl->assign('title_list', 'Liste einf&uuml;gen');
        $tpl->assign('title_expand', 'Erweiterte BBCodes anzeigen');
        
        $tpl->assign('bbcode_size', 'Textgr&ouml;ße');
        $tpl->assign('bbcode_size_small', 'klein');
        $tpl->assign('bbcode_size_middle', 'mittel');
        $tpl->assign('bbcode_size_big', 'groß');
        $tpl->assign('bbcode_size_huge', 'riesig');
        $tpl->assign('bbcode_color', 'Textfarbe');

     /******************************************/


     /* Title boxes :: Filecons */

        $tpl->assign('title_jpg', 'JPG-Bild');
        $tpl->assign('title_gif', 'GIF & PNG - Bild');
        $tpl->assign('title_doc', 'Word-Datei');
        $tpl->assign('title_xls', 'Excel-Datei');
        $tpl->assign('title_ppt', 'Powerpoint-Datei');
        $tpl->assign('title_zip', 'ZIP-Archiv');
        $tpl->assign('title_rar', 'RAR-Archiv');
        $tpl->assign('title_pdf', 'PDF-Datei');
        $tpl->assign('title_txt', 'Textdatei');

     /******************************************/


     /* Attachment */

        $tpl->assign('attach_file', 'Optional: Dateien anh&auml;ngen');
        $tpl->assign('attach_maxsize', 'max. Dateigr&ouml;ße:');
        $tpl->assign('attach_del', 'Optional: Angeh&auml;ngte Dateien entfernen (Checkbox aktivieren)');
        $tpl->assign('attach_format', 'Erlaubte Dateiformate');
        $tpl->assign('attach_data', 'Es befinden sich Dateien im Anhang');
        $tpl->assign('attach_name', 'Dateianhang');
        $tpl->assign('attach_del', 'l&ouml;schen');
        
     /******************************************/


     /* Administration :: Settings */

        $set_head_000 = "Bl&ouml;cke an/ausschalten";

        $tpl->assign('set_head_000', $set_head_000);

        $tpl->assign('set_head_001', "Aktuelles Profil");

        $tpl->assign('set_profile_col_01', "Deutsch");
        $tpl->assign('set_profile_col_02', "Englisch");
        $tpl->assign('set_profile_col_03a', "Wert (DE)");
        $tpl->assign('set_profile_col_03b', "Wert (EN)");
        $tpl->assign('set_profile_col_04', "Entfernen");
        $tpl->assign('set_profile_col_05', "Neuer Eintrag (DE)");
        $tpl->assign('set_profile_col_06', "Neuer Eintrag (EN)");
        $tpl->assign('set_profile_col_07', "Anzeigen");
        
        $tpl->assign('set_head_002', "Interessante Artikel im Netz");
        $tpl->assign('set_head_002b', "Interessante Artikel");
        $tpl->assign('set_references_col_01', "Link");
        $tpl->assign('set_references_col_02', "Beschreibung (DE)");
        $tpl->assign('set_references_col_03', "Neuer Link");
        $tpl->assign('set_references_col_04', "Beschreibung (EN)");
        
        $tpl->assign('set_head_003', "Design");
        $tpl->assign('set_design_col_01', "Farbcode (Hex)");
        $tpl->assign('set_design_col_02', "Image Ordner");
        $tpl->assign('set_design_col_03', "Neues Design");
        $tpl->assign('set_design_col_04', "New Design");

        $tpl->assign('set_head_004', "Sonstige Einstellungen");

        $tpl->assign("set_root", "Hauptverzeichnis");
        $tpl->assign('set_title_hp', "Titel der Homepage (DE)");
        $tpl->assign('set_title_hp_EN', "Titel der Homepage (EN)");
        $tpl->assign('set_main_title', "Startseite :: Titel (DE)");
        $tpl->assign('set_main_title_EN', "Startseite :: Titel (EN)");
        $tpl->assign('set_main_description', "Startseite :: Beschreibung (DE)");
        $tpl->assign('set_main_description_EN', "Startseite :: Beschreibung (EN)");
        $tpl->assign('set_keywords', "Keywords (Suchmaschinen)");
        $tpl->assign('set_mail', "Emailadresse");
        $tpl->assign('set_rss1_title', "RSS extern :: Titel (DE)");
        $tpl->assign('set_rss1', "RSS extern :: URL (DE)");
        $tpl->assign('set_rss2_title', "RSS extern :: Titel (EN)");
        $tpl->assign('set_rss2', "RSS extern :: URL (EN)");
        $tpl->assign('set_rss3', "RSS extern :: Max. Anzahl");
        $tpl->assign('set_rss4', "RSS intern :: Max. Anzahl");
        $tpl->assign('set_rss5', "RSS intern (links) :: Max. Anzahl");
        $tpl->assign('set_rss6', "RSS intern :: Msg max. Zeichen");
        $tpl->assign('set_pp_blog', "Blogeintr&auml;ge pro Seite");
        $tpl->assign('set_pp_users', "User anzeigen pro Seite");
        $tpl->assign('set_pp_comments', "Kommentare pro Seite");
        $tpl->assign('set_time_ban', "Zeitsperre Kommentare (in min)");
        $tpl->assign('set_pp_gallerys', "Galerien anzeigen pro Seite");
        $tpl->assign('set_pp_thumbs', "Thumbs anzeigen pro Seite");
        $tpl->assign('set_img_w', "Galerie: Images max. Breite");
        $tpl->assign('set_thumbs_w', "Galerie: Thumbs max. Breite");
        $tpl->assign('set_img_h', "Galerie: Images max. H&ouml;he");
        $tpl->assign('set_thumbs_h', "Galerie: Thumbs max. H&ouml;he");
        $tpl->assign('set_img_h', "Galerie: Images max. H&ouml;he");
        $tpl->assign('set_thumbs_h', "Galerie: Thumbs max. H&ouml;he");
        $tpl->assign('set_visiters1', "Besucher: l&ouml;schen nach X min");
        $tpl->assign('set_visiters2', "Besucher: Neu z&auml;hlen nach X min");                        
        $tpl->assign('set_more', "Mehr");
        
        $tpl->assign('twitter_title_DE', 'Statusnachricht (DE)');
        $tpl->assign('twitter_title_EN', 'Statusnachricht (EN)');

     /******************************************/


     /* Administration :: Links */

        $tpl->assign('set_head_005', "Kategorien");
        $tpl->assign('links_col_01', "Link");
        $tpl->assign('links_col_02', "Beschreibung (DE)");
        $tpl->assign('links_col_03', "Beschreibung (EN)");
        
     /******************************************/
     

    /* Gallery :: Main + Loading */

        $gal_numbers = "Galerien vorhanden"; 

        $tpl->assign('loading_a', 'Bitte warten!!');
        $tpl->assign('loading_b', 'Installationsprozess l&auml;uft!');
        $tpl->assign('loading_c', 'Dieser Vorgang kann mehrere Minuten in Anspruch nehmen!');
        $tpl->assign('loading_d', 'Diese Seite jetzt auf keinen Fall verlassen!');
        
        $tpl->assign('gid_invisible', 'Diese Galerie ist f&uuml;r Besucher derzeit nicht sichtbar');

        $tpl->assign('gal_head_01', 'Auf der Website meines Abiturjahrgangs');
        $tpl->assign('gal_head_02', ', finden Sie weitere Bilder der Jahre 2003-2006.');
        $tpl->assign('gal_head_03', 'Dort ist allerdings eine kostenlose Registrierung notwendig.');
                
     /******************************************/


     /* Gallery :: Install */

        $tpl->assign('newgal_require', "Voraussetzungen");
        $tpl->assign('newgal_require1', "Du ben&ouml;tigst einen <b>FTP-Zugang</b> um die Bilder auf den Server hochzuladen.");
        $tpl->assign('newgal_require2', "Die <b>Zugangsdaten</b> auf den Server bekommst du entweder vom Webmaster oder einem Vorstandsmitglied.");

        $tpl->assign('newgal_step1', "<b>Schritt 1:</b> Lege einen <b>neuen Unterordner im Verzeichnis &laquo; gallery/ &raquo;</b> an.");
        $tpl->assign('newgal_step2', "<b>Schritt 2:</b> Lade alle Bilder in den neu erstellten Ordner hoch.");
        $tpl->assign('newgal_step3', "<b>Schritt 3:</b> Gebe unten Titel sowie das Aufnahmedatum an und w&ouml;hle den Namen des neuen Unterordners aus.");

        $tpl->assign('newgal_mind1', "<b>Beachte:</b> Der Ordnername darf keine Sonderzeichen oder Umlaute enthalten!");
        $tpl->assign('newgal_mind2', "<b>Beachte:</b> Die Bildnamen d&uuml;rfen keine Sonderzeichen oder Umlaute enthalten!");
        $tpl->assign('newgal_mind3', "<b>Beachte:</b> Es sind nur Bilder im Format <b>JPG, GIF und PNG</b> erlaubt! (JPG empfohlen)");

        $tpl->assign('newgal_mind4', "<b>Beachte:</b> 
                                      Um eine schnelle und <b>fehlerfreie Installation</b> zu gew&auml;hrleisten, sollte die Breite
                                      der hochgeladenen Bilder <b>1000 Pixel</b> nicht &uuml;berschreiten. 
                                      <br>Mit dem Programm <a href=\"http://xnview.com\" target=\"_blank\"><b>xnView</b></a>
                                      kann man ganz leicht viele Bilder auf einmal verkleinern lassen.");

        $tpl->assign('newgal_guide', "Anleitung");
        $tpl->assign('newgal_data', "Notwendige Daten");
        $tpl->assign('newgal_desc', "Beschreibung");
        $tpl->assign('newgal_desc_EN', "Englische Beschreibung");
                
        $newgallery_select = "W&auml;hle einen Ordner aus";

        $tpl->assign('newgal_reason', "Der neue Ordner ist nicht ausw&auml;hlbar? Das kann folgende Gr&uuml;nde haben:");

        $tpl->assign('newgal_reason1', "Es befinden sich ung&uuml;ltige Dateien im Zielverzeichnis (nur JPG, GIF, PNG erlaubt).");
        $tpl->assign('newgal_reason2', "Es befinden sich weitere Unterordner im Zielverzeichnis.");
        $tpl->assign('newgal_reason3', "Der Ordner existiert nicht.");
        $tpl->assign('newgal_reason4', "Die Galerie in dem gew&uuml;nschten Ordner ist bereits installiert.");

     /******************************************/ 


     /* Gallery :: Edit */ 

        $tpl->assign('editgal_data', "Option 1: Daten &auml;ndern");
        $tpl->assign('editgal_act', "Option 2: Galerie komplett aktualisieren");

        $gallery_info1 = "Diese Option muss ausgef&uuml;hrt werden wenn:";
        $gallery_info2 = "Nach der Erstellung der Galerie neue Bilder hinzugef&uuml;gt wurden,";
        $gallery_info3 = "Bilder gel&ouml;scht wurden oder vorhandene Bilder durch neue Bilder ersetzt wurden.";
        $gallery_info4 = "Klicke dazu auf den unteren Button um die Galerie zu aktualisieren!";

        $tpl->assign('gallery_info1', $gallery_info1);
        $tpl->assign('gallery_info2', $gallery_info2);
        $tpl->assign('gallery_info3', $gallery_info3);
        $tpl->assign('gallery_info4', $gallery_info4);

        $editgallery_select1 = "Ordner";
        $editgallery_select2 = "existiert nicht mehr.";

        $tpl->assign('editgal_failure', "Update nicht m&ouml;glich, Gr&uuml;nde daf&uuml;r k&ouml;nnten sein:");

        $tpl->assign('failure1', 'Der Ordner');
        $tpl->assign('failure1B', 'existiert nicht mehr.');
        $tpl->assign('failure2', 'enth&auml;lt ung&uuml;ltige Dateiformate (nur JPG, GIF, PNG erlaubt).');

        $tpl->assign('submit_mainform3', 'Diese Galerie jetzt aktualisieren');

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

        $rss_blog = "Blog :: Neueste Nachrichten"; 
        $tpl->assign("rss_blog", "Blog (Neueste)"); 
                     
     /******************************************/ 
      
      
     /* Links Section */ 
 
        $tpl->assign("links_categories_title", "Links :: Kategorie"); 
        $tpl->assign("links_categories_option01", "Alle anzeigen");         
                    
     /******************************************/                              