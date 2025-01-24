const imprimerTable = (tb) => {
    tabulator.print(false, true);
}

const xlsFile = (nom) =>{
    tabulator.download("xlsx", nom +".xlsx", {sheetName:"Salomon"}); //download a xlsx file that has a sheet name of "MyData"
}



const pdfFile = (nom) =>{
    tabulator.download("pdf", nom + ".pdf", {
        orientation:"portrait", //set page orientation to portrait
        autoTable:function(doc){
            //doc - the jsPDF document object
    
            //add some text to the top left corner of the PDF
            doc.text(nom, 15, 15);
           
    
            //return the autoTable config options object
            return 
        },
    });
}