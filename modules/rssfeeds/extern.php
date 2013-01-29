<?php

  define("MAGPIE_CACHE_DIR", "cache");
  define("MAGPIE_CACHE_AGE", "1");

  require_once("rss_fetch.inc");

  if ( $rss_url )  {

       $rss   = fetch_rss( $rss_url );

       $rss_limit = 0;

       foreach ( $rss->items as $item )  {

              //   $item["title"] = substr($item["title"], 0, 32);
                                                   
                 $t_date  = explode("T",$item["pubdate"]);
                 $t_time = explode("+",$t_date[1]);
                 
                 $t = $t_date[0].' '.$t_time[0];
                 
                 $t = convert_date_comments($t);
           
                 $t = substr($t, 0, strlen($t)-8);  
                        
                 $ay_rss[] = array('title'  => $item["title"],
                                   'href'   => $item["link"],
                                   'date'   => $t
                                   );

                 $rss_limit++;

                 if ( $rss_limit > $max_number ) break;

       }
      
       $tpl->assign('title_rss', $rss->channel["title"]);

       $tpl->assign('ay_rss', $ay_rss);
       
       unset($ay_rss);

       // $tpl->display("rssfeed.tpl");

  }
