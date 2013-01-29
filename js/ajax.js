
function move(direction, table, position)  {


  var ajaxRequest;

  try  {  ajaxRequest = new XMLHttpRequest();  } 

  catch (e)  {  try  { ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); } 

     catch (e)  { try  {  ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); } 

        catch (e)  { 	}
		
     }

  }

  ajaxRequest.onreadystatechange = function()  { 


      if (ajaxRequest.readyState == 4)  { 


          //alert(ajaxRequest.responseText); 
document.getElementbyId("test").reload();

      }


  }


  var queryString = "?direction=" + direction + "&table=" + table + "&position=" + position;

  ajaxRequest.open("GET", "./ajax/move.php" + queryString, true);
  ajaxRequest.send(null);


}
