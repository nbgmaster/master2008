<?php

  $cms_content = $cat;

  if ( isset($submit) )  {
     
       include("modules/cms/change.php");

  }

  else if ( isset ($preview) )  {

       include("modules/cms/edit.php");
       include("modules/cms/preview.php");

  }

  else  {

       include("modules/cms/edit.php");

  }
