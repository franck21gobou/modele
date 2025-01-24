<?php
function champ_ajoutComplements($array)
{
    $result = '';

    foreach ($array as $key => $value) {
        // Ajouter un échappement aux guillemets doubles et aux apostrophes dans les valeurs
        $escapedValue = ($value);
        $result .= " $key=\"$escapedValue\"";
    }

    return $result;
}