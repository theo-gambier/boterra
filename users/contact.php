<?php
require_once ('../connexion_bdd.php');
session_start();

if (isset($_SESSION['user_id']))
{
	$sql = 'select user_mail from users where user_id='.$_SESSION['user_id'];

	$query = $bdd->prepare($sql);
	$query->execute();
	$user = $query->fetch(PDO::FETCH_ASSOC);
}

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
    <style>
        #hp, #hpLabel {
            display: none;
        }
    </style>
</head>
<body>
<?php
require_once '../assets/pages/menu.php';
?>

<main id="mainAjoutJardin" class="fondv">



<form method="post" action="envoi_mail.php" class="blockblanc formAjout">
	<label for="email">Mail :</label>
	<input id="email" type="email" value="<?= (isset($_SESSION['user_id'])) ? $user['user_mail'] : '' ?>" name="mail_adresse">
	<label for="object">Objet</label>
	<input id="object" type="text" name="mail_objet">
	<label for="message">Message</label>
	<textarea id="message" name="mail_message"></textarea>
    <label id="hpLabel" for="hp">Hp</label>
    <input id="hp" type="text" name="hp">

    <div class="journalButtons">
        <a class="boutonMain" href="/index.php">
            <p>Retour</p>
        </a>
        <input class="boutonMain" type="submit">
    </div>
</form>

</main>
<?php
    require_once '../assets/pages/footer.php'
?>
</body>
</html>

