<?php 

function erreur_fatale( /*  en cas d'erreur */){ //
    header('location: error?q=' );
    die();
}