const inform = (type, id) => {

  var msg = notifyMy("Loading...", "orange", 0, true);
  let api =  `./api/${type}/info/` + id; // projet
  asyncPost(api).then((rep) => {
    //console.log(rep)
    let afficheText = "<div class='row' style='border: solid 1px'>";
    for (const [key, value] of Object.entries(rep.data)) {
      if (
        key.substring(0, 2) != "id" &&
        key.substring(0, 3) != "#id" &&
        key.substring(0, 3) != "mdp" &&
        key.substring(0, 4) != "sexe" &&
        key.substring(0, 5) != "slug_"
      )
        afficheText = afficheText.concat(
          `<div class="col-6" style='border: solid 1px grey; padding: 5px'>- <b>${key.replace(/_/g, " ")}:</b> ${value} </div>`
        );
    }
    afficheText = afficheText.concat("</div>");
    msg.hideToast();
    return alertify.alert("Détails", afficheText);
  });
};




////supprimer
const deleteFunc = (type, id) => {

  let api =  `./api/${type}/delete` ; // api
  return (
    Swal.fire({
      icon: "info",
      text: "Voulez-vous réellement supprimer?",
      confirmButtonText: "Oui ",
      cancelButtonText: "Annuler ",
      showCancelButton: true,
      showCloseButton: true,
    }).then((result) => {
      if (result.value) {
        if (result) {
          var rep = asyncPost(api, [{key: "main", value: id}]);
          rep.then((answer) => {
            try {
              if (answer.result) {
                notifyMy(answer.infos, "green");
                reloadTable();
              } 
            } catch (error) {
              console.log(error);
              notifyMy("Erreur de connexion");
            }
          });
        }
      }
    }),
    !1
  );
};



