<?php 
function contientNbr($mdp){
    if(preg_match('/[0-9]/', $mdp)){
        return ['statut'=>true, 'msg'=>''];
       }
       else return ['statut'=>false, 'msg'=>'Le mot de passe doit contenir un nombre'];
}