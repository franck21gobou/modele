const lireData =  (extension, file, customHeader = []) => {// 🔴🔴🔴🔴 lecture des données du fichier
    let reponse = {
      result: false,
      data: []
    }
    return new Promise(function(resolve, reject) {
      // Fonction pour formater les dates au format souhaité
function formaterDates(data) {
  for (const row of data) {
    for (const key in row) {
      if(key == "Date")
      if (Object.prototype.hasOwnProperty.call(row, key)) {
        if (typeof row[key] === 'number' && !isNaN(row[key])) {
          // Vérifie si la valeur peut être une date numérique
          const date = XLSX.SSF.parse_date_code(row[key]);
          if (date) {
            // Formate la date au format souhaité (par exemple, 'dd/mm/yyyy')
            row[key] = `${date.y}-${date.m}-${date.d}`;
          }
        }
      }
    }
  }
  return data;
}

    if(extension == "csv" || extension == "xls" || extension == "xlsx"){
      // format excel ou csv
        const reader = new FileReader();
        reader.onload = (e) => {
          const data = new Uint8Array(e.target.result);
          const workbook = XLSX.read(data, { type: 'array' });
          const sheetName = workbook.SheetNames[0];
          const worksheet = workbook.Sheets[sheetName];
         // const json = XLSX.utils.sheet_to_json(worksheet); // pour utiliser les entetes du fichier
        //  const array = XLSX.utils.sheet_to_json(worksheet, { header: 1, dateNF: 'yyyy-mm-dd' }) // pour utiliser les clés (keys)
          const array = XLSX.utils.sheet_to_json(worksheet, { header: customHeader, dateNF: 'mm/dd/yyyy', cellDates: true }) // pour utiliser les entetes personnalisées
        //  Globaldata = json
        const dataAvecDatesFormatees = formaterDates(array);
        reponse = {
            result: true,
            data: dataAvecDatesFormatees
          }
          resolve(reponse)
          
        };
        reader.readAsArrayBuffer(file);
      } else{ 
        if(extension == "txt"){
            var reader = new FileReader();
            reader.onload = function() {
                var content = reader.result;
                try {
                  //  var jsonData = JSON.parse(content);
                  var dt = content.split(/\r?\n/);
                //  Globaldata = dt
                  $('#testme').attr("max", dt.length)
                  $('#ignoreLignes').attr("max", dt.length)
                  reponse = {
                    result: true,
                    data: dt
                  }
          resolve(reponse)
                } catch(error) {
                    reject(error);
                }
            };
            reader.onerror = function(error) {
                reject(error);
            };
            reader.readAsText(file);
        }
        else {
          notifyMy(`Extension ${extension} non gérée`)
          resolve(reponse)
        }
      }

      })

  }