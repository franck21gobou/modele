<?php 
function deleteBanque($pdo, $argument)
{
    
    $resultatTraite = [
        'result' => false,
        'infos' => '...',
        ];
        

        $requete = "DELETE FROM `banque` WHERE `id_banque` = :main";

        $req1 = $pdo->prepare($requete);

        try {
            //code...
            if($req1->execute($argument)){ 
            $resultatTraite = [
                'result' => true,
                'infos' => 'Succès',                 
            ];
            }else{
                $resultatTraite = [
                    'result' => false,
                    'infos' => 'Opération impossible',
                ];
            }
        } catch (Exception $e) {
            $resultatTraite = [
                'result' => false,
                'infos' => 'Impossible de réaliser cette opération: '.$e->getMessage(),
            ];
        }
     
            return $resultatTraite;

}