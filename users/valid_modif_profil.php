<?php
require_once ('../connexion_bdd.php');
session_start();

$erreur = 0;
$retour = '';

$sql = 'select * from users where user_id='. $_SESSION['user_id'];

$query = $bdd->prepare($sql);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['user_password']) && password_verify($_POST['user_password'], $user['user_password']))
{
	if (isset($_POST['user_mail']))
	{
		$mail = filter_var($_POST['user_mail'], FILTER_SANITIZE_EMAIL);
	}

	if (isset($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL))
	{
		$sql = 'update users set user_mail="'.$mail.'" where user_id='. $_SESSION['user_id'];

		$query = $bdd->prepare($sql);
		$query->execute();
	}

	if (isset($_POST['user_pseudo']) && $_POST['user_pseudo'] !== '')
	{
		$pseudo = filter_var($_POST['user_pseudo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$sql = 'update users set user_pseudo="'.$pseudo.'" where user_id='. $_SESSION['user_id'];

		$query = $bdd->prepare($sql);
		$query->execute();

		$_SESSION['pseudo'] = $pseudo;
	}

	if (isset($_POST['new_password']) && $_POST['new_password'] !== '' && isset($_POST['conf_password']) && $_POST['conf_password'] !== '' && $_POST['new_password'] == $_POST['conf_password'])
	{
		$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

		$sql = 'update users set user_password="'.$password.'" where user_id=' .$_SESSION['user_id'];

		$query = $bdd->prepare($sql);
		$query->execute();
	}


}else{
	$erreur ++;
	$retour .= 'Rentrez votre mot de passe pour faire des modifications';
}

header('location:modif_profil.php');