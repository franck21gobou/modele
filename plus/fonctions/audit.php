<?php

function audit($pdo, $token,  $type, $detail){
    $machine =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
    if($token == ""){
        $admin = "";
        $nom = "";
        $email = "";
    }else{
      if (decodeToken($token)['data']){
          $data = decodeToken($token)['data'];
        $admin = $data->admin->id_admin;
        $nom = $data->admin->nom_admin;
        $email = $data->admin->mail_admin;
      }else{
          /// LOG
        $admin = "";
        $nom = "";
        $email = "";
      }
    }

    $t1 = array(
        'tid' => $admin,        
        'tnom' => $nom,        
        'temail' => $email,        
        'tmachine' => $machine,        
        'ttype' =>$type,        
        'tdetail' => $detail,        
    );

    $req1 = $pdo->prepare("INSERT INTO `audit` 
    (`detail_audit`, `email_user_audit`, `id_user_audit`, `machine_user_audit`, `nom_user_audit`, `type_audit`) 
    VALUES 
    (:tdetail, :temail, :tid, :tmachine, :tnom, :ttype)");
    try {
        $req1->execute($t1); //code...
    } catch (Exception $th) {
      //  creerLog('user: '.$_SESSION['admin']['id_admin'].' / '.$th);
    }

}