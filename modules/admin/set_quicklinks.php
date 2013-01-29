<?php

            /* References :: New entry */

               if ( $_POST["ref_new_link"][0] != "" || $_POST["ref_new_link"][1] != "" )  {

                     $positionID = new SelectEntrys();

                     $positionID->cols      = 'position';
                     $positionID->table     = $tbl_ref;
                     $positionID->order     = 'position DESC';
                     $positionID->limit     = '1';
                     $positionID->module    = '';
                     $positionID->template  = '';

                     $positionID = $positionID->row()+1;

                     $ref_new = new ModifyEntry();

                     $ref_new->table  = $tbl_ref;
                     $ref_new->cols   = 'link, description, description_EN, position';

                     $count = 0;

                     foreach ( $_POST["ref_new_link"] as $element )  {

                               if ( $ref_new_link[$count] != "" ) {

                                    $ref_new->values = "'$ref_new_link[$count]', '$ref_new_description[$count]', '$ref_new_description_EN[$count]', $positionID";

                                    $ref_new->insert();

                                    $positionID++;

                               }

                               $count++;

                     }

                     unset($ref_new);

               }

            /******************************************/


            /* References :: Edit one or more entries */

               $ref_edit = new ModifyEntry();
               $ref_edit->table  = $tbl_ref;

               $count = 0;

               foreach ( $_POST["ref_link"] as $element )  {

                         $ref_edit->condition = " id = '$ref_id[$count]' ";
                         $ref_edit->changes   = " link = '$ref_link[$count]', description = '$ref_description[$count]', description_EN = '$ref_description_EN[$count]' ";
                         $ref_edit->update();

                         $count++;
               }

               unset($ref_edit);

            /******************************************/


            /* Quicklinks :: Delete one or more entries */

               $ref_delete = new ModifyEntry();
               $ref_delete->table  = $tbl_ref;

               if ( $_POST["ref_del"] )  {

                       foreach ( $_POST["ref_del"] as $element )  {

                                 $ref_delete->condition  = " id = '$element' ";

                                 $ref_delete->delete();

                       }

               }

               unset($ref_delete);

            /******************************************/
