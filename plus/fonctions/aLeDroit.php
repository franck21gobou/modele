<?php


 function aLeDroit($pdo, $profil, $ligne, $droit /* vérifie si un droit est actif pour une ligne */){
  $tabDroit = [
    "C" =>"create",
    "R"=>"read",
    "U"=>"update",
    "D"=>"delete",
  ];  
  $leDroit = $tabDroit[$droit]."_profil_menu";

  
  $requete = "SELECT `valeur_profil_menu`, nom_menu FROM `profil_menu` LEFT JOIN menu ON menu.id_menu = profil_menu.`#id_menu` LEFT JOIN profil ON profil_menu.`#id_profil` = profil.id_profil WHERE id_profil = $profil AND $leDroit = 1 AND nom_menu = '$ligne' GROUP BY `id_profil_menu`";
    $req = $pdo->query($requete);
  if($row = $req->fetch( PDO::FETCH_ASSOC)) {
     // return $row;
      if($row != []){
        return true;
      } else return false;
  }else return false;
}