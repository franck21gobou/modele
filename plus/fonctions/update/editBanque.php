<?php 
function editBanque($pdo, $argument)
{
    
    $resultatTraite = [
        'result' => false,
        'infos' => '...',
        ];
        

        $requete = "UPDATE `banque` SET `nom_banque` = :nom, `code_banque` = :code, `description_banque` = :description, `adresse_banque` = :adresse, `directeur_banque` = :directeur, `contact_banque` = :contact, `gestionnaire1_banque` = :gestionnaire WHERE `banque`.`id_banque` = :id";

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