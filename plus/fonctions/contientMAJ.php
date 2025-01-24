<?php 
function contientMaj($mdp){
    if(preg_match('/[A-Z]/', $mdp)){
        return ['statut'=>true, 'msg'=>''];
       }
       else return ['statut'=>false, 'msg'=>'Le mot de passe doit contenir une majuscule'];
}