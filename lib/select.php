<?php

  /* Establish :: Class -> SELECT */

     require_once('readdirectory.php');

     class SelectEntrys extends readdirectory  { 

          public $userid;
          public $username;
          public $tbl_users;
          public $timestamp;

          public $cols;
          public $table;
          public $condition;
          public $order;
          public $group;
          public $limit;
          public $module;
          public $template;
          public $multiSelect;
          public $subfolders;

          public $extended, $replace, $Myadmin, $TotalRows, $br, $output_name;
          
          /* Get UserData, only ONE row */

             function getUserData()  { 

                 $this->table     = $this->tbl_users;
                 $this->condition = " UserID = '$this->userid' ";
                 $this->order     = '';
                 $this->limit     = '1';
                 $this->module    = '';
                 $this->template  = '';

                 return $this->row();

             }

          /******************************************/


          /* Convert UserName into UserID */

             function getUserID()  {

                 $this->cols      = 'UserID';
                 $this->table     = $this->tbl_users;
                 $this->condition = " UserName = '$this->username' ";
                 $this->order     = '';
                 $this->limit     = '1';
                 $this->module    = '';
                 $this->template  = '';

                 return $this->row();

          }

          /******************************************/


          /* Get total rows */

             function getrows() { 

                 if ( !$this->table ) $this->table = 'users';

                 $query = mysql_query("SELECT COUNT(1) AS result from $this->table $this->condition LIMIT 1");
 //  echo "SELECT COUNT(1) AS result from $this->table $this->condition LIMIT 1";
                 $rows  = mysql_fetch_row( $query );

                 $result = $rows[ 0 ];

                 return $result;

             }

          /******************************************/


          /* Convert unixtime into time and date */

             function getDate()  {

                 include("./settings/template.php");

                 $month_full = date("n", $this->timestamp);

                 $month_full = $getmonth[$month_full];

                 $Fday = date("d.",$this->timestamp);
                 $Fyear = date("Y",$this->timestamp);

                 $date = $Fday." ".$month_full." ".$Fyear;

                 // $date = date("d.m.Y, H:i",$this->timestamp);

                 return $date;

             }

          /******************************************/


          /* Loop out data */

          function row() {  

              //if ( !eregi  ( "ORDER", $this->order ) && $this->order )  {
              if ( !preg_match("/ORDER/i", $this->order) && $this->order) {
              
                   $this->order  = 'ORDER by ' . $this->order;

              }

              //if ( !eregi  ( "WHERE", $this->condition ) && $this->condition )  { 
              if ( !preg_match("/WHERE/i", $this->condition) && $this->condition) {
              
                   $this->condition  = 'WHERE ' . $this->condition; 

              }

              //if ( !eregi  ( "LIMIT", $this->limit ) && $this->limit )  { 
              if ( !preg_match("/LIMIT/i", $this->limit) && $this->limit) {
              
                   $this->limit  = 'LIMIT ' . $this->limit;

              }
              
              //if ( !eregi  ( "GROUP BY", $this->group ) && $this->group )  { 
              if ( !preg_match("/GROUP BY/i", $this->group) && $this->group) {
             
                   $this->group  = 'GROUP BY ' . $this->group;

              }

              $totalrows = $this->getrows();

              if ( $totalrows > 0 )  {

                   $count = 0;

                   $select = mysql_query("SELECT $this->cols FROM $this->table $this->condition $this->group $this->order $this->limit");

                   while ( $result = mysql_fetch_assoc($select) )  {

                           if ( $this->module && $this->template )  {

                                include("./settings/config.php");

                                include("./settings/template.php");

                                include("./modules/$this->module/output.php");

                           }

                           else  { 

                                if ( $this->multiSelect )  {

                                     $colnames = str_replace(" ", "", $this->cols);

                                     $colnames = explode(",", $colnames);

                                     for ( $z = 0; $z < count($colnames); $z++)  {        
                                                                 
                                           $colnames_formatted = str_replace("(id)","id",$colnames);
                                           $colnames_formatted = str_replace("(time)","time",$colnames);
                                       
                                           $result[$colnames_formatted[$z]] =  htmlentities($result[$colnames[$z]]);
                                           
                                           /*if ($colnames == 'comment' && $br == 1)
                                           $result[$colnames[$z]] = nl2br($result[$colnames[$z]]);*/
                                        
                                           if ($this->output_name == 1 && $z == 0) $firstname = $result[$colnames[$z]];
                                           if ($this->output_name == 1) $this->array[$firstname][$colnames_formatted[$z]] = $result[$colnames[$z]];                                           
                                           else
                                           $this->array[$count][$colnames_formatted[$z]] = $result[$colnames[$z]];
                         
                                     }

                                     $count++;

                                }

                                else  {

                                     return $result[$this->cols];

                                }

                           }

                    }

                    if ( $this->multiSelect )  {

                       return $this->array;

                    }

                    if ( $this->module && $this->template )  {
                    
                         if ($this->module == 'blog' || $this->module == 'gallery' ) include("./modules/$this->module/output_end.php");

                         if ($this->extended) $tpl->assign('folder_error', true);

                         $tpl->assign('array', $this->array);

                         $tpl->display($this->template);

                    }

                    mysql_free_result($select);

              }

              else  {

                  return false; 

              }

          }

          /******************************************/

     }

  /******************************************/
