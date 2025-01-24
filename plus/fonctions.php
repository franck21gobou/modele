<?php 
$dossier ="./plus/fonctions";
$scandir = scandir($dossier);
foreach($scandir as $fichier){
    if($fichier != '.' && $fichier != '..' && substr($fichier, mb_strlen($fichier) - 4) == ".php" )
    //  echo "$dossier/$fichier <br>";
   require "$dossier/$fichier";
}