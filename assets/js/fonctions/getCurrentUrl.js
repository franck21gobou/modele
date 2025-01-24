function getCurrentURL (nbr) {
    let url = (window.location.href).split("/")[nbr]
    return url
  }