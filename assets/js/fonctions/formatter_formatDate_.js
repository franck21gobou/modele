function formatDate (cell, formatterParams, onRendered){

    return moment( cell.getValue()).format("dddd DD MMMM YYYY") ; //return the contents of the cell;
}