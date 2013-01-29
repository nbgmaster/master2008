
  tags = new Array();

  function getarraysize2(thearray)  {

      for (i = 0; i < thearray.length; i++)  {

           if ((thearray[i] == "undefined") || (thearray[i] == "") || (thearray[i] == null)) return i;

      }

      return thearray.length;

  }

  function arraypush2(thearray,value)  {
  
      thearraysize = getarraysize(thearray);
      thearray[thearraysize] = value;

  }

  function arraypop2(thearray)  {
 
      thearraysize = getarraysize(thearray);
      retval = thearray[thearraysize - 1];
      delete thearray[thearraysize - 1];
      return retval;

  }

  modevalue = 1;

  function normalmode2(theform)  {

      return true;

  }

  function stat2(thevalue)  {

      document.form.status.value = eval(thevalue+"_text");

  }

  function setfocus2(theform)  {

      theform.message_EN.focus();

  }

  var selectedText = "";

  AddTxt = "";

  function getActiveText2(msg)  { 

      selectedText = (document.all) ? document.selection.createRange().text : document.getSelection();
   
      if (msg.createTextRange) msg.caretPos = document.selection.createRange().duplicate();

      return true;

  }

  function AddText2(NewCode,theform)  {

      if (theform.message_EN.createTextRange && theform.message_EN.caretPos)  {

          var caretPos = theform.message_EN.caretPos;
 
          caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? NewCode + ' ' : NewCode;

      } 

      else theform.message_EN.value+=NewCode

      AddTxt = "";

      setfocus(theform);

  }

  function bbcode2(theform,bbcode,prompttext) {
  
      setfocus(theform);

      var input = document.forms['form'].elements['message_EN'];

      /* IE browser */
     
         if (typeof document.selection != 'undefined')  {

             selectedText2 = (document.all) ? document.selection.createRange().text : document.getSelection();

         }

      /* gecko browsers */
   
         else if (typeof input.selectionStart != 'undefined')  {

              var start   = input.selectionStart;
              var end     = input.selectionEnd;
              var insText = input.value.substring(start, end);

              selectedText2 = insText.length;

         }

      /* other browsers */
 
         else  {

              selectedText2 = '';

         }

         if (selectedText2 == "")  {

             if ((normalmode(theform)) || (bbcode=="IMG")) { 

                 prompt_contents = "http://";

                 if (!selectedText2) var dtext=selectedText2;

                 else var dtext=prompttext;

                 inserttext = prompt(tag_prompt,prompt_contents); 

                 if ((inserttext != null) && (inserttext != ""))  {  

                      AddTxt = "["+bbcode+"]"+inserttext+"[/"+bbcode+"]";
 
                      aTag = "["+bbcode+"]"; eTag = "[/"+bbcode+"]";

                      insert2(aTag, eTag, '', '', inserttext);

                 }

             }

             else  { 

                  donotinsert = false;

                  for (i = 0; i < tags.length; i++) {
  
                       if (tags[i] == bbcode) donotinsert = true;
 
                  }

                  if (!donotinsert)  {

                      theform.message_EN.value += "["+bbcode+"]";

                      arraypush(tags,bbcode);

                  }

             }

         }

         else  {

              aTag = "["+bbcode+"]"; eTag = "[/"+bbcode+"]";

              insert2(aTag, eTag, '', '', '');

         } 

         setfocus(theform);

  }

  function fontformat2(theform,thevalue,thetype)  {

      setfocus(theform);

      if (normalmode(theform))  {

          if (thevalue != 0)  {

              if (selectedText) var dtext=selectedText;

              else var dtext="";

              inserttext = prompt(font_formatter_prompt+" "+thetype,dtext);

              if ((inserttext != null) && (inserttext != ""))  {

                   AddTxt = "["+thetype+"="+thevalue+"]"+inserttext+"[/"+thetype+"] ";

                   insert(AddTxt,theform);
               
              }

          }
 
     }

     else  {
 
          theform.message_EN.value += "["+thetype+"="+thevalue+"]";
          arraypush(tags,thetype);

     }

     setfocus(theform);

  }

  function namedlink2(theform,thetype)  {

      if (selectedText)  { 

          var dtext=selectedText;

      }

      else  { 

          var dtext="";

      }

      var input = document.forms['form'].elements['message_EN'];

      /* IE browser */
  
         if (typeof document.selection != 'undefined')  {

             selectedText2 = (document.all) ? document.selection.createRange().text : document.getSelection();

         }
  
      /* gecko browsers */
  
         else if (typeof input.selectionStart != 'undefined')  {

                  var start   = input.selectionStart;
                  var end     = input.selectionEnd;
                  var insText = input.value.substring(start, end);

                  selectedText2 = insText.length;

         }

      /* other browsers */
  
         else  {

              selectedText2 = '';

         }

         if (selectedText2 == "")  {

	     linktext = prompt(link_text_prompt,dtext);

         }

         else  {

             linktext = ''; 

         }

	 var prompttext;
		
         if (thetype == "URL")  {

	     prompt_text     = link_url_prompt;
             prompt_contents = "http://";
			
         }

	 else  {

	     prompt_text = link_email_prompt;
	     prompt_contents = "";
			
         }

	 linkurl = prompt(prompt_text,prompt_contents);
	 
         if ((linkurl != null) && (linkurl != ""))  {

	      if ((linktext != null) && (linktext != ""))  {

                   aTag   = "["+thetype+"="+linkurl+"]"; eTag = "[/"+thetype+"]";

                   AddTxt = "["+thetype+"="+linkurl+"]"+linktext+"[/"+thetype+"]";

		   insert2(aTag,eTag,'', linkurl, linktext);
			
	      }

              else  {
        
                   aTag = "["+thetype+"="+linkurl+"]"; eTag = "[/"+thetype+"]";

		   AddTxt = "["+thetype+"]"+linkurl+"[/"+thetype+"]";

                   if (selectedText2 == "")  {

		       insert2(aTag,eTag,'', linkurl, '');

                   }  

                   else  {

		       insert2(aTag,eTag,'', '', '');

                   }
			
              }

	 }

  }

  function quotethis2(theform,thetype)  {

      if (selectedText)  { 

          var dtext=selectedText;

      } 

      else  { 

          var dtext="";

      }

      var input = document.forms['form'].elements['message_EN'];

      /* IE browser */
  
         if (typeof document.selection != 'undefined')  {

             selectedText2 = (document.all) ? document.selection.createRange().text : document.getSelection();

         }

      /* gecko browsers */
  
         else if (typeof input.selectionStart != 'undefined')  {

             var start   = input.selectionStart;
             var end     = input.selectionEnd;
             var insText = input.value.substring(start, end);

             selectedText2 = insText.length;

         }

      /* other browsers */

         else  {

              selectedText2 = '';

         }

         if (selectedText2 == "")  {

	     linktext = prompt(name_text_prompt,dtext);

         }

         else  {

             linktext = prompt(name_text_prompt,dtext);

         }

	 var prompttext;
		
         if (thetype == "QUOTE")  {

	     prompt_text = quote_url_prompt;
	     prompt_contents = "";
	
         }

	 else  {
			
             prompt_text = link_email_prompt;		
             prompt_contents = "";
			
         }

         if (selectedText2 == "")  {

             linkurl = prompt(prompt_text,prompt_contents);

         }

         else  { 

	     linkurl = '';

         }

         if ((linktext != null) && (linktext != ""))  {

              aTag = "["+thetype+"="+linktext+"]"; eTag = "[/"+thetype+"]";

              if (selectedText2 == "")  {

	          insert2(aTag,eTag,'', linktext, linkurl);

              }

              else  {

		  insert2(aTag,eTag,'', '', linkurl);

              }
		
	  }
		 
          else  { 
                     
              aTag = "["+thetype+"]"; eTag = "[/"+thetype+"]";

              if (selectedText2 == "")  {

	          insert2(aTag,eTag,'', linkurl, '');

              }  

              else  { 

                  if (linkurl != "")  {  

                      aTag = "["+thetype+"="+linkurl+"]";

                  } 

                  else  {

                      aTag = "["+thetype+"]";

                  }

		  insert2(aTag,eTag,'', '', '');

              }
			
         }

  }

  function insert2(aTag, eTag, CoSi, linkurl, linktext)  {

      CoSiNoNull = 1;

      if (CoSi != "")  {

          aTag = aTag + "=" + CoSi + "]";

          CoSiNoNull = CoSi;

      }

      if (aTag == "[LIST]")  {

          aTag = "\n[LIST]\n[*]1\n\n[LIST]\n[*]1.1\n[/LIST]\n\n[*]2\n";

      }

      if (CoSiNoNull != "0")  {

          var input = document.forms['form'].elements['message_EN'];
          input.focus();

          /* IE browser */
 
             if (typeof document.selection != 'undefined')  {
                                
                 var range    = document.selection.createRange();
                 var insText  = range.text;
                 var insText2 = '';

                 if (linktext != "")  { 

                     insText2 = linktext;

                 }

                 else if (linkurl != "")  {

                     insText2 = linkurl;

                 }

                 range.text = aTag + insText + insText2 + eTag;

                 range = document.selection.createRange();
   
                 if (insText.length == 0)  { 

                     range.move('character', -eTag.length);
   
                 } 

                 else  {

                     range.moveStart('character', aTag.length + insText.length + eTag.length);      

                 }
  
                 range.select();

             }

          /* gecko browsers */

             else if (typeof input.selectionStart != 'undefined')  {

                 var start   = input.selectionStart;
                 var end     = input.selectionEnd;
                 var insText = input.value.substring(start, end);

                 if (linktext != "")  {

                     insText = linktext  + insText;

                 }

                 else if (linkurl != "")  {

                     insText = linkurl + insText;

                 }

                 input.value = input.value.substr(0, start) + aTag + insText + eTag + input.value.substr(end);

                 var pos;
    
                 pos = start + aTag.length;

                 input.selectionStart = pos;
                 input.selectionEnd = pos;

             }

          /* other browsers */

             else  {

                 var pos;
  
                 var re = new RegExp('^[0-9]{0,3}$');

                 while (!re.test(pos))  {

                        pos = prompt("insert at position (0.." + input.value.length + "):", "0");

                 }

                 if (pos > input.value.length)  {

                     pos = input.value.length;

                 }

                 var insText = prompt("particular text, which should be formatted:");

                 if (linktext != "")  {

                     insText = linktext + " " + insText;

                 }

                 else if (linkurl != "")  {

                     insText = linkurl + " " + insText;

                 }

                 input.value = input.value.substr(0, pos) + aTag + insText + eTag + input.value.substr(pos);

             }

             input.focus();

      }

  }

