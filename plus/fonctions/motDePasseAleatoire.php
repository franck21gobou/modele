<?php
function motDePasseAleatoire()
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';

    // Assurer au moins une majuscule
    $password .= $chars[rand(26, 51)];
    // Assurer au moins un chiffre
    $password .= $chars[rand(52, 61)];
    // Assurer au moins un caractère spécial
    $password .= $chars[rand(62, strlen($chars) - 1)];

    // Compléter avec 5 caractères aléatoires
    for ($i = 0; $i < 5; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }

    // Mélanger le mot de passe final
    return str_shuffle($password);
}
