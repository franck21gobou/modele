function formatMois (cell, formatterParams, onRendered){

    return moment( cell.getValue()).format("MMMM YYYY") ; //return the contents of the cell;
}