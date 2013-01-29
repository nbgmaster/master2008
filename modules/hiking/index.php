<?php

   if ( $block["hiking"]["status"] == 1 ) $tpl->display("hiking/index.tpl");

   else  $tpl->display("block_deactivated.tpl");
