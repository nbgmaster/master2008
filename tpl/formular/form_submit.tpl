<table cellpadding="3" class="form_submit" align="center">

 <tr>

  <td>

  {if !$form_nopreview}
  <input type="submit" id="submitP" name="preview" value="{$preview_mainform}" class="sub_002">
  {/if}

  {if $this}
  <input type="hidden" name="ankerID" value="{$this}">
  {/if}

  <input type="submit" id="submitM" name="{$submit_name}" value="{$submit_mainform}" class="sub_002">

  </td>

 </tr>
 
 </fieldset>

 </form>

</table>
