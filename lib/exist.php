<?php

  /* Establish :: Class -> Exist */

     require_once('select.php');   

     class CheckExist extends SelectEntrys {

          public $tableE;
          public $conditionE;

          public $user;
          public $pw;
          public $ip, $lang;

          /* Are there any strikes under the following conditions? */

          function exist() {

              if ( $this->conditionE )  {

                   $this->conditionE  = 'WHERE ' . $this->conditionE;

              }

              $query = mysql_query("SELECT COUNT(1) AS result from $this->tableE $this->conditionE LIMIT 1");

              $rows  = mysql_fetch_row( $query );

              $result = $rows[ 0 ];  

              return $result;

          }

          /******************************************/


          /* Create a cookie :: LOGIN */

             function cookieset() { 

                 $more = md5 (uniqid (rand()));

                 if ( $this->user && $this->pw )  {

                      $this->username = $this->user;

                      $userid = $this->getUserID();

                      $cookie = "$more|$userid|$this->pw";

                 }
   
                 else  {

                      $cookie = '';

                 }

                 setcookie(userdata, $cookie, time()+365*3600*24, "/");
  
             }

          /******************************************/


          /* Create a cookie :: SAVE IP */

             function cookieIP($c_name, $c_content, $c_time, $c_dir) { 
             
                 setcookie($c_name, $c_content, $c_time, $c_dir);

             }

          /******************************************/


          /* Create a cookie :: LANGUAGE */

             function cookieLANG() { 

                 setcookie(lang,$this->lang,time()+365*24*3600);

             }

          /******************************************/

     }

  /******************************************/
