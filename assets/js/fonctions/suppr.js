const suppr = (type, elt) => {
    swal.fire({
      title: "Êtes-vous sûr(e)?",
      showCancelButton: true,
      confirmButtonText: "Oui",
      cancelButtonText: "Non",
    }).then(result =>{
        console.log(result)
      if(result.value){
        let fd = [{key:'element', value: elt}]
        asyncPost('./api/' + type + '/delete', fd)
      }
    })
  }