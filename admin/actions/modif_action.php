<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['action']) && filter_var($_GET['action'], FILTER_VALIDATE_INT))
{
    $id = $_GET['action'];

    $sql = 'select * from actions where action_id='.$id;

    $query = $bdd->prepare($sql);
    $query->execute();
    $action = $query->fetch();
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

    <h1>Modifier une action</h1>

<form action="valid_modif.php" method="post" id="formulaire">
    <input type="hidden" name="action_id" value="<?= $id ?>">
    <div class="containerLabelInput">
        <label for="nom">Nom</label>
        <input id="nom" type="text" name="action_nom" value="<?= $action['action_nom'] ?>">
    </div>
    <div id="containerLinks">
        <a href="action_office.php">Retour</a>
        <input type="submit" placeholder="Valider">
    </div>
</form>

</main>

</body>
</html>
