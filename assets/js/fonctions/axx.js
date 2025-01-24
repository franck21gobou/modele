const axx = async (
  api,
  formDatas,
  btnLoad = "v",
  globalLoad = false,
  reqLog = false
) => {
  if (globalLoad) {
    $("#preloader").html(`
    <div class="row" style="position:fixed;z-index:9999;width:100%;height:100vh;background: linear-gradient(to right,#7474bf,#348ac7);opacity:0.5">
      <div class="col-md-12">
        <div class="preloader1">
          <div class="loader loader-inner-1">
            <div class="loader loader-inner-2">
              <div class="loader loader-inner-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>`);
  }
  $(`#${btnLoad}`).attr("disabled", true);
  let resp = await axios.post(api, formDatas, {
    headers: {
      auth: $.cookie(_i_My_Cookies.connexion),
      "Content-Type":
        "multipart/form-data; charset=utf-8; boundary=" +
        Math.random().toString(),
    },
  });

  $(`#${btnLoad}`).attr("disabled", false);
  try {
    !resp.data.result && alertify.error(resp.data.infos);
    if (reqLog && !resp.data.is_auth) {
      alert("Session expirée");
      deconnectNow();
    }
  } catch (error) {
    console.log(error);
    alertify.error(error);
  }

  $("#preloader").html("");

  return resp.data;
};
