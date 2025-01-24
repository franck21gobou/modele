<?php 
require_once './plus/api.php';
$row = ["entetes"=>[]];
 
    # entetes...
    $row["entetes"] = [
        ["title"=>"Code", "field"=>"code_banque"  ], 
        ["title"=>"Nom", "field"=>"nom_banque"  ], 
        ["title"=>"Adresse", "field"=>"adresse_banque"  ], 
        ["title"=>"Directeur", "field"=>"directeur_banque"  ], 

    ];

    $row["initialSort"] = [
        "column"=>"code_banque", "dir"=>"asc",
    ];

    $row["id"] = "id_banque";
    $row["page"] = "banque";

    $row['action'] = [         
        ['class'=>'secondary',
        'onclick'=>"editBanque",
        "title"=>"Détails",
        'icon'=>'eye',],
        ['class'=>'warning',
        'onclick'=>"correspondance",
        "title"=>"Table de correspondance",
        'icon'=>'compress',],
        ['class'=>'purple',
        'onclick'=>"deleteBanque",
        "title"=>"Supprimer",
        'icon'=>'trash',],
          

    ];

    $row['boutons'] = [
        [
            "text"=>"Ajouter",
            "class"=>"info",
            "action"=>'creerBanque',
            "var"=>(string) "",
            
        ],
       
         
    ];

    $resultat['data'] = $row;
    $resultat['result'] = true;
    $resultat['infos'] = "";
 
echo json_encode($resultat, JSON_UNESCAPED_UNICODE);