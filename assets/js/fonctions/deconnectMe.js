const deconnectMe = () => {
  if (confirm("Êtes-vous sûr?")) {
    deconnectNow();
  }
};

const deconnectNow = () => {
  Object.entries(_i_My_Cookies).map(([key, value]) => {
    // supprimer les cookies
    $.cookie(value, "", { expires: -1 });
    $.localStorage(value, null);
	$.localStorage(_i_My_Storage.menu, null);
  });

  window.location.replace(_i_loginPage);
};

const connectNow = (rep) => {
  var menu = rep.data.menu;

  try {
    $.localStorage(_i_My_Storage.menu, menu);
    $.cookie(_i_My_Cookies.connexion, rep.data.token, {
      expires: rep.data.duree || 12,
      path: "/",
    });
    $.cookie(_i_My_Cookies.user, JSON.stringify(rep.data.user), {
      expires: rep.data.duree || 12,
      path: "/",
    });
    $.cookie(_i_My_Cookies.droits, JSON.stringify(rep.data.droits), {
      expires: rep.data.duree || 12,
      path: "/",
    });
    window.location.replace(_i_homePage);
  } catch (error) {
    console.log(error);
    notifyMy("Erreur de base de donnée");
  }
};
