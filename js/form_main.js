
  function checkForm()  {

      mailer_exist = document.getElementById("mailer");

      title_exist     = document.getElementById("title");
      title_EN_exist  = document.getElementById("title");
      
      Efile1 = document.form.file1;
      Efile2 = document.form.file2;
      Efile3 = document.form.file3;

      msg = document.form.message.value;
      msg_EN = document.form.message_EN.value;
      
      result  = msg.search(/\n/);  
      result2 = msg_EN.search(/\n/);  
      
      var error = 0;  
 
      while ( result != -1 )  {

              msg    = msg.replace(/\n/,"");  
              result = msg.search(/\n/);   
        
      }

      while ( result2 != -1 )  {

              msg_EN    = msg_EN.replace(/\n/,"");  
              result2   = msg_EN.search(/\n/);   
        
      }
      
      if ( mailer_exist )  {

           mail = document.getElementById("mailer").value;
           var mailOK = true;


           if (!mail) mailOK = false;



           if (mail.indexOf ("@") == -1) mailOK = false;



           if (mail.indexOf ("@") == 0 || mail.lastIndexOf ("@") == mail.length - 1) mailOK = false;



           if (mail.indexOf ("@") != mail.lastIndexOf ("@")) mailOK = false;

           var mailer       = document.form.mailer.value.split(" "); 
           var mailerB      = mailer.join("");
           var mailerLength = mailerB.length;

           if ( mailerLength < 3 || !mailOK )  {

                alert( alert_mail );

                document.form.mailer.focus();

                return false;

                error = 1;

           }

      }

      if ( title_exist )  {

           var title       = document.form.title.value.split(" "); 
           var titleB      = title.join("");
           var titleLength = titleB.length;

           if ( titleLength < 3 )  {

                alert( alert_title );

                document.form.title.focus();

                return false;

                error = 1;

           }

      }

      if ( title_EN_exist )  {

           var title_EN       = document.form.title_EN.value.split(" "); 
           var titleB_EN      = title_EN.join("");
           var titleLength_EN = titleB_EN.length;

           if ( titleLength_EN < 3 )  {

                alert( alert_title );

                document.form.title_EN.focus();

                return false;

                error = 1;

           }

      }
      
      if ( msg.length >= 5 )  {

           var msg = document.form.message.value.split(" "); 
           var msg = msg.join("");

      }

      if ( msg.length < 5 )  {

           alert( alert_msg );

           document.form.message.focus();

           return false;

           error = 1;

      }
      
      if ( msg_EN.length >= 5 )  {

           var msg_EN = document.form.message_EN.value.split(" "); 
           var msg_EN = msg_EN.join("");

      }

      if ( msg_EN.length < 5 )  {

           alert( alert_msg );

           document.form.message_EN.focus();

           return false;

           error = 1;

      }

      if ( Efile1 )  {

           file1 = document.form.file1.value;

           fileformat1 = file1.substring(file1.length-3,file1.length);

           if ( file1.length > 0 && fileformat1 != "jpg" && fileformat1 != "gif" && fileformat1 != "png" && fileformat1 != "txt" && fileformat1 != "pdf" && fileformat1 != "zip" && fileformat1 != "rar" && fileformat1 != "doc" && fileformat1 != "docx" && fileformat1 != "ocx" && fileformat1 != "xls" && fileformat1 != "lsx" && fileformat1 != "ppt" && fileformat1 != "ptx" )  {

                alert_m1 = alert_fileA + "\n" + file1 + "\n" + alert_fileB;

                alert (alert_m1);

                document.form.file1.focus();

                return false;

           }

      }

      if ( Efile2 )  {

           file2 = document.form.file2.value;

           fileformat2 = file2.substring(file2.length-3,file2.length);

           if ( file2.length > 0 && fileformat2 != "jpg" && fileformat2 != "gif" && fileformat2 != "png" && fileformat2 != "txt" && fileformat2 != "pdf" && fileformat2 != "zip" && fileformat2 != "rar" && fileformat2 != "doc" && fileformat2 != "docx" && fileformat2 != "ocx" && fileformat2 != "xls" && fileformat2 != "lsx" && fileformat2 != "ppt" && fileformat2 != "ptx" )  {

                alert_m2 = alert_fileA + "\n" + file2 + "\n" + alert_fileB;

                alert (alert_m2);

                document.form.file2.focus();

                return false;

           }

      }

      if ( Efile3 )  {

           file3 = document.form.file3.value;

           fileformat3 = file3.substring(file3.length-3,file3.length);

           if ( file3.length > 0 && fileformat3 != "jpg" && fileformat3 != "gif" && fileformat3 != "png" && fileformat3 != "txt" && fileformat3 != "pdf" && fileformat3 != "zip" && fileformat3 != "rar" && fileformat3 != "doc" && fileformat3 != "docx" && fileformat3 != "ocx" && fileformat3 != "xls" && fileformat3 != "lsx" && fileformat3 != "ppt" && fileformat3 != "ptx" )  {

                alert_m3 = alert_fileA + "\n" + file3 + "\n" + alert_fileB;

                alert (alert_m3);

                document.form.file3.focus();

                return false;

           }

      }

      if ( mailer_exist && error == 0 )  {

           alert(alert_sent);

      }

  }