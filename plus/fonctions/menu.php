<?php 
function menu($pdo){
    $resultat = [];
    $sql = "SELECT * FROM `menu`"; 
    $sql = $pdo->prepare($sql);

    try {
     $sql->execute(); 
        
     } catch (\Throwable $th) {
        $resultat = $th->getMessage();
        return $resultat;
     }

     while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
          $resultat[] = $row;
      }
    return $resultat;
}