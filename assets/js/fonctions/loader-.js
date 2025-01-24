const loader = (etat) => {
    etat == "start" ?
    $('#weLoad').html(`<div style="z-index: 999999999;background-repeat: no-repeat; background-image: url('./assets/gif/a3.gif'); background-position: center; background-size:cover; height: 100vh; width:100%; object-fit:cover; position:fixed;opacity:40%"></div>`)
    : $('#weLoad').html(``)

}