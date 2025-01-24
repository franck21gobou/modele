<?php 

///////////// liste des banques
function lireBanque($pdo, $type="all", $argument=[] ){
	$resultatTraite = [
      "infos"=>"...",
      "result"=>false,
      "data"=>[],
   ];
 
   if($type=="all")
	$sql = "SELECT * FROM `banque`"; 

   if($type=="solo")
	$sql = "SELECT * FROM `banque` WHERE id_banque = :main "; 

   
  $sql = $pdo->prepare($sql);

  try {
   $sql->execute($argument); 
      
   } catch (\Throwable $th) {
      $resultatTraite['infos'] = $th->getMessage();
      return $resultatTraite;
   }

  while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
      $resultatTraite["data"][] = $row;
  }
  $resultatTraite['result'] = true;
  return $resultatTraite;
}