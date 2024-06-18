<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['action']) && filter_var($_GET['action'], FILTER_VALIDATE_INT))
{
    $actionId = $_GET['action'];

    $sql = 'select action_nom from actions where action_id='.$actionId;

    $query = $bdd->prepare($sql);
    $query->execute();
    $actionNom = $query->fetch();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<main>
    <p>
        Etes vous sûr de vouloir supprimer l'action : <?= $actionNom['action_nom'] ?>
    </p>
    <a href="supp_action.php?action=<?= $actionId?>">Oui</a>
    <a href="action_office.php">Non</a>
</main>

</body>
</html>
