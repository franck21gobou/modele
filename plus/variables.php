<?php 
///url actuelle
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ;
$WWdomaine = "http://localhost:8101/sanlam/";
//variables
$erreur_commander="";
$classActive = "";

// infos user

$ua =  "";
if(isset($_SERVER['HTTP_USER_AGENT']))
    $ua = $_SERVER['HTTP_USER_AGENT'];

$machine =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
$listHeaders = [];
$listScripts = [];
$breadCrumb = [
    "title" => "SanLam",
    "links" =>[
        ["texte"=>"Accueil", "link"=>"",],
        ]
];