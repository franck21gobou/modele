<?php

$racine = "./plus/fonctions/";
$doss = [
  $racine . "creer",
  $racine . "delete",
  $racine . "lire",
  $racine . "update",
  $racine . "composer",
];

foreach ($doss as $key => $dossier2) {

  $scandir = scandir($dossier2);
  foreach ($scandir as $fichier) {
    if ($fichier != '.' && $fichier != '..' && substr($fichier, mb_strlen($fichier) - 4) == ".php")
      //   echo "$dossier/$fichier <br>";
      require "$dossier2/$fichier";
  }
}
