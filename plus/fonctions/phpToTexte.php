<?php 


function phpTotexte($filename, $key, $valeur  /* transformer le rendu d'un fichier php  et envoyer dans un modal*/)
{   
 return supprimerBr(obtenirPHP($filename, $key, $valeur) );
}