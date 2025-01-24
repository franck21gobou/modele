function rappro(mot1, mot2, longueur) {
    // Tableau de résultats
    var result = [];
  
    // Parcours du premier tableau (mot1)
    for (var i = 0; i < mot1.length; i++) {
      var a = mot1[i]; // Objet du premier tableau
  
      // Parcours du deuxième tableau (mot2)
      for (var j = 0; j < mot2.length; j++) {
        var b = mot2[j]; // Objet du deuxième tableau
  
        // Vérification si la longueur correspond
        if (a.mot.length === longueur && b.mot.length === longueur) {
          // Ajout de la correspondance au tableau de résultats
          result.push({ a: a, b: b });
        }
      }
    }
  
    // Retourner le tableau de résultats
    return result;
  }