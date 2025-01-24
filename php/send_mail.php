<?php
// Inclure les fichiers nécessaires de PHPMailer
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Créer une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Serveur SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'mangamuse2@gmail.com';  // Votre adresse e-mail
    $mail->Password = 'mangamuse123_';         // Votre mot de passe ou token d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;  // Port SMTP (587 pour TLS)

    // Expéditeur
    $mail->setFrom('mangamuse2@gmail.com', 'MangaMuse');
    $mail->addAddress('olivierzielinski34@gmail.com');  // L'adresse e-mail du destinataire

    // Contenu de l'e-mail
    $mail->isHTML(false);  // Utiliser le format texte brut
    $mail->Subject = 'Message de test';
    $mail->Body = "Ceci est un message de test envoyé via PHPMailer.";

    // Envoi de l'e-mail
    if ($mail->send()) {
        echo 'Le message de test a été envoyé avec succès';
    } else {
        echo 'Erreur lors de l\'envoi du message';
    }
} catch (Exception $e) {
    echo "Erreur : {$mail->ErrorInfo}";
}
?>
