<?php
require_once ('../../connexion_bdd.php');

if (isset($_GET['planta']) && filter_var($_GET['planta'], FILTER_VALIDATE_INT))
{
    $plantationId = $_GET['planta'];

    $sql = 'select plantation_nom from plantations where plantations.plantation_id='.$plantationId;

    $query = $bdd->prepare($sql);
    $query->execute();
    $plantationNom = $query->fetch();
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
        Etes vous sûr de vouloir supprimer la plantation : <?= $plantationNom['plantation_nom'] ?>
    </p>
    <a href="supp_planta.php?planta=<?= $plantationId?>">Oui</a>
    <a href="plantation_office.php">Non</a>
</main>

</body>
</html>
