<?php 
///// inclusion de fichiers

$dossier ="./plus/pages";
$scandir = scandir($dossier);
foreach($scandir as $fichier){
    if($fichier != '.' && $fichier != '..' && substr($fichier, mb_strlen($fichier) - 4) == ".php" )
    {//  echo "$dossier/$fichier <br>";
    $n = "P_".explode('.',  $fichier)[0];
    $$n = "$dossier/$fichier";
  // $p = "$dossier/$fichier";
}
}