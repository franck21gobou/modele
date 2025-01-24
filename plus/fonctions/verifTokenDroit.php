<?php 
function verifTokenDroit($pdo, $token, $ligne, $droit){
    if(decodeToken($token)['result'] && $data = decodeToken($token)['data']){

        $droits = (array) json_decode($data->droits);
        if(isset($droits[$ligne])){
            $check = (array) $droits[$ligne];
            if(isset($check[$droit])){
                if($check[$droit] == 1) return true;
            }else return false;
        }else return false;
        //   $profil = $data->admin->id_profil;
        //   $statut = $data->admin->statut_admin;
        //  if($statut != 'online') return false;
        // if(aLeDroit($pdo, $profil, $ligne, $droit)){
        //     return true;
        // }else return false;
    }else return false;
    return false;
}