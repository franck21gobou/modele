<?php
require_once './plus/api.php';
connexionRequise($resultat);
/*
if(!verifTokenDroit($pdo, $letoken, "parametrage-societe", "r")){
  $resultat['infos'] = "Droit insuffisant";
  echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die('');
}

*/

$champsRequis = ["Nom"=>"nom","Code"=>"code",];
$champsLibres = ["description", "directeur", "adresse", "contact", "gestionnaire"];
$t = [];

include $P_c_formTraite;


$traitement  = creerBanque($pdo, $t ); 

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos']  = $traitement['infos'] ; 
$resultat['result'] = $traitement['result'];
       
       
    
echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die();