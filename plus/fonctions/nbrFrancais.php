<?php 
function nbr_francais($nbr=0 /* convertir les montants au format français */){ // 
	$value = number_format($nbr,0,',',' ');
	return $value;
}
 