<?php 
require './vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


 function decodeToken(string $jwt){
     $reponse = [
         "result"=>false,
         "data"=>false,
         "message"=>"Rien à retourner",
     ];
     try{
        $decoded = JWT::decode($jwt, new Key(TOKEN_KEY, 'HS256'));
        
        $reponse = [
            "result"=>true,
            "data"=> $decoded,
            "message"=>"",
        ];
    }catch(Exception $e){
        $reponse = [
         "result"=>false,
         "data"=>false,
         "message"=>$e->getMessage(),
     ];
    }
     return $reponse;
 }