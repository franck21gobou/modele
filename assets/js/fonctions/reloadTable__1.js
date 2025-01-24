const reloadTable = (db = null, fn = null) => {
    if(!db) db = $('#debutDate').val();
    if(!fn) fn = $('#finDate').val();
    console.log(db)
    if(db ){
        if(fn){
            let diff = moment(db).diff( moment(fn), "seconds" )
            if(diff <= 0){
                globalFormData.push({key:'debut', value: db})
                globalFormData.push({key:'fin', value: fn})
                asyncPost(globalFiltreData, globalFormData, 'v', true)
                .then(reponse =>{
                    reponse.result &&
                    tabulator.setData(reponse.data) 
                  //&&  $('#tb-title').append(`(du ${moment(db).format('DD/MM/YY')} à ${moment(fn).format('DD/MM/YY')})`)
                })
            }else notifyMy('Période invalide')
        } // else notifyMy('Veuillez saisir une date de fin')
    } // else notifyMy('Veuillez saisir une date de début')
}