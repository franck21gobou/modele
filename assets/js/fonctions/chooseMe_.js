const chooseMe = (id, hidden, group) => {
   proposeOnModal(id, hidden, group)
}


const proposeOnModal = (id, hidden, group) => {
    $("#modal-title").html("Double clic pour sélectionner une valeur")
    $("#modal-body").html("")

    //define table
    var thisTable = new Tabulator("#modal-body", {
        data:[],
        layout: "fitColumns",
        columns:[
            {title:" ", field:"label", headerFilter:true}
        ],
    });

    thisTable.on("rowDblClick", function(e, row){
        $(`#${id}`).val(row.getData().label)
        $(`#${hidden}`).val(row.getData().id)
        $("#mod-success").modal('hide');
        notifyMy("Ajouté depuis la base 😃", "green")

    });

    asyncPost("./api/"+group+"/open").then(reponse => {
        thisTable.setData(reponse.data)
        $("#mod-success").modal('show');
    })

}