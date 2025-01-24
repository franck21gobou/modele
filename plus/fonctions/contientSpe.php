<?php 
function contientSpe($mdp){
    if(preg_match('/[^a-zA-Z\d]/', $mdp)){
        return ['statut'=>true, 'msg'=>''];
       }
       else return ['statut'=>false, 'msg'=>'Le mot de passe doit contenir un caractère spécial'];
}