const formulaireWrite = (ligne, val) => {
  //// textBox
  if (ligne.type == "text")
    return (
      '<div class="form-group pt-2"><label for="' +
      ligne.value +
      '">' +
      ligne.label +
      '</label><input   class="form-control" id="' +
      ligne.value +
      '" type="text" placeholder="' +
      ligne.label +
      '" title="' +
      ligne.label +
      '" ' +
      ligne.required +
      '   name="' +
      ligne.value +
      '" ></div>'
    );

  //// textBox
  if (ligne.type == "switch")
    return (
      '<div class="form-group "><div class="pt-1  col-form-label"><div class="switch-button switch-button-yesno"><input type="checkbox"  name="' +
      ligne.value +
      '" id="' +
      ligne.value +
      '"><span> <label for="' +
      ligne.value +
      '"></label></span> </div><label for="' +
      ligne.value +
      '" style="cursor:pointer" class="l">' +
      ligne.label +
      "</label></div></div>"
    );

  //// textBox
  if (ligne.type == "select") {
    let optionSelect = "";
    ligne.items.map((opt) => {
      let optselected = "";
      if (val == opt.value) optselected = " selected ";
      optionSelect = optionSelect.concat(
        "",
        "<option " +
          optselected +
          ' value="' +
          opt.value +
          '">' +
          opt.label +
          "</option> "
      );
    });
    return (
      '<div class="form-group row"> <label class="col-12 col-sm-2 col-form-label for="' +
      ligne.value +
      '" ">' +
      ligne.label +
      '</label> <div class="col-12 col-sm-8 col-lg-6">  <select id="' +
      ligne.value +
      '" ' +
      ligne.required +
      ' name="' +
      ligne.value +
      '" class="select2 form-control"> <option> </option> ' +
      optionSelect +
      "  </select> </div> </div>"
    );
  } else return "";
};
