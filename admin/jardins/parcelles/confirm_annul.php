<?php
require_once ('../../../connexion_bdd.php');

if (isset($_GET['jardin']) && isset($_GET['parcelle']))
{
    if (filter_var($_GET['jardin'], FILTER_VALIDATE_INT) && filter_var($_GET['parcelle'], FILTER_VALIDATE_INT))
    {
        $jardin = $_GET['jardin'];
        $parcelle = $_GET['parcelle'];

        $sql = 'select potager_adresse from potagers where potager_id='.$jardin;

        $query = $bdd->prepare($sql);
        $query->execute();
        $potager = $query->fetch();
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
    <title>Document</title>
</head>
<body>

<main>
    <p>
        Etes vous sur de vouloir supprimer la réservation de la parcelle <?= $parcelle ?> du <?= $potager['potager_adresse'] ?>
    </p>
    <a href="annul_parcelle.php?parcelle=<?= $parcelle?>&jardin=<?= $jardin ?>">Oui</a>
    <a href="parcelle_office.php?id=<?= $jardin ?>">Non</a>
</main>

</body>
</html>
