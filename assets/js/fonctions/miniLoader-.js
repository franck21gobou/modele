const miniLoader = (etat) => {
  //   etat == "start"
  //     ? $("#weLoad").html(
  //         `<div style="z-index: 999999999;background-repeat: no-repeat; background-image: url('./assets/gif/a3.gif'); background-position: center; background-size:cover; height: 100vh; width:100%; object-fit:cover; position:fixed;opacity:40%"></div>`
  //       )
  //     : $("#weLoad").html(``);
  console.log(etat);
  if (etat == "start") {
    $("body").append(`
      <div style="background-color:rgba(250,250,250,0);  position:fixed;bottom:20px;right:15px;z-index:9999999;padding:10px" id="miniLoaderId">
      <img src="./assets/gif/XRT.gif?">
      </div>
      `);
  } else $("#miniLoaderId").remove();
};
