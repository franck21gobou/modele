<?php 
 header('Content-Type: application/json; charset=utf8');
 //  header("Access-Control-Allow-origin: {$_SERVER['HTTP_ORIGIN']}");
header("Access-Control-Allow-origin: *");
header('Access-Control-Allow-Headers: *'); 
$obj = json_decode(file_get_contents('php://input'));
require_once 'pdo.php';
$headRequest = apache_request_headers();
$letoken = "";

$resultat = [
    //"_e"=>(array)decodeToken($headRequest['auth'])['data'] ,
    "is_auth"=>false,
    "result" =>false,
    "infos" =>"Opération invalide 💩",
    "data"=>[],
    "php"=>$obj,
    "x"=>$_POST,
    "url"=>$url,
    //"i"=>($headRequest['auth']) ,
    "time"=>time(),
  ];
  if(isset($headRequest['auth']))
  if(decodeToken($headRequest['auth'])['result'])
  {
    $letoken = $headRequest['auth'];
    $resultat['is_auth'] = true;
    $userData = decodeToken($headRequest['auth'])['data'];
    // var_dump($userData);
    $userData = (array) $userData;
    $resultat['user'] = $userData;
    // $id__ = $userData['id']  ;
    // $caisse__ =  $userData['caisses']  ;
    // $societe__ = $userData['societe'] ;
  }

