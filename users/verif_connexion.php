<?php
session_start();

require_once('../connexion_bdd.php');

$erreur = 0;
$retour = '';

if (isset($_POST['user_mail']) and isset($_POST['user_password']))
{
    $mail = filter_var($_POST['user_mail'], FILTER_SANITIZE_EMAIL);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $validateMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    }else{
        $erreur++;
        $retour .= 'Veillez rentrer une adresse mail valide.';
    }

    if ($erreur === 0)
    {
        $sql = 'select user_password from users where user_mail="'.$validateMail.'"';

        $query = $bdd->prepare($sql);
        $query->execute();
        $password = $query->fetch();

        var_dump($password);

        if (password_verify($_POST['user_password'], $password['user_password']))
        {
            $sql = 'select * from users where user_mail="'.$validateMail.'"';

            $query = $bdd->prepare($sql);
            $query->execute();
            $info = $query->fetch();
        }else{
            $erreur++;
            $retour .= 'Mot de passe incorrect';
        }
    }

}else{
    $erreur++;
    $retour .= 'Veillez remplir tout les champs';
}

if ($erreur !== 0)
{
    $_SESSION['retourConnexion'] = $retour;
    header('location:connexion.php');
}else {
	$_SESSION['user_photo'] = $info['user_photo'];
    $_SESSION['user_pseudo'] = $info['user_pseudo'];
	$_SESSION['user_id'] = $info['user_id'];
    header('location:../index.php');
}