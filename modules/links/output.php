<?php

/********************** 
 *******Please pay attention that this code is used for the admin AND link section! 
 ********Please pay attention that this code is used for the admin AND link section! 
 **********************************/ 

     /* Select :: Categorys */
     
        $links_c = new SelectEntrys();

        $links_c->cols      = ' id, german, english ';
        $links_c->table     = $tbl_links_c;
        $links_c->order     = "position";
        if ($Myadmin != "1") $links_c->condition = "visibility = '1' ";
        $links_c->multiSelect = '1';

        $array_c_names = $links_c->row();

        unset($links_c);

        $links_c = new SelectEntrys();

        $links_c->cols      = ' id, german, english, position, visibility ';
        $links_c->table     = $tbl_links_c;
        $links_c->order     = "position";
        if ($_GET['cid'] > 0 && $Myadmin != "1") $links_c->condition = "id = '$_GET[cid]' AND visibility = '1' ";
        else if ($_GET['cid'] > 0 && $Myadmin == "1") $links_c->condition = "id = '$_GET[cid]' ";
        else if ($Myadmin != "1") $links_c->condition = "visibility = '1' ";
        $links_c->multiSelect = '1';

        $array_c = $links_c->row();

        unset($links_c);
        
        $tpl->assign('array_c_names', $array_c_names);
        $tpl->assign('array_c', $array_c);

        $tpl->assign("form_nopreview", "1");

     /**************************/
     
     
      /* Check if links are available in the selected category  */   
        
         if ($_GET['cid'] > 0) {
         
             $links     = new CheckExist();
             $links->tableE     = $tbl_links;
             if ($Myadmin == "1") $links->conditionE = " cid = '$_GET[cid]' ";
             else  $links->conditionE = " cid = '$_GET[cid]' AND visibility = '1' ";
             $links_total = $links->exist();
    
             unset($links);
         
         }

     /**************************/
     

      /* Load :: Link section  */

        $links = new SelectEntrys();

        $links->cols      = ' id, cid, link, description, description_EN, position, visibility ';
        $links->table     = $tbl_links;
        $links->order     = "cid, position";
        if ($Myadmin != "1")  $links->condition = "visibility = '1' ";
        $links->multiSelect = '1';

        $array_l = $links->row();

        unset($links);

        foreach( $array_l as $array1 => $array2)  {

                 $array[$array2["cid"]][$array2["id"]] = array( 'id'          => $array2["id"],
                                                                'cid'         => $array2["cid"],
                                                                'link'        => $array2["link"],
                                                                'description' => $array2["description"],
                                                                'description_EN' => $array2["description_EN"],
                                                                'position'    => $array2["position"],
                                                                'visibility'  => $array2["visibility"]
                                                               );

        }    
        
        if ($_GET['cid'] > 0) $cid_active = $_GET['cid'];
        else $cid_active = '0';        
        
        $tpl->assign("cid_active", $cid_active);

        $tpl->assign("array", $array);