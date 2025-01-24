<?php

function CheckAdmin($user)
{
  $resultatTraite = [
    "result" => false,
    "data" => [],
    "infos" => "?"
  ];

  global $pdo;


  $sql = $pdo->prepare("SELECT email_gs_admin FROM gs_admin WHERE `email_gs_admin` = :user ;");
  try {
    $sql->execute(['user' => $user,]);

  } catch (\Throwable $th) {
    $resultatTraite['infos'] = $th->getMessage();
    return $resultatTraite;
  }

  $count = $sql->rowCount();

  if ($count != 1) {
    $resultatTraite['infos'] = "Adresse inconnue de nos services";
    return $resultatTraite;
  }



  if ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    if ($row['statut'] == "0") {
      $resultatTraite['infos'] = "Votre compte est suspendu. Contactez l'administrateur ☣ ";
      return $resultatTraite;
    }

    $resultatTraite['result'] = true;

    $resultatTraite['infos'] = "Consultez votre adresse mail";


    $resultatTraite['data'] = [
    ];
  }
  return $resultatTraite;
}