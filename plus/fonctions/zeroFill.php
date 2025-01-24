<?php 
function zeroFill ($mot, $taille = 4, $carAjoute = " ") {
    $tailleMot = mb_strlen($mot);
    $add = "";
    if($tailleMot > $taille ) $diff = 0 ;
    for ($i=0; $i < $diff ; $i++) { 
        $add += $carAjoute;
    }
    return $add . $mot ;
}