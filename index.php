<?php 
require_once './plus/must.php';
$url = "";
if(isset($_GET['uurl'])){
    $url = explode("/", $_GET['uurl']);

    if($url[0]=="api" && isset($url[1])  ){
        ////apis
        if(isset($url[2]) && $url[2] != ""  ){
            
            if(file_exists("./_api/".$url[1]."/".$url[2].".php")) 
            require_once "./_api/".$url[1]."/".$url[2].".php";
            else
            require_once "./_api/_apierror.php"; 

        }else{
            
            require_once "./_api/_apierror.php"; 
		 
        }
  
    }else{
        $pageURL0 = $url[0];
        if(file_exists("./app/_$pageURL0.php")){
            require_once "./app/_$pageURL0.php";
        }
        else  require_once "./app/_error.php";
    }
}else{
   // require_once "./app/_dashboard.php"; // vérifier la connexion user
   // connexionRequise($laSecurite, $domaine);
  //  dejaConnected();  
       require_once "./app/(router.php";
}
?>