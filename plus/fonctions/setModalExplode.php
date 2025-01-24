<?php 

function setmodalExplode(array $info, $echapper = true /*permet dexporter un tableau pour setmodal js */){ // 
   $resultatTraite = "";
   foreach ($info as $item) {
       # code...
       $resultatTraite .= "'$item', ";
   }
   if($echapper)
   return  addslashes(htmlspecialchars($resultatTraite));
   else
   return  htmlspecialchars($resultatTraite);

}