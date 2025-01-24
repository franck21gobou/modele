// For Reading CSV File
const readCSV =  (fichierNom, rm = 0) => {



  return new Promise((resolve, reject) => {
      const  csvJSON = (csv, separator=";", rm)=>{

        var lines=csv.split("\n");

        var result = [];
        
        var headers=lines[0].split(separator);
        
        for(var i=0;i<lines.length;i++){
        if(i >= rm) {
              var obj = {};
              var currentline=lines[i].split(separator);

              for(var j=0;j<headers.length;j++){
                  obj[j] = currentline[j];
              }
 
            result.push(obj);
          }
            
            

        }
          // console.log(result)
        //return result; //JavaScript object
        return JSON.stringify(result); //JSON
      }


       const reader = new FileReader();
     
       reader.onend = reject;
       reader.onabort = reject;
      // reader.onload = () => resolve(reader.result);
       reader.onload = () => {
                // const text = reader.result;
                // const csvToJson = csvJSON(text);
            //  return  text ;
           
                resolve(JSON.parse(csvJSON(reader.result, ";", rm)))
            //  console.log(reader.result)
             // return text
            };
       reader.readAsText(new Blob([fichierNom], { type: fichierNom.type }));
      });
 
  }