<?php 
// getFiles
function getFiles($dossier, $ext= ".php"){
    //  $dossier ="./plus/fonctions";
    $lesFichiers = [];
    if(!file_exists($dossier)) return $lesFichiers;
  $scandir = scandir($dossier);
  foreach($scandir as $fichier){
    if($fichier != '.' && $fichier != '..' )
    if($ext == '*') {
        $lesFichiers[] = ["fichier"=>$fichier, "dossier"=>$dossier]; // tous
    }
    else
      if(substr($fichier, mb_strlen($fichier) - (mb_strlen($ext) + 1)) == $ext ){
        $lesFichiers[] = ["fichier"=>$fichier, "dossier"=>$dossier];
      }
          
      }
      return $lesFichiers ;
  }