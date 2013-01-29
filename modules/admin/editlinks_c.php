<?php

   /* Link categories :: New entry */

      if ( $_POST["links_c_new_english"][0] != "" || $_POST["links_c_new_english"][1] != "" )  { 

           $new_entries = count($_POST["links_c_new_english"]);

           $positionID = new SelectEntrys();

           $positionID->cols      = 'position';
           $positionID->table     = $tbl_links_c;
           $positionID->order     = 'position';
           $positionID->limit     = '1';

           $positionID = $positionID->row();
           
           if ($positionID == 0) $positionID = 1;

           $links_c_edit = new ModifyEntry();
           $links_c_edit->table  = $tbl_links_c;

           $links_c_edit->changes   = " position = position+$new_entries ";
           $links_c_edit->update();

           unset($links_c_edit);

           $links_c_new = new ModifyEntry();
           $links_c_new->table  = $tbl_links_c;
           $links_c_new->cols   = 'german, english, position, visibility';

           $count = 0;

           foreach ( $_POST["links_c_new_german"] as $element )  {

                      if ( $links_c_new_german[$count] != "" && $links_c_new_english[$count] != "" ) {

                          $links_c_new->values = "'$links_c_new_german[$count]', '$links_c_new_english[$count]', '$positionID', '0' ";

                          $links_c_new->insert();

                          $positionID++;

                      }

                      $count++;

            }

            unset($links_c_edit);

      }

   /******************************************/


   /* design :: Edit one or more entries */

      if ( count( $_POST["links_c_german"] ) > 0 )  {

              $links_c_edit = new ModifyEntry();
              $links_c_edit->table  = $tbl_links_c;

              $links_c_edit->changes   = " visibility = '0' ";
              $links_c_edit->update();
              
              $count = 0;          
                         
              foreach ( $_POST["links_c_german"] as $element )  {
 
                        $id = $links_c_id[$count];

                        if (isset($links_c_visibility["$id"])) $vis = 1; 
                        else  $vis = 0;

                        $links_c_edit->condition = " id = '$id' ";
                        $links_c_edit->changes   = " german = '$links_c_german[$count]', english = '$links_c_english[$count]', visibility = '$vis'  ";
                        $links_c_edit->update();
 

                        $count++;

              }

              unset($links_c_edit);

      }

   /******************************************/


   /* design :: Delete one or more entries */

      if ( count( isset ($_POST["links_c_del"]) ) > 0 )  {

              $links_c_delete = new ModifyEntry();
              $links_c_delete->table  = $tbl_links_c;

              if ( isset($_POST["links_c_del"]) )  {

                      foreach ( $_POST["links_c_del"] as $element )  {
                      
                                $links_l_delete = new ModifyEntry();
                                $links_l_delete->table  = $tbl_links;
                                $links_l_delete->condition  = " cid = '$element' ";
                                $links_l_delete->delete();
                                unset($links_l_delete);
                                
                                $links_c_delete->condition  = " id = '$element' ";
                                $links_c_delete->delete();

                      }

              }

              unset($links_c_delete);

      }

   /******************************************/
