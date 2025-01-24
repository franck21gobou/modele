 function sumCalc (values, formatterParams, onRendered){
    let sum =0;
     values.map(e=>{
        sum = parseFloat(sum) + parseFloat(e);
      });
    return toNum( sum); //return the contents of the cell;
}