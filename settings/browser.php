<?php

  $browser = "";

  if ( preg_match("/Opera/i", $_SERVER['HTTP_USER_AGENT'])) $browser = 'Opera'; 

  if ( preg_match("/MSIE/i", $_SERVER['HTTP_USER_AGENT'])) $browser = 'IE';

  if ( preg_match("/MSIE 7.0/i", $_SERVER['HTTP_USER_AGENT'])) $browser = 'IE';

  if ( preg_match("/Netscape/i", $_SERVER['HTTP_USER_AGENT'])) $browser = 'Netscape'; 

  if(strstr($_SERVER['HTTP_USER_AGENT'], "U") and strstr($_SERVER['HTTP_USER_AGENT'], "Safari")) $browser = "Safari";

  if(strstr($_SERVER['HTTP_USER_AGENT'], "Mac") and strstr($_SERVER['HTTP_USER_AGENT'], "Firefox")) $browser = "FirefoxMac"; 

  if ($browser == "")  $browser = 'other';   
