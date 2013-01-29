<!--script type="text/javascript" src="{$root_dir}js/lightbox.js" language="JavaScript1.2"></script-->


<script type="text/javascript" src="{$root_dir}js/lightbox/prototype.js"></script>
<script type="text/javascript" src="{$root_dir}js/lightbox/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="{$root_dir}js/lightbox/lightbox.js"></script>

<link href="{$root_dir}media/css/lightbox.css" rel="stylesheet" type="text/css" media="all">


<table width="96%" cellpadding="0" cellspacing="0" class="table_005">

 <tr>

  <td class="blog_msg">
  
    {if $array_p}{include file="pagenavi.tpl"}<center><hr class="hr_001" size="1"></center>{/if}

<table width="100%">

 <tr>

 {counter start=0 assign="count"} 

 {foreach from=$array key=pid item=thumbs name=thumbs}

  <td align="center">

  <table cellspacing="2" cellpadding="9">

   <tr>

    <td>

    <a href="{$root_dir}{$directoryI}{$thumbs}" rel="lightbox[{$directoryI}]">

    <img id="img" src="{$root_dir}{$directory}{$thumbs}" class="img_003"></a>

    </td>

   </tr>

  </table>

  </td>

 {counter}

 {if $count % 4 == 0 && $count != 0}

 </tr>

 <tr>

 {/if} 

 {/foreach}

 </tr>

</table>
</td> </tr>

</table>
