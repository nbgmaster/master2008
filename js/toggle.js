
  function ToggleCommentsS (id)  {

        if (document.getElementById("commentS_" + id).style.display == 'none')  { 

                document.getElementById("TImgCommentS_" + id).src = root_img + "media/images/collapse.gif";
                document.getElementById("commentS_" + id).style.display = "";
                document.getElementById("TImgCommentS_" + id).title = toggle_collapseC;

        }

        else  {

                document.getElementById("TImgCommentS_" + id).src = root_img + "media/images/expand.gif";
                document.getElementById("commentS_" + id).style.display = "none";
                document.getElementById("TImgCommentS_" + id).title = toggle_expandC;

        }

  }

  function ToggleCommentsW (id)  {

        if (document.getElementById("commentW_" + id).style.display == 'none')  { 

                document.getElementById("TImgCommentW_" + id).src = root_img + "media/images/collapse.gif";
                document.getElementById("commentW_" + id).style.display = "";
                document.getElementById("TImgCommentW_" + id).title = toggle_collapseD;

        }

        else  {

                document.getElementById("TImgCommentW_" + id).src = root_img + "media/images/expand.gif";
                document.getElementById("commentW_" + id).style.display = "none";
                document.getElementById("TImgCommentW_" + id).title = toggle_expandD;

        }

  }
      
  function ToggleAttachments (id)  {

        if (document.getElementById("attach_" + id).style.display == 'none')  { 

                document.getElementById("TImgAttach_" + id).src = root_img + "media/images/collapse.gif";
                document.getElementById("attach_" + id).style.display = "";
                document.getElementById("TImgAttach_" + id).title = toggle_collapse;

        }

        else  {

                document.getElementById("TImgAttach_" + id).src = root_img + "media/images/expand.gif";
                document.getElementById("attach_" + id).style.display = "none";
                document.getElementById("TImgAttach_" + id).title = toggle_expand;

        }

  }

  function ToggleAdmin (id)  {

        if (document.getElementById("admin_" + id).style.display == 'none')  { 

                document.getElementById("TImgAdmin_" + id).src = root_img + "media/images/collapse.gif";
                document.getElementById("admin_" + id).style.display = "";
                document.getElementById("TImgAdmin_" + id).title = toggle_collapseB;

        }

        else  {

                document.getElementById("TImgAdmin_" + id).src = root_img + "media/images/expand.gif";
                document.getElementById("admin_" + id).style.display = "none";
                document.getElementById("TImgAdmin_" + id).title = toggle_expandB;

        }

  }

