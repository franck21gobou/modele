const deleteSelection = (func) => {
  let arr = [];
  $("input:checked").each(function () {
    if ($(this).attr("class") == "custom-control-input tableCheck")
      arr.push($(this).attr("id").substring(5));
  });
  if (arr.length == 0) alertify.error("La liste est vide");
  else deleteFunc(func, arr);
};
