<?php

            /* Profile :: New entry */

               if ( $_POST["profile_new_value"][0] != "" || $_POST["profile_new_value"][1] != "" )  {


                     $positionID = new SelectEntrys();

                     $positionID->cols      = 'position';
                     $positionID->table     = $tbl_profile;
                     $positionID->order     = 'position DESC';
                     $positionID->limit     = '1';
                     $positionID->module    = '';
                     $positionID->template  = '';

                     $positionID = $positionID->row()+1;

                     $profile_new = new ModifyEntry();

                     $profile_new->table  = $tbl_profile;
                     $profile_new->cols   = 'german, english, value, value_EN, position';


                     $count = 0;

                     foreach ( $_POST["profile_new_german"] as $element )  {

                               if ( $profile_new_value[$count] != "" ) {

                                    $profile_new->values = "'$profile_new_german[$count]', '$profile_new_english[$count]', '$profile_new_value_EN[$count]', '$profile_new_value[$count]', '$positionID'";

                                    $profile_new->insert();

                                    $positionID++;

                               }

                               $count++;

                     }

                     unset($profile_new);
               }

            /******************************************/


            /* Profile :: Edit one or more entries */

               $profile_edit = new ModifyEntry();
               $profile_edit->table  = $tbl_profile;

               $count = 0;

               foreach ( $_POST["profile_german"] as $element )  {

                         $profile_edit->condition = " id = '$profile_id[$count]' ";
                         $profile_edit->changes   = " german = '$profile_german[$count]', english = '$profile_english[$count]', value = '$profile_value[$count]', value_EN = '$profile_value_EN[$count]' ";
                         $profile_edit->update();

                         $count++;
               }

               unset($profile_edit);

            /******************************************/


            /* Profile :: Delete one or more entries */

               $profile_delete = new ModifyEntry();
               $profile_delete->table  = $tbl_profile;

               if ( $_POST["profile_del"] )  {

                       foreach ( $_POST["profile_del"] as $element )  {

                                 $profile_delete->condition  = " id = '$element' ";

                                 $profile_delete->delete();

                       }

               }

               unset($profile_delete);

            /******************************************/
