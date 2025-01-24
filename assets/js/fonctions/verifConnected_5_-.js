const verifConnected = (must) => {
  let isAuth = false;
  if ($.cookie(_i_My_Cookies.connexion) && $.localStorage(_i_My_Storage.menu)) {
    isAuth = true;
  }

  if (must) {
    // auth requise
    if (!isAuth) {
      deconnectNow();
      return;
    }
  } else {
    // deja auth
    if (isAuth) {
      window.location.replace(_i_homePage);
      return;
    }
  }
};
