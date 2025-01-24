<?php 
require './vendor/autoload.php';
use Firebase\JWT\JWT;

 function encodeToken($payload){
     return JWT::encode($payload, TOKEN_KEY, 'HS256');
 }