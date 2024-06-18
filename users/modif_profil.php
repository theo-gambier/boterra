<?php
require_once ('../connexion_bdd.php');
session_start();

$sql = 'select * from users where user_id='. $_SESSION['user_id'];

$query = $bdd->prepare($sql);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/pages/css/style.css">
	<title>Document</title>
</head>
<body>
<?php
    require_once '../assets/pages/menu.php';
?>

<main id="mainAjoutJardin" class="fondv">

	<form action="valid_modif_profil.php" method="post" class="blockblanc formAjout">
		<label for="pseudo">Pseudo</label>
		<input id="pseudo" type="text" value="<?= $user['user_pseudo'] ?>" name="user_pseudo">
		<label for="email">Email</label>
		<input id="email" type="email" value="<?= $user['user_mail'] ?>" name="user_mail">
		<label for="password">Mot de passe</label>
        <input id="password" type="password" name="user_password">
        <label for="newPassword">Nouveau mot de passe</label>
        <input id="newPassword" type="password" name="new_password">
        <label for="newPasswordConf">Confirmer nouveau mot de passe</label>
        <input id="newPasswordConf" type="password" name="conf_password">
        <div class="journalButtons">
            <a class="boutonMain" href="mes_infos.php"><p>Retour</p></a>
            <input class="boutonMain" type="submit">
        </div>
	</form>

</main>
</body>
</html>
