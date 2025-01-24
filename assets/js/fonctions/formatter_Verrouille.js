function formatVerrouille (cell, formatterParams, onRendered){
    if( cell.getValue() == 1) return `<span title="Payé verrouillé en attente de validation"><i class="text-danger fas fa-lock"></i></span>`
    return ""
    }