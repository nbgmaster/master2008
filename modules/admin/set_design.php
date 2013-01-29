<?php

            /* design :: New entry */

               if ( $_POST["design_new_hexcode"][0] != "" || $_POST["design_new_hexcode"][1] != "" )  {

                     $positionID = new SelectEntrys();

                     $positionID->cols      = 'position';
                     $positionID->table     = $tbl_design;
                     $positionID->order     = 'position DESC';
                     $positionID->limit     = '1';
                     $positionID->module    = '';
                     $positionID->template  = '';

                     $positionID = $positionID->row()+1;

                     $design_new = new ModifyEntry();

                     $design_new->table  = $tbl_design;

                     $design_new->cols   = 'german, english, hexcode, imgfolder, position';

                     $count = 0;

                     foreach ( $_POST["design_new_german"] as $element )  {

                               if ( $design_new_hexcode[$count] != "" && $design_new_imgfolder[$count] != "" ) {

                                   $design_new->values = "'$design_new_german[$count]', '$design_new_english[$count]', '$design_new_hexcode[$count]', '$design_new_imgfolder[$count]', '$positionID'";

                                   $design_new->insert();

                                   $positionID++;

                               }

                               $count++;

                     }

                     unset($design_new);

               }

            /******************************************/


            /* design :: Edit one or more entries */

               if ( count( $_POST["design_german"] ) > 0 )  {

                       $design_edit = new ModifyEntry();
                       $design_edit->table  = $tbl_design;

                       $count = 0;

                       foreach ( $_POST["design_german"] as $element )  {

                                 $design_edit->condition = " id = '$design_id[$count]' ";
                                 $design_edit->changes   = " german = '$design_german[$count]', english = '$design_english[$count]', hexcode = '$design_hexcode[$count]', imgfolder = '$design_imgfolder[$count]' ";
                                 $design_edit->update();

                                 $count++;
                       }

                       unset($design_edit);

               }

            /******************************************/


            /* design :: Delete one or more entries */

               if ( count( $_POST["design_del"] ) > 0 )  {

                       $design_delete = new ModifyEntry();
                       $design_delete->table  = $tbl_design;

                       if ( $_POST["design_del"] )  {

                               foreach ( $_POST["design_del"] as $element )  {

                                         $design_delete->condition  = " id = '$element' ";

                                         $design_delete->delete();

                               }

                       }

                       unset($design_delete);

               }

            /******************************************/
