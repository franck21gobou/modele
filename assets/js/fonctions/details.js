const details = (detail) => {
    $('.ddbtn').hide('fast')
    globalFormData.push({key:'detail', value: detail })
    reloadTable()
}