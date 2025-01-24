<?php


function sendCodeEmail($email)
{
    global $moi_meme;
    // Générer un code
    $code = motDePasseAleatoire();

    // Sujet de l'email
    $subject = "Votre nouveau mot de passe";

    // En-têtes de l'email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@" . $moi_meme['domaine'] . ".com" . "\r\n";

    // Template HTML avec CSS intégré
    $message = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title> Réinitialiser de passe</title>
    </head>
    <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 20px;">
            <div style="text-align: center; padding: 20px;">
                <img src="https://' . $moi_meme['domaine'] . '/logo.png" alt="Logo" style="max-width: 150px;">
            </div>
            
            <div style="padding: 20px; color: #333333;">
                <h1 style="color: #2c3e50; font-size: 24px; margin-bottom: 20px;">Réinitialiser mot de passe</h1>
                
                <p style="font-size: 16px; line-height: 1.5; margin-bottom: 15px;">
                    Bonjour,
                </p>
                
                <p style="font-size: 16px; line-height: 1.5; margin-bottom: 15px;">
                    Voici votre code de réinitialisation :
                </p>
                
                <div style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 5px; padding: 15px; margin: 20px 0; text-align: center;">
                    <code style="font-size: 20px; color: #2c3e50; font-weight: bold;">' . $code . '</code>
                </div>
                
                <p style="font-size: 16px; line-height: 1.5; margin-bottom: 15px;">
                Ceci n\'est pas votre mot de passe
                    Ce code vous permettra de saisir un nouveau mot de passe.
                </p>
                
                <div style="text-align: center; margin-top: 30px;">
                    <a href="https://' . $moi_meme['domaine'] . '/' . $moi_meme['url'] . '/login" 
                       style="background-color: #3498db; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-size: 16px;">
                        Se connecter
                    </a>
                </div>
                
                <p style="font-size: 14px; color: #666666; margin-top: 30px; border-top: 1px solid #eeeeee; padding-top: 20px;">
                    Si vous n\'avez pas demandé ce changement de mot de passe, veuillez contacter notre support immédiatement.
                </p>
            </div>
            
            <div style="text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eeeeee; color: #666666; font-size: 14px;">
                <p>
                    Cet email a été envoyé automatiquement, merci de ne pas y répondre.
                </p>
                <p style="margin-top: 10px;">
                    © ' . date('Y') . ' ' . $moi_meme['nom'] . '. Tous droits réservés.
                </p>
            </div>
        </div>
    </body>
    </html>';

    // Envoi de l'email
    try {
        $sent = mail($email, $subject, $message, $headers);

        if ($sent) {
            // Mise à jour du mot de passe dans la base de données
            // updateUserPassword($email, $newPassword); // À implémenter selon votre système

            return [
                'success' => true,
                'message' => 'Email envoyé avec succès',
                'password' => $code // À supprimer en production
            ];
        } else {
            throw new Exception("Échec de l'envoi de l'email");
        }
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => "Erreur lors de l'envoi de l'email : " . $e->getMessage()
        ];
    }
}


