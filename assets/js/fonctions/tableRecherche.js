var filterGroup = []
$(document).ready(()=>{


  $("#rechercherFull").on("keyup", function() {
    // filter input
    tabulator.setFilter(
    [
      filterGroup.map(filtre => {
        return {field: filtre.field, type: "like", value: $("#rechercherFull").val()}
      })
    ]
    )
  })


})