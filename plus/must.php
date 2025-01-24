<?php
//session_start();
ob_start();
date_default_timezone_set('UCT');
// $domaine = 'https://formations.financeone-ci.com/admin/';
$bdd_name = "NO_DATABASE";
//require_once 'pdo.php';

$moi_meme = [
  "nom" => "Application",
  "description" => "Logiciel ",
  "slug" => "App_",
  "url" => "modele",
  "domaine" => "localhost",
  "titre" => "Titre",
  "api" => "api",
  "keywords" => "",
];

$is_dev = time();

define("TOKEN_KEY", '@@*' . $moi_meme['slug']);
include('fonctions.php'); ///////// fonctions

require_once('variables.php'); // Variables
require_once('pages.php'); // pages
require_once('composants.php'); // composants