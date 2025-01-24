const initMenu = (groupe = "_", page = "_") => {
  var menu = $.localStorage(_i_My_Storage.menu) || [];
  var user = JSON.parse($.cookie(_i_My_Cookies.user));

  let mn = "";
  try {
    menu.map((smenu, cley) => {
      let open = "";
      if (groupe == smenu.nom) open = " has-active";
      if (smenu.type == "lien") {
        if (smenu.smenu.length) {
          let open = "",
            isopen;
          if (groupe == smenu.nom) {
            open = " show";
            isopen = true;
          }

          mn = `${mn}
         <li>
                        <a href="javascript: void(0);"><i class="fa fa-play-circle align-self-center menu-icon"></i><span> ${smenu.nom} </span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="${isopen}">
                            `;
          smenu.smenu.map((lien) => {
            let activ = "";
            if (page == lien.nom) activ = " active";
            mn = `${mn}
                              <li class="nav-item" title="${
                                lien.aide || lien.nom
                              }"><a class="nav-link ${activ}" href="${
              lien.lien
            }"><i class="ti-control-record"></i>${lien.nom}</a></li>`;
          });
          mn = `${mn}
          </ul>
				</li>
          `;
        } else {
          let activ = "";
          if (page == lien.nom) activ = " active";
          mn = `
          <li class="nav-item"><a href="${smenu.lien}" class="nav-link ${activ}" ><i class="bi bi-${smenu.icone} fa-fw me-2"></i>${smenu.nom}</a></li>
          `;
        }
      } else {
        mn = `
            ${mn}
            <hr class="hr-dashed hr-menu">
                    <li class="menu-label my-2">${smenu.nom}</li>`;
      }
      $("#leftSideElements").html(mn);
    });
    $(".account-name").html(user.nom);
    $(".account-description").html(user.email);
  } catch (error) {
    console.warn("unable to connect");
  }
};
