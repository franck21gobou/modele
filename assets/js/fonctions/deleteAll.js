const deleteAll = (type) => {
  let api = "";
  if (type == "Audit") api = "./api/audit/delete/All"; // audit

  /////// traitement
  return (
    Swal.fire({
      icon: "info",
      text: "Voulez-vous réellement tout supprimer?",
      confirmButtonText: "Oui ",
      cancelButtonText: "Annuler ",
      showCancelButton: true,
      showCloseButton: true,
    }).then((result) => {
      if (result) {
        if (result.value) {
          var rep = asyncPost(api, AuthformData);
          rep.then((answer) => {
            try {
              if (answer.result) {
                alertify.success(answer.infos);
                reloadTable();
              } else {
                alertify.error(answer.infos);
              }
            } catch (error) {
              console.log(error);
              alertify.error("Erreur de connexion");
            }
          });
        }
      }
    }),
    !1
  );
};
