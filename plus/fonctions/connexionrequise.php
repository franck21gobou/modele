<?php 
function connexionRequise($resultat  /* vérifier que le user est connecté */){ // 
    if(!$resultat['is_auth'] ){
        //  audit($pdo,$letoken,'Connexion KO','tentative de connexion'); 
        //LOG
        echo json_encode($resultat, JSON_UNESCAPED_UNICODE); die('');
      }
}