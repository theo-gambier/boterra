<?php
require_once ('../../../connexion_bdd.php');
session_start();

if (isset($_GET['user']) && isset($_GET['parcelle']) && isset($_GET['jardin']))
{
    if(filter_var($_GET['user'], FILTER_VALIDATE_INT) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT) && filter_var($_GET['jardin'], FILTER_VALIDATE_INT)) {
	    $userId = $_GET['user'];
	    $parcelleNum = $_GET['parcelle'];
        $jardin = $_GET['jardin'];

	    $sql = 'select * from users where user_id=' . $userId;

	    $query = $bdd->prepare($sql);
	    $query->execute();
	    $user = $query->fetch();
	    $_SESSION['mailTo'] = $user['user_mail'];
	    $_SESSION['jardin'] = $_GET['jardin'];
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/assets/pages/css/admin.css">

    <title>Document</title>
</head>
<body>

<main>

    <h1>Contacter la parcelle <?= $parcelleNum ?></h1>

<form action="envoi_mail_parcelle.php" method="post" id="formulaire">
    <div class="containerLabelInput">
        <label for="objet">Objet :</label>
        <input type="text" id="objet" name="objet">
    </div>
    <div class="containerLabelInput">
        <label for="message">Message :</label>
        <textarea id="message" name="message"></textarea>
    </div>
    <div id="containerLinks">
        <a href="parcelle_office.php?id=<?= $jardin ?>">Retour</a>
        <input type="submit" placeholder="Envoyer">
    </div>
</form>



</main>
</body>
</html>
