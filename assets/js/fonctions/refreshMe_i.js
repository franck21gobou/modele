const refreshMe = (selectId, type, defaut, first = true, f = "") => {
    let loading = notifyMy('Traitement...', "orange", 0, true)
    let fdt = [{key: "main", value: f}]
    asyncPost("./api/"+type+"/open", fdt).then(source => {
        data = source.data
        loading.hideToast()
        if(!first)
        if(source.result)
        notifyMy(type + ' mis à jour', "green")

        const choices = new Choices("#"+selectId, {choices: data} ).setValueByChoice(defaut)
        return choices

    })
}