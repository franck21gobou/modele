<?php 

function loginFunc($pdo,  $user, $monMotDePasse, $duree)
{
  $resultatTraite = [
    "result" => false,
    "data" =>[],
    "infos"=>"?"
  ];

  $mdp = sha1($monMotDePasse);
  $sql = $pdo->prepare("SELECT id_admin AS id, nom_admin AS nom, prenom_admin AS prenom, slug_admin AS slug, statut_admin AS statut, `#id_profil` AS profil_id, nom_profil AS profil, menu_profil AS menu, droit_profil AS droits FROM `admin` JOIN profil ON profil.id_profil = admin.`#id_profil` WHERE `login_admin` = :user AND `mdp_admin` = :mdp ;");
  try {
    $sql->execute(['user' => $user, "mdp"=>$mdp]); 
    
  } catch (\Throwable $th) {
    $resultatTraite['infos'] = $th->getMessage();
    return $resultatTraite;
  }

  $count = $sql->rowCount();
  
  if($count != 1){
    $resultatTraite['infos'] = "Informations incorrectes, veuillez réessayer";
    return $resultatTraite;
  }

  if($duree == "true") $d = 30;
  else $d = 3;

  
  if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    if($row['statut'] == "0"){
      $resultatTraite['infos'] = "Votre compte est suspendu. Contactez l'administrateur ☣ ";
      return $resultatTraite;
    }

    $resultatTraite['result'] = true;

      $resultatTraite['infos'] = "Connecté avec succès";
      $userInfo = ["id"=>$row['id'], "nom"=>$row['nom'], "prenom"=>$row['prenom'],  "slug"=>$row['slug'], "profil_id"=>$row['profil_id'], "profil"=>$row['profil']];
      $userInfoAll = $userInfo;
      $userInfoAll['droits'] = $row['droits'];
      //$userInfoAll['societe'] = mesSocietes(lireUser($pdo, "societe", ['user'=>$row['id']])['data']);  //lireUser($pdo, "societe", ['user'=>$row['id']])['data'] ;
     // $userInfoAll['caisses'] = mesCaisses(lireCaisse($pdo, "user", ["user"=>$row['id']])['data']) ;

      $resultatTraite['data'] = [
        "user" => $userInfo,
        "menu"=> json_decode($row['menu']),
        "droits"=> json_decode($row['droits']),
        "duree" => $d,
        "token" => encodeToken($userInfoAll),
      //  "caisses" => $userInfoAll['caisses'],
      ];
  }
  return $resultatTraite;
}