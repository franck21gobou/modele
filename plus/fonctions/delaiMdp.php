<?php 

function delaiMdp($laSecurite, $periode='j'){
    $dureeMdp =  $laSecurite['duree_mdp_securite']*24*60*60;
    $dateMdp =  strtotime($_SESSION['admin']['edit_mdp_admin']);
    $delaiMdp = - time() + $dureeMdp  + $dateMdp;
    if($periode == "j") {return floor($delaiMdp / (24*60*60));}
    elseif($periode == "s") {return floor($delaiMdp) ;}
}