const addRaccourci = () => {
  let html = "";

  raccourcisDisponibles.map((rac) => {
    html = html.concat(
      `<p class="btn btn-space btn-secondary" style="cursor:pointer" onclick="addThisRac(${rac.id})">
      <i class="icon icon-left mdi mdi-link"></i>${rac.name}</p>`
    );
  });
  return (
    Swal.fire({
      html: html,
      confirmButtonText: "Fermer",
    }),
    !1
  );
};

const addThisRac = (rc) => {
  var leCookie = $.cookie(_i_cookieDeConnexion);
  var formData = new FormData();
  formData.append("auth", leCookie);
  formData.append("main", rc);
  var addRacProm = asyncPost("api/creerRaccourci", formData);
  addRacProm.then((rac) => {
    if (rac.result) {
      alertify.success(rac.infos);
      lireRaccourcis();
    } else {
      alertify.error(rac.infos);
    }
  });
};
