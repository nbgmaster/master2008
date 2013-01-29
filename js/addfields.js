  
  function addFields_design() {

      var row   = document.createElement("TR");

      var cell1 = document.createElement("TD");
      var cell2 = document.createElement("TD");
      var cell3 = document.createElement("TD");
      var cell4 = document.createElement("TD");
      var cell5 = document.createElement("TD");

      var input2 = document.createElement("INPUT"); 
      var input3 = document.createElement("INPUT"); 
      var input4 = document.createElement("INPUT");
      var input5 = document.createElement("INPUT");  

      input2.setAttribute("type","text");
      input2.setAttribute("name","design_new_german[]");
      input2.setAttribute("value","");
      input2.setAttribute("class","inp_design");
      input2.setAttribute("className","inp_design");

      input3.setAttribute("type","text");
      input3.setAttribute("name","design_new_english[]");
      input3.setAttribute("value","");
      input3.setAttribute("class","inp_design");
      input3.setAttribute("className","inp_design");

      input4.setAttribute("type","text");
      input4.setAttribute("name","design_new_hexcode[]");
      input4.setAttribute("value","");
      input4.setAttribute("class","inp_design");
      input4.setAttribute("className","inp_design");

      input5.setAttribute("type","text");
      input5.setAttribute("name","design_new_imgfolder[]");
      input5.setAttribute("value","");
      input5.setAttribute("class","inp_design");
      input5.setAttribute("className","inp_design");

      input2.name = "design_new_german[]";
      input3.name = "design_new_english[]";
      input4.name = "design_new_hexcode[]";
      input5.name = "design_new_imgfolder[]";
                 
      cell2.appendChild(input2);
      cell3.appendChild(input3);
      cell4.appendChild(input4);
      cell5.appendChild(input5);

      row.appendChild(cell1);
      row.appendChild(cell2); 
      row.appendChild(cell3);
      row.appendChild(cell4);
      row.appendChild(cell5);                                  

      document.getElementById("addFields_design").appendChild(row);


  }

  
  function addFields_profile() {

      var row   = document.createElement("TR");

      var cell1 = document.createElement("TD");
      var cell2 = document.createElement("TD");
      var cell3 = document.createElement("TD");
      var cell4 = document.createElement("TD");
      var cell5 = document.createElement("TD");
      
      var input2 = document.createElement("INPUT"); 
      var input3 = document.createElement("INPUT"); 
      var input4 = document.createElement("INPUT");
      var input5 = document.createElement("INPUT");
      
      input2.setAttribute("type","text");
      input2.setAttribute("name","profile_new_german[]");
      input2.setAttribute("value","");
      input2.setAttribute("class","inp_design");
      input2.setAttribute("className","inp_design");

      input3.setAttribute("type","text");
      input3.setAttribute("name","profile_new_english[]");
      input3.setAttribute("value","");
      input3.setAttribute("class","inp_design");
      input3.setAttribute("className","inp_design");

      input4.setAttribute("type","text");
      input4.setAttribute("name","profile_new_value[]");
      input4.setAttribute("value","");
      input4.setAttribute("class","inp_design");
      input4.setAttribute("className","inp_design");

      input5.setAttribute("type","text");
      input5.setAttribute("name","profile_new_value_EN[]");
      input5.setAttribute("value","");
      input5.setAttribute("class","inp_design");
      input5.setAttribute("className","inp_design");

      input2.name = "profile_new_german[]";
      input3.name = "profile_new_english[]";
      input4.name = "profile_new_value[]";
      input5.name = "profile_new_value_EN[]";
                       
      cell2.appendChild(input2);
      cell3.appendChild(input3);
      cell4.appendChild(input4);
      cell5.appendChild(input5);
      
      row.appendChild(cell1);
      row.appendChild(cell2); 
      row.appendChild(cell3);
      row.appendChild(cell4);                               
      row.appendChild(cell5);   
      
      document.getElementById("addFields_profile").appendChild(row);


  }


  function addFields_references() {

      var row   = document.createElement("TR");

      var cell1 = document.createElement("TD");
      var cell2 = document.createElement("TD");
      var cell3 = document.createElement("TD");
      var cell4 = document.createElement("TD");
      
      var input2 = document.createElement("INPUT"); 
      var input3 = document.createElement("INPUT"); 
      var input4 = document.createElement("INPUT"); 
      
      input2.setAttribute("type","text");
      input2.setAttribute("name","ref_new_link[]");
      input2.setAttribute("value","");
      input2.setAttribute("class","inp_quicklinks");
      input2.setAttribute("className","inp_quicklinks");

      input3.setAttribute("type","text");
      input3.setAttribute("name","ref_new_description[]");
      input3.setAttribute("value","");
      input3.setAttribute("class","inp_quicklinks");
      input3.setAttribute("className","inp_quicklinks");

      input4.setAttribute("type","text");
      input4.setAttribute("name","ref_new_description_EN[]");
      input4.setAttribute("value","");
      input4.setAttribute("class","inp_quicklinks");
      input4.setAttribute("className","inp_quicklinks");

      input2.name = "ref_new_link[]";
      input3.name = "ref_new_description[]";
      input4.name = "ref_new_description_EN[]";
                       
      cell2.appendChild(input2);
      cell3.appendChild(input3);
      cell4.appendChild(input4);
      
      row.appendChild(cell1);
      row.appendChild(cell2); 
      row.appendChild(cell3);                            
      row.appendChild(cell4);  
      
      document.getElementById("addFields_references").appendChild(row);


  }
  
  function addFields_links_c() { 

      var row   = document.createElement("TR");

      var cell1 = document.createElement("TD");
      var cell2 = document.createElement("TD");
      var cell3 = document.createElement("TD");

      var input2 = document.createElement("INPUT"); 
      var input3 = document.createElement("INPUT"); 

      input2.setAttribute("type","text");
      input2.setAttribute("name","links_c_new_german[]");
      input2.setAttribute("value","");
      input2.setAttribute("class","inp_links_c");
      input2.setAttribute("className","inp_links_c");

      input3.setAttribute("type","text");
      input3.setAttribute("name","links_c_new_english[]");
      input3.setAttribute("value","");
      input3.setAttribute("class","inp_links_c");
      input3.setAttribute("className","inp_links_c");

      input2.name = "links_c_new_german[]";
      input3.name = "links_c_new_english[]";
                 
      cell2.appendChild(input2);
      cell3.appendChild(input3);

      row.appendChild(cell1);
      row.appendChild(cell2); 
      row.appendChild(cell3);                            

      document.getElementById("addFields_links_c").appendChild(row);


  }

  function addFields_links_l(cid) {

      var row   = document.createElement("TR");

      var cell1 = document.createElement("TD");
      var cell2 = document.createElement("TD");
      var cell3 = document.createElement("TD");
      var cell4 = document.createElement("TD");
      
      var input2 = document.createElement("INPUT"); 
      var input3 = document.createElement("INPUT"); 
      var input4 = document.createElement("INPUT"); 
      var input5 = document.createElement("INPUT"); 
      
      input2.setAttribute("type","text");
      input2.setAttribute("name","links_l_new_link[]");
      input2.setAttribute("value","");
      input2.setAttribute("class","inp_design");
      input2.setAttribute("className","inp_design");

      input3.setAttribute("type","text");
      input3.setAttribute("name","links_l_new_description[]");
      input3.setAttribute("value","");
      input3.setAttribute("class","inp_links_l");
      input3.setAttribute("className","inp_links_l");
 
      input4.setAttribute("type","text");
      input4.setAttribute("name","links_l_new_description_EN[]");
      input4.setAttribute("value","");
      input4.setAttribute("class","inp_links_l");
      input4.setAttribute("className","inp_links_l");

      input5.setAttribute("type","hidden");
      input5.setAttribute("name","links_l_new_cid[]");
      input5.setAttribute("value",cid);

      input2.name = "links_l_new_link[]";
      input3.name = "links_l_new_description[]";
      input4.name = "links_l_new_description_EN[]";
      input5.name = "links_l_new_cid[]";
                 
      cell2.appendChild(input2);
      cell3.appendChild(input3);
      cell4.appendChild(input4);
      cell4.appendChild(input5);    
       
      row.appendChild(cell1);
      row.appendChild(cell2); 
      row.appendChild(cell3);    
      row.appendChild(cell4);  
      
      field = "addFields_links_l_" + cid;                        

      document.getElementById(field).appendChild(row);

  }