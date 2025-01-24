<?php
require_once './plus/api.php';

 
connexionRequise($resultat);
/*
  if(!verifTokenDroit($pdo, $letoken, "parametrage-societe", "r")){
    $resultat['infos'] = "Droit insuffisant";
    echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die('');
  }
*/
  

  $champsRequis = ["Banque"=>"main"];
  $champsLibres = [];
  $t = [];
  include $P_c_formTraite;
  
 $traitement  = lireBanque($pdo, "solo", $t); 
 $resultat['infos']  = $traitement['infos'] ; 
 $resultat['result']  = $traitement['result'] ; 
 if(count($traitement['data']) == 1)
 $resultat['data']  = $traitement['data'][0] ; 

 
  
  
echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die();