
  function checkForm()  { 

      var title       = document.form.title.value.split(" "); 
      var titleB      = title.join("");
      var titleLength = titleB.length;

      var title_EN       = document.form.title_EN.value.split(" "); 
      var titleB_EN      = title_EN.join("");
      var titleLength_EN = titleB_EN.length;
      
      if ( titleLength < 3 )  { 

           alert( alert_title );

           document.form.title.focus();

           return false;

      }

      else if ( titleLength_EN < 3 )  { 

           alert( alert_title );

           document.form.title_EN.focus();

           return false;

      }

  }