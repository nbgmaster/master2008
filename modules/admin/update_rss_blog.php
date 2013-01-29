<?php

          require_once('lib/select.php');
                          
          $rss_data = new SelectEntrys();
      
          $rss_data->cols        = ' id, title_DE, title_EN, message_DE, message_EN, date ';
          $rss_data->table       = $tbl_blog;
          $rss_data->condition   = " deleted = '0' AND visibility = '1' AND UNIX_TIMESTAMP(date) < $timestamp ";
          $rss_data->order       = 'date DESC';
          $rss_data->limit       = $set[0]['rss_intern_totalentries'];
          $rss_data->multiSelect = 1;
      
          $rss_data_final = $rss_data->row();
      
          unset($rss_data);
          
          $gmt_time = date("P",time());
          
          $rss_page = 1;
    
          for($s=0;$s<count($rss_data_final);$s++) {
          
                   if ($s >= $rss_page * $set[0]['perpage_blog']) $rss_page++; 

                   $rss_data_final[$s]['title_DE'] = str_replace("&auml;","ä",$rss_data_final[$s]['title_DE']);
                   $rss_data_final[$s]['title_DE'] = str_replace("&ouml;","ö",$rss_data_final[$s]['title_DE']);
                   $rss_data_final[$s]['title_DE'] = str_replace("&uuml;","ü",$rss_data_final[$s]['title_DE']);
                   $rss_data_final[$s]['title_DE'] = str_replace("&Auml;","Ä",$rss_data_final[$s]['title_DE']);
                   $rss_data_final[$s]['title_DE'] = str_replace("&Ouml;","Ö",$rss_data_final[$s]['title_DE']);
                   $rss_data_final[$s]['title_DE'] = str_replace("&Uuml;","Ü",$rss_data_final[$s]['title_DE']);

                   $rss_data_final[$s]['title_DE'] =  utf8_decode(htmlspecialchars($rss_data_final[$s]['title_DE']));
                   
                   $rss_data_final[$s]['title_EN'] = str_replace("&auml;","ä",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&ouml;","ö",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&uuml;","ü",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Auml;","Ä",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Ouml;","Ö",$rss_data_final[$s]['title_EN']);
                   $rss_data_final[$s]['title_EN'] = str_replace("&Uuml;","Ü",$rss_data_final[$s]['title_EN']);

                   $rss_data_final[$s]['title_EN'] = utf8_decode(htmlspecialchars($rss_data_final[$s]['title_EN']));
                                      
                   $rss_data_final[$s]['message_DE'] = replaceBBcode($rss_data_final[$s]['message_DE'], $set[0]["width_images"], 1);             
                   $rss_data_final[$s]['message_DE'] = strip_tags($rss_data_final[$s]['message_DE']); 

                   $rss_data_final[$s]['message_DE'] = htmlspecialchars($rss_data_final[$s]['message_DE']);

                   $length_msg = $set[0]['rss_msg_length'];

                   for ($c=0;$c<=100;$c++) {

                        $last_char = substr($rss_data_final[$s]['message_DE'], $length_msg-1, 1);

                        if ($last_char == " " || $last_char == "." || $last_char == "!" || $last_char == "?") break;

                        $length_msg = $length_msg - 1;

                   }
                   
                   $rss_data_final[$s]['message_DE'] = substr($rss_data_final[$s]['message_DE'], 0, $length_msg).' [...]';

                   $rss_data_final[$s]['message_EN'] = replaceBBcode($rss_data_final[$s]['message_EN'], $set[0]["width_images"], 1);             
                   $rss_data_final[$s]['message_EN'] = strip_tags($rss_data_final[$s]['message_EN']); 

                   $rss_data_final[$s]['message_EN'] = htmlspecialchars($rss_data_final[$s]['message_EN']);
                   
                   $length_msg = $set[0]['rss_msg_length'];
                   
                   for ($c=0;$c<=100;$c++) {

                        $last_char = substr($rss_data_final[$s]['message_EN'], $length_msg-1, 1);

                        if ($last_char == " " || $last_char == "." || $last_char == "!" || $last_char == "?") break;

                        $length_msg = $length_msg - 1;

                   }

                   $rss_data_final[$s]['message_EN'] = substr($rss_data_final[$s]['message_EN'], 0, $length_msg).' [...]';
                                   
                   $rss_data_date = explode(" ", $rss_data_final[$s]['date']);
                   
                   $rss_data_final[$s]['date'] = $rss_data_date[0].'T'.$rss_data_date[1].$gmt_time;
                   
                   $rss_data_final[$s]['link'] = 'blog/'.$rss_page.'/'.$rss_data_final[$s]['id'].'/#b'.$rss_data_final[$s]['id'];
                   
          }

          generate_rss_feed($set[0]['rss_intern_totalentries'], $rss_data_final, 'blog', 'DE', $set[0]['rss_intern_totalentries']);
          generate_rss_feed($set[0]['rss_intern_totalentries'], $rss_data_final, 'blog', 'EN', $set[0]['rss_intern_totalentries']);    
