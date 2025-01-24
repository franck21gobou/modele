<?php

foreach ($champsRequis as $cle => $champ) {
  # champs obligatoire...
  if (isset($_POST[$champ]) && $_POST[$champ] != "") {
    $$champ = $_POST[$champ];
    $t[$champ] = $$champ;
  } else {
    // $resultat['obj'] = $obj;
    $resultat['infos'] = "$cle obligatoire 😣";
    echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
    die();
  }
}
foreach ($champsLibres as $key => $champ) {
  # champs libres...
  if (isset($_POST[$champ]) && $_POST[$champ] != "" && $_POST[$champ] != "null") {
    $$champ = $_POST[$champ];
    $t[$champ] = $$champ;
  } else {
    $$champ = NULL;
    $t[$champ] = NULL;
  }
}

