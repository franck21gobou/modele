const axx = async (
  api,
  formDatas,
  btnLoad = "v",
  globalLoad = false,
  reqLog = false
) => {
  if (globalLoad) loader("start");
  else miniLoader("start");

  $(`#${btnLoad}`).attr("disabled", true);

  let formData = new FormData();
  formDatas.map((fm) => {
    if (!fm.file) formData.append(fm.key, fm.value);
    else {
      //console.log(fm);
      Object.keys(fm.file).map((key) => {
        formData.append(fm.key, fm.file[key]);
      });
    }
  });

  let resp = await axios.post(lienAPI + "/" + api, formData, {
    headers: {
      auth: $.cookie(_i_My_Cookies.connexion),
      "Content-Type":
        "multipart/form-data; charset=utf-8; boundary=" +
        Math.random().toString(),
    },
  });

  $(`#${btnLoad}`).attr("disabled", false);
  try {
    !resp.data.result && notifyMy2(resp.data.infos);
    console.log(resp.data);

    if (reqLog && !resp.data.is_auth) {
      alert("Session expirée");
      deconnectNow();
    }
  } catch (error) {
    console.log(error);
    console.log(resp.data);
    notifyMy2(error);
  }

  miniLoader("end");
  loader("end");

  return resp.data;
};
