<?php 
function secure($valeur /* sécuriser variables */){ // 
	return (htmlspecialchars(strip_tags($valeur) ))  ;
}