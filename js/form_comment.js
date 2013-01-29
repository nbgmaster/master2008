
  function checkForm(cid)  { 
  
      name_exist = document.getElementById("name_" + cid);

      msg = document.getElementById("comment_" + cid).value;
      result  = msg.search(/\n/);  
      
      var error = 0;  

      while ( result != -1 )  {

              msg    = msg.replace(/\n/,"");  
              result = msg.search(/\n/);   
        
      }
      
      var name       = name_exist.value.split(" "); 
      var nameB      = name.join("");
      var nameLength = nameB.length;

      if ( nameLength < 3 )  {

           alert( alert_name );

           name_exist.focus();

           return false;

           error = 1;
 
      }
      
      if ( msg.length >= 2 )  {

           var msg = msg.split(" "); 
           var msg = msg.join("");

      }

      if ( msg.length < 2 )  {

           alert( alert_comment );

           document.getElementById("comment_" + cid).focus();

           return false;

           error = 1;

      }
      
  }