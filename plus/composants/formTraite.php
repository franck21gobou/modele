<?php 
  
    foreach ($champsRequis as $cle => $champ) {
        # champs obligatoire...
        if(isset($obj->$champ) && $obj->$champ != "" ){
          $$champ = $obj->$champ;
          $t[$champ] = $$champ;
        } 
          else {
             // $resultat['obj'] = $obj;
              $resultat['infos'] = "$cle obligatoire 😣";
              echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die();
              }
    }
    foreach ($champsLibres as $key => $champ) {
      # champs libres...
      if(isset($obj->$champ) && $obj->$champ != "" ){
         $$champ = $obj->$champ;
         $t[$champ] = $$champ;
      }
      else{
        $$champ = NULL;
        $t[$champ] =  NULL;
      } 
    }

    