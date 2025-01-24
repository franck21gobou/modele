<?php

require_once './plus/api.php';
 
  $resultat['result'] = true;
  $resultat['infos'] = ".";

  $traitement = lireBanque($pdo);
    # mise au format 
    foreach ($traitement['data'] as $key => $value) {
      # code...
      $resultat['data'][] = [
        'id' => $value['id_banque'], 
        'value' => $value['id_banque'], 
        'label' => $value['code_banque'], 
      ];
    }
  

  
  
  
echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die();