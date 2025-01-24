<?php 
function creerBanque($pdo, $argument)
{
    
    $resultatTraite = [
        'result' => false,
        'infos' => '...',
        ];
        

        $requete = "INSERT INTO `banque` (`nom_banque`, `code_banque`, `description_banque`, `adresse_banque`, `directeur_banque`, `contact_banque`, `gestionnaire1_banque`) 
        VALUES 
        (:nom, :code, :description, :adresse, :directeur, :contact, :gestionnaire);";

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
            if($e->getCode() == 23000)
            $resultatTraite['infos'] = "Des doublons empêchent l'enregistrement ☹";
            else
            $resultatTraite = [
                'result' => false,
                'infos' => 'Impossible de réaliser cette opération: '.$e->getMessage(),
            ];
        }
     
            return $resultatTraite;

}