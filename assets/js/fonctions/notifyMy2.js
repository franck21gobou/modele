const notifyMy2 = (text, statut = "error", duration = 5000) => {
  // Display an error toast, with a title
  toastr.options.positionClass = "toast-bottom-left";
  toastr.options.closeButton = true;
  toastr.options.progressBar = true;
  toastr.options.timeOut = duration;

  toastr[statut](text, _i_Moi_Meme.nom);
};
