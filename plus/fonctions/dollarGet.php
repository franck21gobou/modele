<?php 
function dollarGet(int $key){
    $url = $_GET['uurl'];
    $rpse = explode('/', $url);
    if(!isset($rpse[$key])) return false;
    return $rpse[$key];
}