<?php

   /* Links :: New entry */

      if ( $_POST["links_l_new_link"][0] != "" || $_POST["links_l_new_link"][1] != "" )  {
      
           if ($_POST["links_l_new_link"][0] != "") $t_cid = $_POST["links_l_new_cid"][0];
           if ($_POST["links_l_new_link"][1] != "") $t_cid = $_POST["links_l_new_cid"][1];
      
           $new_entries = count($_POST["links_l_new_link"]);

           $positionID = new SelectEntrys();

           $positionID->cols      = 'position';
           $positionID->table     = $tbl_links;
           $positionID->condition = " cid = '$t_cid' ";
           $positionID->order     = 'position';
           $positionID->limit     = '1';
           
           $positionID = $positionID->row();
           
           if ($positionID == 0) $positionID = 1;

           $links_l_edit = new ModifyEntry();
           $links_l_edit->table  = $tbl_links;

           $links_l_edit->changes   = " position = position+$new_entries ";
           $links_l_edit->condition = " cid = '$t_cid' ";
           $links_l_edit->update();

           unset($links_l_edit);

           $links_l_new = new ModifyEntry();
           $links_l_new->table  = $tbl_links;
           $links_l_new->cols   = 'cid, link, description, description_EN, position, visibility';

           $count = 0;

           foreach ( $_POST["links_l_new_link"] as $element )  {

                      if ( $links_l_new_link[$count] != "" && $links_l_new_description[$count] != "" ) {

                          $links_l_new->values = "'$links_l_new_cid[$count]', '$links_l_new_link[$count]', '$links_l_new_description[$count]', '$links_l_new_description_EN[$count]', '$positionID', '0' ";

                          $links_l_new->insert();

                          $positionID++;

                      }

                      $count++;

            }

            unset($links_l_new);

      }

   /******************************************/


   /* design :: Edit one or more entries */

      if ( count( $_POST["links_l_link"] ) > 0 )  {

              $links_l_edit = new ModifyEntry();
              $links_l_edit->table     = $tbl_links;
              $links_l_edit->condition = " cid = '$links_l_cid[0]' ";
              $links_l_edit->changes   = " visibility = '0' ";
              $links_l_edit->update();

              $count = 0;

              foreach ( $_POST["links_l_link"] as $element )  {

                        $id = $links_l_id[$count];

                        if (isset($links_l_visibility["$id"])) $vis = 1; 
                        else  $vis = 0;

                        $links_l_edit->condition = " id = '$links_l_id[$count]' ";
                        $links_l_edit->changes   = " link = '$links_l_link[$count]', description = '$links_l_description[$count]', description_EN = '$links_l_description_EN[$count]', visibility = '$vis' ";
                        $links_l_edit->update();

                        $count++;

              }

              unset($links_l_edit);

      }

   /******************************************/


   /* design :: Delete one or more entries */

      if ( count( $_POST["links_l_del"] ) > 0 )  {

              $links_l_delete = new ModifyEntry();
              $links_l_delete->table  = $tbl_links;

              if ( $_POST["links_l_del"] )  {

                      foreach ( $_POST["links_l_del"] as $element )  {

                                $links_l_delete->condition  = " id = '$element' ";

                                $links_l_delete->delete();

                      }

              }

              unset($links_l_delete);

      }

   /******************************************/
