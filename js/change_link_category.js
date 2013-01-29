

  function change_link_category(cid) {
  
      newlocation = root_img + 'links/';

      if (cid > 0) newlocation = newlocation + 'category/' + cid + '/';

      location.href= newlocation;

  }