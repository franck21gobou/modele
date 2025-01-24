const createEmptyModal = (title, contenu) => {
  $("#titreModal").html(title);

  $("#contenuModal").html(contenu);
  $("#staticBackdrop").modal("show");
};
