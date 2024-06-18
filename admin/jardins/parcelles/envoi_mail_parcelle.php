<?php
session_start();
$retourMail = '';

require_once '../../../vendor/autoload.php';

if (isset($_POST['message']) && isset($_POST['objet'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $objet = filter_var($_POST['objet'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $mailAdress = $_SESSION['mailTo'];

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('mmi23g08@mmi-troyes.fr');
        //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($mailAdress);               //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $objet;
        $mail->Body = $message;
        $mail->AltBody = $message;

        $mail->send();
        $retourMail .= 'Votre message a bien été envoyé';
    } catch (Exception $e) {
        $retourMail .= 'Une erreur c\'est produite, votre message n\'a pas pu être envoyé';
    }
}

header('location:/admin/jardins/parcelles/parcelle_office.php?id='.$_SESSION['jardin']);
