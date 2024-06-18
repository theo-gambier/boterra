<?php

$retourMail = '';

require_once '../vendor/autoload.php';

if (isset($_POST['mail_adresse']) && isset($_POST['mail_objet']) && isset($_POST['mail_message']) && $_POST['hp'] == '')
{
	$email = filter_var($_POST['mail_adresse'], FILTER_SANITIZE_EMAIL);

	if ($_POST['mail_adresse'] !== '' && $email = filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$validateEmail = $email;
		$objet = filter_var($_POST['mail_objet'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$message = filter_var($_POST['mail_message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);


		try {
			//Server settings
			/*                                          //Send using SMTP

			$mail->Host       = 'cocotier.o2switch.net';                     //Set the SMTP server to send through
			$mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			*/
			$mail->CharSet = 'UTF-8';

			//Recipients
			$mail->setFrom( 'mmi23g08@mmi-troyes.fr');
			//$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
			$mail->addAddress($validateEmail);               //Name is optional

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Confirmation de votre mail';
			$mail->Body    = 'Nous vous confirmons que votre mail de contact a bien été pris en compte et sera traité dans les plus brefs délais. L\'équipe Boterra';
			$mail->AltBody = 'Nous vous confirmons que votre mail de contact a bien été pris en compte et sera traité dans les plus brefs délais. L\'équipe Boterra';

			$mail->send();
			$retourMail .= 'Votre message a bien été envoyé';
		} catch (Exception $e) {
			$retourMail .= 'Une erreur c\'est produite, votre message n\'a pas pu être envoyé';
		}


		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);


		try {
			//Server settings
			/*                                          //Send using SMTP

			$mail->Host       = 'cocotier.o2switch.net';                     //Set the SMTP server to send through
			$mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			*/
			$mail->CharSet = 'UTF-8';

			//Recipients
			$mail->setFrom( $validateEmail);
			//$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
			$mail->addAddress('mmi23g08@mmi-troyes.fr');               //Name is optional

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $objet;
			$mail->Body    = $message;
			$mail->AltBody = $message;

			$mail->send();
			$retourMail .= 'Votre message a bien été envoyé';
		} catch (Exception $e) {
			$retourMail .= 'Une erreur c\'est produite, votre message n\'a pas pu être envoyé';
		}
	}
}

header('location:contact.php');