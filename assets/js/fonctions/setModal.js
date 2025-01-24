function setmodal(header, content) {
  $("#mod-success").modal("show");
  document.getElementById("modal-title").innerHTML = header;
  document.getElementById("modal-body").innerHTML = content;
}
