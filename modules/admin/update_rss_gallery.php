<?php

          require_once('lib/select.php');
                          
          $rss_data = new SelectEntrys();
      
          $rss_data->cols        = ' id, title, title_EN, description, description_EN, date ';
          $rss_data->table       = $tbl_gallery;
          $rss_data->condition   = " visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
          $rss_data->order       = 'date DESC';
          $rss_data->limit       = $set[0]['rss_intern_totalentries'];
          $rss_data->multiSelect = 1;
      
          $rss_data_final = $rss_data->row();
      
          unset($rss_data);
          
          $gmt_time = date("P",time());
          
          $rss_page = 1;
    
          for($s=0;$s<count($rss_data_final);$s++) { 

                   if ($s >= $rss_page * $set[0]['perpage_gallery']) $rss_page++; 
                                               
                   $rss_data_final[$s]['title'] = str_replace("&auml;","ä",$rss_data_final[$s]['title']);
                   $rss_data_final[$s]['title'] = str_replace("&ouml;","ö",$rss_data_final[$s]['title']);
                   $rss_data_final[$s]['title'] = str_replace("&uuml;","ü",$rss_data_final[$s]['title']);
                   $rss_data_final[$s]['title'] = str_replace("&Auml;","Ä",$rss_data_final[$s]['title']);
                   $rss_data_final[$s]['title'] = str_replace("&Ouml;","Ö",$rss_data_final[$s]['title']);
                   $rss_data_final[$s]['title'] = str_replace("&Uuml;","Ü",$rss_data_final[$s]['title']);

                   $rss_data_final[$s]['title_EN'] = str_replace("&auml;","ä",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&ouml;","ö",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&uuml;","ü",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Auml;","Ä",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Ouml;","Ö",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Uuml;","Ü",$rss_data_final[$s]['title_EN']);
                                      
                   $rss_data_final[$s]['description'] = replaceBBcode($rss_data_final[$s]['description'], $set[0]["width_images"], 1);             
                   $rss_data_final[$s]['description'] = strip_tags($rss_data_final[$s]['description']); 

                   $rss_data_final[$s]['description'] = htmlspecialchars($rss_data_final[$s]['description']);
                   
                   $rss_data_final[$s]['description'] = substr($rss_data_final[$s]['description'], 0, $set[0]['rss_msg_length']);

                   $rss_data_final[$s]['description_EN'] = replaceBBcode($rss_data_final[$s]['description_EN'], $set[0]["width_images"], 1);             
                   $rss_data_final[$s]['description_EN'] = strip_tags($rss_data_final[$s]['description_EN']); 

                   $rss_data_final[$s]['description_EN'] = htmlspecialchars($rss_data_final[$s]['description_EN']);

                   $rss_data_final[$s]['description_EN'] = substr($rss_data_final[$s]['description_EN'], 0, $set[0]['rss_msg_length']);
                                   
                   $rss_data_date = explode(" ", $rss_data_final[$s]['date']);
                   
                   $rss_data_final[$s]['date'] = $rss_data_date[0].'T'.$rss_data_date[1].$gmt_time;

                   $rss_data_final[$s]['link'] = 'gallery/'.$rss_data_final[$s]['id'].'/';
                   
          }
          

          generate_rss_feed($set[0]['rss_intern_totalentries'], $rss_data_final, 'gallery', 'DE', $set[0]['rss_intern_totalentries']);
          generate_rss_feed($set[0]['rss_intern_totalentries'], $rss_data_final, 'gallery', 'EN', $set[0]['rss_intern_totalentries']);    
