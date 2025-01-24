<?php 

function verifDroit($page, $droit){
    if($droit == "R"){
        
            if(!isset($_SESSION['admin'][$page.'__perm_profil']) OR !aLeDroit($_SESSION['admin'][$page.'__perm_profil'], "R") ){
           
            }else return true;
        }
}