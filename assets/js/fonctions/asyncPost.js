async function asyncPost(
  url,
  fdt = [],
  btnLoad = "v",
  globalLoad = false,
  reqLog = true
) {
  if (globalLoad) loader("start");

  let formData = new FormData();
  fdt.map((fm) => {
    formData.append(fm.key, fm.value);
  });

  //$.cookie('name', 'value', { expires: 7, path: '/' });
  //console.log($.cookie('name'));
  $(`#${btnLoad}`).attr("disabled", true);
  const response = await fetch(lienAPI + "/" + url, {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      auth: $.cookie(_i_My_Cookies.connexion),
    },
    body: JSON.stringify(Object.fromEntries(formData.entries())),
  });
  var data = await response.text();
  try {
    data = JSON.parse(data); // Extracting data as a JSON Object from the response
    $(`#${btnLoad}`).attr("disabled", false);
    !data.result && notifyMy(data.infos);
    console.log(data);

    if (reqLog && !data.is_auth) {
      alert("Session expirée, Veuillez vous reconnecter");
      deconnectNow();
    }
  } catch (error) {
    console.log(data);
    console.log(error);
    notifyMy("Une erreur est survenue 😭");
  }
  if (globalLoad) loader("end");

  return data;
}
