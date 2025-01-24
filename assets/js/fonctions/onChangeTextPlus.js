const onchangeTextPlus = (id, hidden) => {
    $(`#${id}`).on("change", ()=>{
        notifyMy('Une nouvelle donnée a été saisie. Vous pouvez l\'enregistrer ', '#75A8E8')
        $(`#${hidden}`).val("")
    })
    
}